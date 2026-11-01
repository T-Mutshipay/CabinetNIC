<?php

use App\Mail\NouveauMessage;
use App\Models\Actualite;
use App\Models\Avocat;
use App\Models\Collaborateur;
use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome', [
    'actualites' => Actualite::latest()->take(3)->get(),
    'nbAvocats'  => Avocat::count(),
]))->name('/');

Route::get('/a-propos', fn () => view('a-propos', [
    'avocats' => Avocat::with('social_links')->get(),
    'collabs' => Collaborateur::all(),
]))->name('a-propos');

Route::get('/actualites', fn () => view('actualites', [
    'actualites' => Actualite::latest()->get(),
]))->name('actualites');

Route::get('/articles/{actualite}', fn (Actualite $actualite) => view('articles', [
    'actualite'    => $actualite,
    'commentaires' => Commentaire::with('user')->whereBelongsTo($actualite)->valides()->latest()->get(),
]))->name('actualites.show');

Route::get('/domaines-d-intervention', fn () => view('domaines'))->name('domaines');

Route::get('/honoraires', function () {
    $file = public_path(config('cabinet.honoraires_pdf'));
    abort_unless(is_file($file), 404);

    return response()->file($file);
})->name('honoraires');

Route::post('/commentaires', function (Request $request) {
    $data = $request->validate([
        'name'         => ['required', 'string', 'max:255'],
        'email'        => ['required', 'string', 'email', 'max:255'],
        'comment'      => ['required', 'string', 'max:500'],
        'actualite_id' => ['nullable', 'integer', 'exists:actualites,id'],
    ], [
        'required' => 'Ce champ est obligatoire.',
        'email'    => 'Veuillez saisir une adresse email valide.',
        'max'      => 'Ce champ ne peut pas dépasser :max caractères.',
        'actualite_id.*' => "L'article concerné est introuvable.",
    ]);

    // Champ piège invisible : seul un robot le remplit. 
    if ($request->filled('site_web')) {
        return back()->with('success', 'Merci, votre message a bien été envoyé.');
    }

    $user = User::firstOrCreate(['email' => $data['email']], ['name' => $data['name']]);

    $commentaire = Commentaire::create([
        'user_id'      => $user->id,
        'actualite_id' => $data['actualite_id'] ?? null,
        'contenu'      => $data['comment'],
    ]);

    // Le cabinet est prévenu par email ; un échec d'envoi ne doit pas faire échouer le formulaire
    try {
        Mail::to(config('cabinet.email'))->send(new NouveauMessage($commentaire));
    } catch (Throwable $e) {
        report($e);
    }

    return back()->with('success', $commentaire->actualite_id
        ? 'Merci, votre commentaire sera publié après validation par le cabinet.'
        : 'Merci, votre message a bien été envoyé. Nous vous répondrons rapidement.');
})->middleware('throttle:5,1')->name('comment.store');

// Modération des commentaires d'articles, via les liens signés envoyés par email au cabinet.
// Le GET n'affiche qu'une confirmation : les messageries qui ouvrent les liens pour les analyser ne déclenchent rien.
Route::middleware('signed')->prefix('moderation/commentaires/{commentaire}')->group(function () {
    Route::get('/publier', fn (Commentaire $commentaire) => view('moderation', [
        'commentaire' => $commentaire, 'action' => 'publier',
    ]))->name('moderation.publier');

    Route::get('/supprimer', fn (Commentaire $commentaire) => view('moderation', [
        'commentaire' => $commentaire, 'action' => 'supprimer',
    ]))->name('moderation.supprimer');

    Route::post('/publier', function (Commentaire $commentaire) {
        $commentaire->forceFill(['valide' => true])->save();

        return redirect()->route('actualites.show', $commentaire->actualite_id)
            ->with('success', 'Le commentaire est maintenant publié.');
    });

    Route::post('/supprimer', function (Commentaire $commentaire) {
        $commentaire->delete();

        return redirect()->route('/')->with('success', 'Le commentaire a été supprimé.');
    });
});

// SEO : plan du site et robots.txt 
Route::get('/sitemap.xml', function () {
    $pages = collect([
        ['loc' => route('/'), 'lastmod' => null],
        ['loc' => route('a-propos'), 'lastmod' => null],
        ['loc' => route('domaines'), 'lastmod' => null],
        ['loc' => route('actualites'), 'lastmod' => Actualite::max('updated_at')],
    ])->merge(Actualite::latest()->get()->map(fn (Actualite $a) => [
        'loc'     => route('actualites.show', $a),
        'lastmod' => $a->updated_at,
    ]));

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
        . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n"
        . $pages->map(fn ($p) => '  <url><loc>' . e($p['loc']) . '</loc>'
            . ($p['lastmod'] ? '<lastmod>' . Carbon::parse($p['lastmod'])->toDateString() . '</lastmod>' : '')
            . '</url>')->implode("\n")
        . "\n</urlset>\n";

    return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
})->name('sitemap');

Route::get('/robots.txt', fn () => response(
    app()->isProduction()
        ? "User-agent: *\nDisallow:\n\nSitemap: " . route('sitemap') . "\n"
        : "User-agent: *\nDisallow: /\n",
    200,
    ['Content-Type' => 'text/plain; charset=UTF-8'],
));

// Anciennes URL
Route::redirect('/welcome', '/', 301);
Route::redirect('/avocats', '/a-propos#equipe', 301);