<?php

namespace Tests\Feature;

use App\Filament\Resources\Actualites\Pages\CreateActualite;
use App\Filament\Resources\Actualites\Pages\EditActualite;
use App\Filament\Resources\Actualites\Pages\ListActualites;
use App\Filament\Resources\Avocats\Pages\CreateAvocat;
use App\Filament\Resources\Avocats\Pages\EditAvocat;
use App\Filament\Resources\Avocats\Pages\ListAvocats;
use App\Filament\Resources\Collaborateurs\Pages\CreateCollaborateur;
use App\Filament\Resources\Collaborateurs\Pages\EditCollaborateur;
use App\Filament\Resources\Collaborateurs\Pages\ListCollaborateurs;
use App\Models\Actualite;
use App\Models\Avocat;
use App\Models\Collaborateur;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Actions\Testing\TestAction;
use Filament\Auth\Pages\Login;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('site');
    }

    private function admin(): User
    {
        return User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => 'mot-de-passe-solide']);
    }

    private function avocat(string $image = 'img/fond.jpg'): Avocat
    {
        return Avocat::create(['nom_complet' => 'Me Test', 'email' => 'me@example.com', 'image' => $image]);
    }

    private function image(string $nom = 'photo.jpg'): UploadedFile
    {
        return UploadedFile::fake()->image($nom, 100, 100);
    }

    public function test_un_visiteur_est_renvoye_vers_la_connexion(): void
    {
        $this->get('/admin/avocats')->assertRedirect('/admin/login');
    }

    public function test_un_administrateur_peut_se_connecter_avec_se_souvenir_de_moi(): void
    {
        $admin = $this->admin();

        Livewire::test(Login::class)
            ->fillForm(['email' => $admin->email, 'password' => 'mot-de-passe-solide', 'remember' => true])
            ->call('authenticate')
            ->assertHasNoFormErrors();

        $this->assertAuthenticatedAs($admin);
        $this->assertNotNull($admin->refresh()->remember_token);
    }

    public function test_un_visiteur_qui_a_commente_n_a_pas_acces(): void
    {
        $user = User::create(['name' => 'Visiteur', 'email' => 'visiteur@example.com']);

        $this->actingAs($user)->get('/admin/avocats')->assertForbidden();
    }

    public function test_un_compte_sans_mot_de_passe_ne_peut_pas_se_connecter(): void
    {
        User::create(['name' => 'Visiteur', 'email' => 'visiteur@example.com']);

        $this->assertFalse(auth()->attempt(['email' => 'visiteur@example.com', 'password' => '']));
    }

    public function test_le_formulaire_public_ne_peut_pas_creer_d_admin(): void
    {
        $this->post('/commentaires', [
            'name' => 'Pirate', 'email' => 'pirate@example.com', 'comment' => 'Bonjour',
            'password' => 'mot-de-passe-du-pirate',
        ]);

        $user = User::where('email', 'pirate@example.com')->firstOrFail();
        $this->assertNull($user->password);
        $this->actingAs($user)->get('/admin/avocats')->assertForbidden();
    }

    public function test_les_pages_de_liste_s_affichent_avec_les_en_tetes_de_securite(): void
    {
        $this->avocat();
        $this->actingAs($this->admin());

        foreach (['avocats', 'collaborateurs', 'actualites'] as $page) {
            $this->get("/admin/$page")->assertOk()->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        }
    }

    public function test_creer_un_avocat_avec_photo_et_reseaux(): void
    {
        $this->actingAs($this->admin());

        Livewire::test(CreateAvocat::class)
            ->fillForm([
                'nom_complet' => 'Me Dupont',
                'email' => 'dupont@example.com',
                'role' => 'Avocat',
                'image' => $this->image(),
                'social_links' => [['plateforme' => 'LinkedIn', 'url' => 'https://linkedin.com/in/dupont']],
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $avocat = Avocat::where('email', 'dupont@example.com')->firstOrFail();
        $this->assertStringStartsWith('img/uploads/avocats/', $avocat->image);
        Storage::disk('site')->assertExists($avocat->image);
        $this->assertSame('LinkedIn', $avocat->social_links()->first()->plateforme);

        // La fiche publique trouve l'image là où asset() la cherche
        $this->get('/a-propos')->assertOk()->assertSee($avocat->image);
    }

    public function test_un_email_d_avocat_en_double_est_refuse(): void
    {
        $this->avocat();
        $this->actingAs($this->admin());

        Livewire::test(CreateAvocat::class)
            ->fillForm(['nom_complet' => 'Me Bis', 'email' => 'me@example.com', 'image' => $this->image()])
            ->call('create')
            ->assertHasFormErrors(['email' => 'unique']);
    }

    public function test_modifier_un_avocat_garde_son_email_et_son_image_d_origine(): void
    {
        Storage::disk('site')->put('img/fond.jpg', 'x');
        $avocat = $this->avocat();
        $this->actingAs($this->admin());

        Livewire::test(EditAvocat::class, ['record' => $avocat->getRouteKey()])
            ->fillForm(['role' => 'Avocat Fondateur'])
            ->call('save')
            ->assertHasNoFormErrors();

        $avocat->refresh();
        $this->assertSame('Avocat Fondateur', $avocat->role);
        $this->assertSame('img/fond.jpg', $avocat->image);
    }

    public function test_un_svg_est_refuse(): void
    {
        $this->actingAs($this->admin());

        Livewire::test(CreateAvocat::class)
            ->fillForm([
                'nom_complet' => 'Me Svg',
                'email' => 'svg@example.com',
                'image' => UploadedFile::fake()->createWithContent('a.svg', '<svg xmlns="http://www.w3.org/2000/svg"><script>alert(1)</script></svg>'),
            ])
            ->call('create')
            ->assertHasFormErrors(['image']);

        $this->assertSame(0, Avocat::count());
    }

    public function test_remplacer_une_image_uploadee_supprime_l_ancienne(): void
    {
        Storage::disk('site')->put('img/uploads/avocats/ancienne.jpg', 'x');
        $avocat = $this->avocat('img/uploads/avocats/ancienne.jpg');

        $avocat->update(['image' => 'img/uploads/avocats/nouvelle.jpg']);

        Storage::disk('site')->assertMissing('img/uploads/avocats/ancienne.jpg');
    }

    public function test_une_image_d_origine_n_est_jamais_supprimee(): void
    {
        Storage::disk('site')->put('img/fond.jpg', 'x');
        $avocat = $this->avocat('img/fond.jpg');

        $avocat->update(['image' => 'img/uploads/avocats/nouvelle.jpg']);
        Actualite::create(['titre' => 'T', 'description' => 'D', 'contenu' => 'C', 'image' => 'img/fond.jpg'])->delete();

        Storage::disk('site')->assertExists('img/fond.jpg');
    }

    public function test_supprimer_un_avocat_efface_sa_photo_uploadee(): void
    {
        Storage::disk('site')->put('img/uploads/avocats/photo.jpg', 'x');
        $avocat = $this->avocat('img/uploads/avocats/photo.jpg');
        $this->actingAs($this->admin());

        Livewire::test(EditAvocat::class, ['record' => $avocat->getRouteKey()])
            ->callAction(DeleteAction::class);

        $this->assertModelMissing($avocat);
        Storage::disk('site')->assertMissing('img/uploads/avocats/photo.jpg');
    }

    public function test_la_suppression_groupee_efface_aussi_les_photos(): void
    {
        Storage::disk('site')->put('img/uploads/avocats/photo.jpg', 'x');
        $avocat = $this->avocat('img/uploads/avocats/photo.jpg');
        $this->actingAs($this->admin());

        Livewire::test(ListAvocats::class)
            ->selectTableRecords([$avocat->getKey()])
            ->callAction(TestAction::make('delete')->table()->bulk());

        $this->assertModelMissing($avocat);
        Storage::disk('site')->assertMissing('img/uploads/avocats/photo.jpg');
    }

    public function test_crud_collaborateur(): void
    {
        $this->actingAs($this->admin());

        Livewire::test(CreateCollaborateur::class)
            ->fillForm([
                'nom_complet' => 'Marie',
                'email' => 'marie@example.com',
                'post' => 'Secrétaire',
                'description' => 'Accueil',
                'image' => $this->image(),
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $collaborateur = Collaborateur::where('email', 'marie@example.com')->firstOrFail();

        Livewire::test(ListCollaborateurs::class)->assertCanSeeTableRecords([$collaborateur]);

        Livewire::test(EditCollaborateur::class, ['record' => $collaborateur->getRouteKey()])
            ->fillForm(['post' => 'Assistante'])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame('Assistante', $collaborateur->refresh()->post);

        Livewire::test(EditCollaborateur::class, ['record' => $collaborateur->getRouteKey()])
            ->callAction(DeleteAction::class);

        $this->assertModelMissing($collaborateur);
    }

    public function test_crud_actualite_et_affichage_public(): void
    {
        $this->actingAs($this->admin());

        Livewire::test(CreateActualite::class)
            ->fillForm([
                'titre' => 'Nouvelle loi',
                'description' => 'Résumé',
                'contenu' => "Premier paragraphe\nDeuxième <b>paragraphe</b>",
                'image' => $this->image(),
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $actualite = Actualite::where('titre', 'Nouvelle loi')->firstOrFail();

        Livewire::test(ListActualites::class)->assertCanSeeTableRecords([$actualite]);

        $this->get(route('actualites.show', $actualite))
            ->assertOk()
            ->assertSee('Premier paragraphe')
            ->assertSee('&lt;b&gt;paragraphe&lt;/b&gt;', false);

        Livewire::test(EditActualite::class, ['record' => $actualite->getRouteKey()])
            ->fillForm(['titre' => 'Loi modifiée'])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame('Loi modifiée', $actualite->refresh()->titre);

        Livewire::test(EditActualite::class, ['record' => $actualite->getRouteKey()])
            ->callAction(DeleteAction::class);

        $this->assertModelMissing($actualite);
    }

    public function test_make_filament_user_cree_un_compte_qui_a_acces_a_l_administration(): void
    {
        $this->artisan('make:filament-user', [
            '--name' => 'Chef', '--email' => 'chef@example.com', '--password' => 'mot-de-passe-solide',
        ])->assertSuccessful();

        $this->assertTrue(auth()->attempt(['email' => 'chef@example.com', 'password' => 'mot-de-passe-solide']));
        $this->get('/admin/avocats')->assertOk();
    }

    public function test_les_images_restent_sur_le_serveur_qui_affiche_la_page(): void
    {
        // Storage::fake ignore l'URL configurée : on construit ici le vrai disque.
        // Une URL absolue tirée de APP_URL pointerait vers un autre serveur que celui affiché dans le navigateur.
        $disque = Storage::build(config('filesystems.disks.site'));

        $this->assertSame('/img/fond.jpg', $disque->url('img/fond.jpg'));
    }
}
