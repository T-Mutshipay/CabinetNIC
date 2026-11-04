<?php

namespace Tests\Feature;

use App\Filament\Resources\Contacts\ContactResource;
use App\Filament\Resources\Contacts\Pages\ListContacts;
use App\Filament\Resources\Contacts\Pages\ViewContact;
use App\Models\Actualite;
use App\Models\Commentaire;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Actions\Testing\TestAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ContactAdminTest extends TestCase
{
    use RefreshDatabase;

    private function connecter(): void
    {
        $this->actingAs(User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => 'mot-de-passe-solide']));
    }

    private function contact(string $contenu = 'Bonjour, je souhaite un rendez-vous.'): Commentaire
    {
        $visiteur = User::firstOrCreate(['email' => 'marie@example.com'], ['name' => 'Marie Kabongo']);

        return Commentaire::create(['user_id' => $visiteur->id, 'contenu' => $contenu]);
    }

    private function commentaireDArticle(): Commentaire
    {
        $article = Actualite::create(['titre' => 'T', 'description' => 'D', 'contenu' => 'C', 'image' => 'img/fond.jpg']);
        $auteur = User::create(['name' => 'Lecteur', 'email' => 'lecteur@example.com']);

        return Commentaire::create(['user_id' => $auteur->id, 'actualite_id' => $article->id, 'contenu' => 'Bel article']);
    }

    public function test_un_visiteur_n_a_pas_acces_aux_contacts(): void
    {
        $this->get('/admin/contacts')->assertRedirect('/admin/login');

        $this->actingAs(User::create(['name' => 'Visiteur', 'email' => 'visiteur@example.com']))
            ->get('/admin/contacts')
            ->assertForbidden();
    }

    public function test_la_liste_affiche_les_contacts_et_jamais_les_commentaires_d_article(): void
    {
        $contact = $this->contact();
        $commentaire = $this->commentaireDArticle();
        $this->connecter();

        Livewire::test(ListContacts::class)
            ->assertCanSeeTableRecords([$contact])
            ->assertCanNotSeeTableRecords([$commentaire]);
    }

    public function test_un_commentaire_d_article_ne_s_ouvre_pas_comme_un_contact(): void
    {
        $commentaire = $this->commentaireDArticle();
        $this->connecter();

        $this->get("/admin/contacts/{$commentaire->id}")->assertNotFound();
    }

    public function test_un_message_envoye_par_le_formulaire_arrive_dans_la_liste_a_traiter(): void
    {
        $this->post('/commentaires', [
            'name' => 'Paul Mbuyi', 'email' => 'paul@example.com', 'comment' => 'Pouvez-vous me rappeler ?', 'traite' => 1,
        ])->assertRedirect();

        $message = Commentaire::contacts()->firstOrFail();
        $this->assertFalse((bool) $message->fresh()->traite);

        $this->connecter();
        Livewire::test(ListContacts::class)->assertCanSeeTableRecords([$message]);
    }

    public function test_la_fiche_affiche_le_message_echappe_et_le_lien_de_reponse(): void
    {
        $contact = $this->contact("<script>alert(1)</script>\nDeuxième ligne");
        $this->connecter();

        $this->get("/admin/contacts/{$contact->id}")
            ->assertOk()
            ->assertSee('Message de Marie Kabongo')
            ->assertSee('<br />', false)
            ->assertSee('marie@example.com')
            ->assertSee('mailto:marie@example.com', false)
            ->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false)
            ->assertDontSee('<script>alert(1)</script>', false);
    }

    public function test_marquer_comme_traite_puis_annuler(): void
    {
        $contact = $this->contact();
        $this->connecter();

        Livewire::test(ViewContact::class, ['record' => $contact->getRouteKey()])
            ->callAction('basculerTraite')
            ->assertDispatched('refresh-sidebar');
        $this->assertTrue($contact->refresh()->traite);

        Livewire::test(ListContacts::class)->callAction(TestAction::make('basculerTraite')->table($contact));
        $this->assertFalse($contact->refresh()->traite);
    }

    public function test_le_filtre_separe_les_messages_traites(): void
    {
        $aTraiter = $this->contact('À traiter');
        $traite = $this->contact('Déjà traité');
        $traite->forceFill(['traite' => true])->save();
        $this->connecter();

        Livewire::test(ListContacts::class)
            ->filterTable('traite', false)
            ->assertCanSeeTableRecords([$aTraiter])
            ->assertCanNotSeeTableRecords([$traite]);
    }

    public function test_le_menu_compte_uniquement_les_messages_a_traiter(): void
    {
        $this->assertNull(ContactResource::getNavigationBadge());

        $this->contact();
        $this->contact()->forceFill(['traite' => true])->save();
        $this->commentaireDArticle();

        $this->assertSame('1', ContactResource::getNavigationBadge());
    }

    public function test_on_ne_cree_pas_de_contact_depuis_l_administration(): void
    {
        $this->connecter();

        $this->get('/admin/contacts/create')->assertNotFound();
    }

    public function test_supprimer_un_message_garde_le_compte_de_la_personne(): void
    {
        $contact = $this->contact();
        $this->connecter();

        Livewire::test(ViewContact::class, ['record' => $contact->getRouteKey()])->callAction(DeleteAction::class);

        $this->assertModelMissing($contact);
        $this->assertDatabaseHas('users', ['email' => 'marie@example.com']);
    }
}
