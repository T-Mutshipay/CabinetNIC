<?php

namespace Tests\Feature;

use App\Models\Actualite;
use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    private function article(array $autres = []): Actualite
    {
        return Actualite::create([
            'titre' => 'Une réforme importante',
            'description' => 'Le résumé de la réforme',
            'contenu' => 'Le contenu de la réforme',
            'image' => 'img/portons-la-justice-main-ouverte.png',
            ...$autres,
        ]);
    }

    private function page(Actualite $actualite): TestResponse
    {
        return $this->get(route('actualites.show', $actualite))->assertOk();
    }

    public function test_le_contenu_est_decoupe_en_paragraphes_et_reste_echappe(): void
    {
        $page = $this->page($this->article([
            'contenu' => "Premier paragraphe\r\n\r\nDeuxième <script>alert(1)</script>\nmême paragraphe\n\n\n\nTroisième",
        ]));

        $page->assertSee('>Premier paragraphe</p>', false)
            ->assertSee('Deuxième &lt;script&gt;alert(1)&lt;/script&gt;<br />', false)
            ->assertSee('>Troisième</p>', false)
            ->assertDontSee('<script>alert(1)', false);
    }

    public function test_la_ponctuation_francaise_ne_commence_jamais_une_ligne(): void
    {
        $insecable = "\u{A0}";

        $this->page($this->article(['titre' => 'Le droit : mode d\'emploi', 'contenu' => 'Vraiment ? Oui « bien sûr »']))
            ->assertSee("Le droit{$insecable}: mode", false)
            ->assertSee("Vraiment{$insecable}? Oui «{$insecable}bien sûr{$insecable}»", false);
    }

    public function test_la_lettrine_est_reservee_aux_paragraphes_assez_longs(): void
    {
        $this->page($this->article(['contenu' => 'Un texte court']))->assertDontSee('first-letter:float-left', false);
        $this->page($this->article(['contenu' => Str::repeat('Un texte long. ', 20)]))->assertSee('first-letter:float-left', false);
    }

    public function test_le_temps_de_lecture_est_estime_a_partir_du_contenu(): void
    {
        $this->page($this->article(['contenu' => 'Trois mots seulement']))->assertSee('1 min de lecture');
        $this->page($this->article(['contenu' => Str::repeat('mot ', 450)]))->assertSee('3 min de lecture');
    }

    public function test_une_image_existante_est_affichee_et_partagee(): void
    {
        $this->page($this->article())
            ->assertSee('src="' . asset('img/portons-la-justice-main-ouverte.png') . '"', false)
            ->assertSee('property="og:image" content="' . asset('img/portons-la-justice-main-ouverte.png') . '"', false);
    }

    public function test_une_image_absente_ou_le_fond_uni_ne_s_affichent_pas(): void
    {
        foreach (['img/fichier-absent.jpg', 'img/fond.jpg', ''] as $image) {
            $actualite = $this->article(['image' => $image]);

            $this->assertNull($actualite->visuel);
            $page = $this->page($actualite)->assertSee(
                'property="og:image" content="' . asset(config('cabinet.og_image')) . '"',
                false,
            );

            if ($image) {
                $page->assertDontSee($image);
            }
        }

        $this->get(route('actualites'))->assertOk()->assertDontSee('img/fichier-absent.jpg');
    }

    public function test_a_lire_aussi_propose_trois_autres_articles_recents(): void
    {
        $actualite = $this->article(['titre' => 'Article consulté']);
        foreach (range(1, 4) as $numero) {
            $this->article(['titre' => "Autre article {$numero}"]);
        }

        $autres = $this->page($actualite)->assertSee('À lire aussi')->viewData('autres');

        $this->assertCount(3, $autres);
        $this->assertFalse($autres->contains($actualite));
    }

    public function test_a_lire_aussi_disparait_sans_autre_article(): void
    {
        $this->page($this->article())->assertDontSee('À lire aussi');
    }

    public function test_l_auteur_n_est_affiche_que_s_il_est_renseigne(): void
    {
        $this->page($this->article(['auteur' => 'Me <b>Kabongo</b>']))
            ->assertSee('Par Me &lt;b&gt;Kabongo&lt;/b&gt;', false);

        $this->page($this->article())->assertDontSee('Par ');
    }

    public function test_les_liens_de_partage_sont_encodes(): void
    {
        $actualite = $this->article(['titre' => 'Droit & devoirs']);
        $lien = rawurlencode(route('actualites.show', $actualite));

        $this->page($actualite)
            ->assertSee("https://wa.me/?text=Droit%20%26%20devoirs%20{$lien}", false)
            ->assertSee("sharer.php?u={$lien}", false)
            ->assertSee("share-offsite/?url={$lien}", false)
            ->assertSee("mailto:?subject=Droit%20%26%20devoirs&amp;body={$lien}", false);
    }

    public function test_seuls_les_commentaires_valides_sont_affiches_et_comptes(): void
    {
        $actualite = $this->article();
        $auteur = User::create(['name' => 'élodie Kasongo', 'email' => 'elodie@example.com']);

        $this->page($actualite)->assertSee('Soyez le premier à réagir.')->assertDontSee('href="#commentaires"', false);

        Commentaire::create(['user_id' => $auteur->id, 'actualite_id' => $actualite->id, 'contenu' => 'En attente de validation']);
        $publie = Commentaire::create(['user_id' => $auteur->id, 'actualite_id' => $actualite->id, 'contenu' => 'Commentaire <b>publié</b>']);
        $publie->forceFill(['valide' => true])->save();

        $this->page($actualite)
            ->assertSee('1 commentaire')
            ->assertSee('>É</span>', false)
            ->assertSee('Commentaire &lt;b&gt;publié&lt;/b&gt;', false)
            ->assertDontSee('En attente de validation')
            ->assertDontSee('Soyez le premier à réagir.');
    }
}
