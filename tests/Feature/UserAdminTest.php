<?php

namespace Tests\Feature;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Models\Commentaire;
use App\Models\User;
use Filament\Actions\Testing\TestAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class UserAdminTest extends TestCase
{
    use RefreshDatabase;

    private const MOT_DE_PASSE = 'mot-de-passe-solide';

    private function admin(string $email = 'admin@example.com'): User
    {
        return User::create(['name' => 'Admin', 'email' => $email, 'password' => self::MOT_DE_PASSE]);
    }

    private function visiteur(): User
    {
        return User::create(['name' => 'Visiteur', 'email' => 'visiteur@example.com']);
    }

    private function donnees(array $autres = []): array
    {
        return [
            'name' => 'Nouvelle Personne',
            'email' => 'nouvelle@example.com',
            'password' => 'un-autre-mot-de-passe',
            'password_confirmation' => 'un-autre-mot-de-passe',
            ...$autres,
        ];
    }

    public function test_il_n_y_a_pas_d_inscription_publique(): void
    {
        $this->get('/admin/register')->assertNotFound();
    }

    public function test_seul_un_compte_avec_mot_de_passe_ouvre_la_section(): void
    {
        $this->get('/admin/utilisateurs')->assertRedirect('/admin/login');
        $this->actingAs($this->visiteur())->get('/admin/utilisateurs')->assertForbidden();
    }

    public function test_la_liste_n_affiche_pas_les_visiteurs_qui_commentent(): void
    {
        $admin = $this->admin();
        $visiteur = $this->visiteur();
        $this->actingAs($admin);

        Livewire::test(ListUsers::class)
            ->assertCanSeeTableRecords([$admin])
            ->assertCanNotSeeTableRecords([$visiteur]);

        $this->get("/admin/utilisateurs/{$visiteur->id}/edit")->assertNotFound();
    }

    public function test_un_compte_cree_peut_se_connecter_et_accede_a_l_administration(): void
    {
        $this->actingAs($this->admin());

        Livewire::test(CreateUser::class)->fillForm($this->donnees())->call('create')->assertHasNoFormErrors();

        $compte = User::where('email', 'nouvelle@example.com')->firstOrFail();
        $this->assertNotSame('un-autre-mot-de-passe', $compte->password);
        $this->assertTrue(Hash::check('un-autre-mot-de-passe', $compte->password));

        auth()->logout();
        $this->assertTrue(auth()->attempt(['email' => 'nouvelle@example.com', 'password' => 'un-autre-mot-de-passe']));
        $this->get('/admin/avocats')->assertOk();
    }

    public function test_le_mot_de_passe_est_controle_a_la_creation(): void
    {
        $this->actingAs($this->admin());
        $erreurs = fn (array $autres) => Livewire::test(CreateUser::class)->fillForm($this->donnees($autres))->call('create');

        $erreurs(['password' => null, 'password_confirmation' => null])->assertHasFormErrors(['password' => 'required']);
        $erreurs(['password' => 'court', 'password_confirmation' => 'court'])->assertHasFormErrors(['password' => 'min']);
        $erreurs(['password_confirmation' => 'different-du-premier'])->assertHasFormErrors(['password_confirmation' => 'same']);
        $erreurs(['password_confirmation' => null])->assertHasFormErrors(['password_confirmation']);

        $this->assertDatabaseMissing('users', ['email' => 'nouvelle@example.com']);
    }

    public function test_l_email_d_un_compte_existant_est_refuse(): void
    {
        $this->actingAs($this->admin());

        Livewire::test(CreateUser::class)
            ->fillForm($this->donnees(['email' => 'admin@example.com']))
            ->call('create')
            ->assertHasFormErrors(['email' => 'unique']);
    }

    public function test_une_personne_qui_a_commente_recoit_l_acces_sans_doublon(): void
    {
        $visiteur = $this->visiteur();
        $commentaire = Commentaire::create(['user_id' => $visiteur->id, 'contenu' => 'Bonjour']);
        $this->actingAs($this->admin());

        Livewire::test(CreateUser::class)
            ->fillForm($this->donnees(['email' => $visiteur->email]))
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertSame(1, User::where('email', $visiteur->email)->count());
        $this->assertTrue(Hash::check('un-autre-mot-de-passe', $visiteur->refresh()->password));
        $this->assertModelExists($commentaire);
    }

    public function test_modifier_sans_mot_de_passe_garde_l_actuel_et_n_expose_pas_le_hash(): void
    {
        $compte = $this->admin('autre@example.com');
        $this->actingAs($this->admin());
        $avant = $compte->password;

        Livewire::test(EditUser::class, ['record' => $compte->getRouteKey()])
            ->assertSchemaStateSet(['password' => null])
            ->assertDontSeeHtml($avant)
            ->fillForm(['name' => 'Nouveau nom'])
            ->call('save')
            ->assertHasNoFormErrors();

        $compte->refresh();
        $this->assertSame('Nouveau nom', $compte->name);
        $this->assertSame($avant, $compte->password);
    }

    public function test_modifier_le_mot_de_passe(): void
    {
        $compte = $this->admin('autre@example.com');
        $this->actingAs($this->admin());

        Livewire::test(EditUser::class, ['record' => $compte->getRouteKey()])
            ->fillForm(['password' => 'nouveau-mot-de-passe', 'password_confirmation' => 'nouveau-mot-de-passe'])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertTrue(Hash::check('nouveau-mot-de-passe', $compte->refresh()->password));
    }

    public function test_changer_son_email_pour_celui_d_un_visiteur_est_refuse_proprement(): void
    {
        $visiteur = $this->visiteur();
        $compte = $this->admin('autre@example.com');
        $this->actingAs($this->admin());

        Livewire::test(EditUser::class, ['record' => $compte->getRouteKey()])
            ->fillForm(['email' => $visiteur->email])
            ->call('save')
            ->assertHasFormErrors(['email' => 'unique']);
    }

    public function test_retirer_l_acces_garde_le_compte_et_ses_commentaires(): void
    {
        $compte = $this->admin('autre@example.com');
        $commentaire = Commentaire::create(['user_id' => $compte->id, 'contenu' => 'Bonjour']);
        $this->actingAs($this->admin());

        Livewire::test(ListUsers::class)
            ->callAction(TestAction::make('retirerAcces')->table($compte))
            ->assertCanNotSeeTableRecords([$compte]);

        $this->assertNull($compte->refresh()->password);
        $this->assertModelExists($commentaire);

        auth()->logout();
        $this->assertFalse(auth()->attempt(['email' => 'autre@example.com', 'password' => self::MOT_DE_PASSE]));
        $this->actingAs($compte)->get('/admin/avocats')->assertForbidden();
    }

    public function test_on_ne_peut_pas_se_retirer_l_acces_a_soi_meme(): void
    {
        $moi = $this->admin();
        $this->actingAs($moi);

        Livewire::test(ListUsers::class)->assertActionHidden(TestAction::make('retirerAcces')->table($moi));
    }

    public function test_le_formulaire_public_ne_change_pas_un_compte_existant(): void
    {
        $compte = $this->admin();
        $avant = $compte->password;

        $this->post('/commentaires', [
            'name' => 'Usurpateur', 'email' => 'admin@example.com', 'comment' => 'Bonjour', 'password' => 'pirate-pirate-pirate',
        ]);

        $compte->refresh();
        $this->assertSame('Admin', $compte->name);
        $this->assertSame($avant, $compte->password);
    }
}
