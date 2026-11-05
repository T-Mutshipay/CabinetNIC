@php
    $container = 'mx-auto max-w-[1440px] px-gutter-mobile md:px-gutter-tablet lg:px-margin';
    $colonnes =
        'grid grid-cols-1 gap-x-12 lg:grid-cols-[minmax(0,1fr)_20rem] xl:grid-cols-[minmax(0,1fr)_26rem] xl:gap-x-20';
    $lecture = 'max-w-[44rem]';
    $typo = fn(string $texte): string => preg_replace(['/ (?=[:;?!»])/u', '/(?<=«) /u'], "\u{A0}", $texte);

    $visuel = $actualite->visuel;
    $contenu = trim($actualite->contenu);
    $paragraphes = preg_split('/\R{2,}/', $contenu);
    $minutes = max(1, (int) ceil(count(preg_split('/\s+/', $contenu)) / 200));
    $titreLong = Str::length($actualite->titre) > 60;
    $nbCommentaires = $commentaires->count();

    $lien = route('actualites.show', $actualite);
    $lienEncode = rawurlencode($lien);
    $titreEncode = rawurlencode($actualite->titre);
    $reseaux = [
        'WhatsApp' => "https://wa.me/?text={$titreEncode}%20{$lienEncode}",
        'Facebook' => "https://www.facebook.com/sharer/sharer.php?u={$lienEncode}",
        'LinkedIn' => "https://www.linkedin.com/sharing/share-offsite/?url={$lienEncode}",
    ];
    $boutonPartage =
        'inline-flex items-center justify-center gap-2 rounded-lg bg-surface-container-low px-3 py-2.5 font-body-sm text-body-sm font-medium text-primary-container transition-colors hover:bg-primary-container hover:text-on-primary';
@endphp

<x-layouts.app :title="$actualite->titre . ' | ' . config('cabinet.name')" :description="$actualite->description" :image="$visuel" type="article">
    @if ($actualite->created_at)
        @push('meta')
            <meta property="article:published_time" content="{{ $actualite->created_at->toIso8601String() }}">
        @endpush
    @endif

    <article class="bg-surface">
        <header class="relative bg-primary-container text-on-primary">
            <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
                <div class="absolute -right-20 -top-24 hidden h-96 w-96 rounded-full bg-secondary/10 blur-3xl lg:block">
                </div>
                @unless ($visuel)
                    <span
                        class="material-symbols-outlined absolute -bottom-10 right-16 hidden text-[300px] leading-none text-on-primary/5 lg:block">account_balance</span>
                @endunless
            </div>

            <div @class([
                $container,
                $colonnes,
                'relative pt-space-xl lg:pt-16',
                'lg:pb-16' => $visuel,
                'pb-space-xl lg:pb-20' => !$visuel,
            ])>
                <div class="min-w-0 motion-safe:animate-fade-up">
                    <a href="{{ route('actualites') }}"
                        class="group inline-flex items-center gap-2 font-label-md text-label-md uppercase tracking-wider text-secondary-fixed transition-colors hover:text-on-primary">
                        <span
                            class="material-symbols-outlined text-[18px] transition-transform duration-200 group-hover:-translate-x-1"
                            aria-hidden="true">arrow_back</span>
                        Toutes les actualités
                    </a>

                    <div class="mt-space-xl flex items-center gap-space-xs">
                        <span class="h-2 w-2 rounded-full bg-secondary-fixed"></span>
                        <span class="font-label-md text-label-md uppercase tracking-widest text-secondary-fixed">Veille
                            juridique</span>
                    </div>

                    <h1 @class([
                        'mt-space-md text-balance break-words lining-nums',
                        'font-headline-lg-mobile text-headline-lg-mobile lg:text-headline-lg' => $titreLong,
                        'font-display-hero-mobile text-display-hero-mobile lg:text-display-hero' => !$titreLong,
                    ])>{{ $typo($actualite->titre) }}</h1>

                    <p
                        class="mt-space-md max-w-2xl text-pretty font-body-lg text-body-lg leading-relaxed text-primary-fixed">
                        {{ $typo($actualite->description) }}</p>

                    <ul
                        class="mt-space-lg flex flex-wrap items-center gap-x-space-lg gap-y-space-sm font-body-sm text-body-sm text-primary-fixed">
                        @if ($actualite->created_at)
                            <li class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[18px] text-secondary-fixed"
                                    aria-hidden="true">calendar_today</span>
                                <time
                                    datetime="{{ $actualite->created_at->toDateString() }}">{{ $actualite->created_at->translatedFormat('j F Y') }}</time>
                            </li>
                        @endif
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px] text-secondary-fixed"
                                aria-hidden="true">schedule</span>
                            {{ $minutes }} min de lecture
                        </li>
                        @if ($nbCommentaires)
                            <li>
                                <a href="#commentaires"
                                    class="flex items-center gap-2 transition-colors hover:text-on-primary">
                                    <span class="material-symbols-outlined text-[18px] text-secondary-fixed"
                                        aria-hidden="true">chat_bubble</span>
                                    {{ $nbCommentaires }} {{ $nbCommentaires > 1 ? 'commentaires' : 'commentaire' }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>

                @if ($visuel)
                    <div
                        class="relative -mb-space-xl mt-space-xl motion-safe:animate-fade-in motion-safe:[animation-delay:200ms] lg:-mb-32 lg:mt-0 lg:self-end">
                        <div class="absolute -right-3 -top-3 hidden h-full w-full rounded-xl border border-secondary-fixed/40 sm:block"
                            aria-hidden="true"></div>
                        <img src="{{ asset($visuel) }}" alt="" fetchpriority="high"
                            class="relative aspect-[16/10] w-full rounded-xl object-cover shadow-xl lg:aspect-square">
                    </div>
                @endif
            </div>
        </header>

        <div @class([
            $container,
            $colonnes,
            'pb-16 lg:pb-24 lg:pt-16',
            'pt-24' => $visuel,
            'pt-space-xl' => !$visuel,
        ])>
            <div class="min-w-0 lg:col-start-1 lg:row-start-1">
                <div
                    class="{{ $lecture }} space-y-space-lg break-words font-body-lg text-body-lg leading-8 text-on-surface">
                    @foreach ($paragraphes as $paragraphe)
                        <p @class([
                            'text-pretty',
                            'first-letter:float-left first-letter:mr-3 first-letter:font-serif first-letter:text-[4rem] first-letter:font-semibold first-letter:leading-[0.85] first-letter:text-secondary' =>
                                $loop->first,
                        ])>{!! nl2br(e($typo($paragraphe))) !!}</p>
                    @endforeach
                </div>

                <div
                    class="{{ $lecture }} mt-space-xl flex items-center gap-space-md border-t border-outline-variant/40 pt-space-lg">
                    <img src="{{ asset('img/icon-192.png') }}" alt="" width="48" height="48"
                        class="h-12 w-12 shrink-0 object-contain" loading="lazy">
                    <p>
                        <span
                            class="block font-title-md text-title-md text-primary-container">{{ config('cabinet.name') }}</span>
                        <span class="block font-body-sm text-body-sm text-on-surface-variant">Cabinet d'avocats inscrit
                            au Barreau de Kinshasa / Gombe</span>
                    </p>
                </div>
            </div>

            <aside @class([
                'mt-space-xl lg:col-start-2 lg:row-span-2 lg:row-start-1',
                'lg:mt-10' => $visuel,
                'lg:mt-0' => !$visuel,
            ]) aria-label="Contact et partage">
                <div class="flex flex-col gap-space-md lg:sticky lg:top-28">
                    <div
                        class="relative overflow-hidden rounded-xl bg-primary-container p-space-lg text-on-primary shadow-md">
                        <div class="pointer-events-none absolute -bottom-16 -right-16 h-48 w-48 rounded-full bg-secondary/15 blur-3xl"
                            aria-hidden="true"></div>
                        <div class="relative">
                            <p class="font-headline-sm text-headline-sm">Une question sur ce sujet&nbsp;?</p>
                            <p class="mt-space-sm font-body-md text-body-md text-primary-fixed">
                                Décrivez-nous votre situation&nbsp;: un avocat du cabinet vous recontactera.</p>
                            <a href="{{ route('/') }}#contact"
                                class="group mt-space-md inline-flex w-full items-center justify-center gap-2 rounded-lg bg-secondary px-5 py-3 font-label-md text-label-md uppercase tracking-wider text-on-secondary transition-colors hover:bg-secondary-fixed hover:text-on-secondary-fixed">
                                Prendre rendez-vous
                                <span class="fleche material-symbols-outlined text-[18px]"
                                    aria-hidden="true">arrow_forward</span>
                            </a>
                            <a href="tel:{{ config('cabinet.phone_link') }}"
                                class="mt-space-md flex items-center justify-center gap-2 font-title-md text-title-md text-secondary-fixed transition-colors hover:text-on-primary">
                                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">call</span>
                                {{ config('cabinet.phone') }}
                            </a>
                        </div>
                    </div>

                    <div class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm">
                        <p class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Partager
                            cet article</p>
                        <div class="mt-space-md grid grid-cols-2 gap-space-sm">
                            @foreach ($reseaux as $nom => $url)
                                <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                                    class="{{ $boutonPartage }}">{{ $nom }}</a>
                            @endforeach
                            <a href="mailto:?subject={{ $titreEncode }}&amp;body={{ $lienEncode }}"
                                class="{{ $boutonPartage }}">Email</a>
                            <button type="button" id="copier-lien" data-lien="{{ $lien }}"
                                class="{{ $boutonPartage }} col-span-2">
                                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">link</span>
                                <span data-libelle aria-live="polite">Copier le lien</span>
                            </button>
                        </div>
                    </div>
                </div>
            </aside>

            <section id="commentaires" class="mt-16 min-w-0 lg:col-start-1 lg:row-start-2">
                <div class="{{ $lecture }}">
                    <h2
                        class="flex items-center gap-space-sm font-headline-md-mobile text-headline-md-mobile text-primary-container lg:text-headline-md">
                        Commentaires
                        @if ($nbCommentaires)
                            <span
                                class="rounded-full bg-secondary-fixed px-2.5 py-0.5 font-label-md text-label-md text-on-secondary-fixed">{{ $nbCommentaires }}</span>
                        @endif
                    </h2>

                    @if ($commentaires->isNotEmpty())
                        <ul class="mt-space-lg flex flex-col gap-space-md">
                            @foreach ($commentaires as $commentaire)
                                @php $auteur = $commentaire->user?->name ?? 'Anonyme'; @endphp
                                <li class="flex gap-space-md">
                                    <span
                                        class="mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary-container font-title-md text-title-md text-secondary-fixed"
                                        aria-hidden="true">{{ Str::upper(Str::substr($auteur, 0, 1)) }}</span>
                                    <div class="min-w-0 flex-1 rounded-xl bg-surface-container-low p-space-md">
                                        <p class="flex flex-wrap items-baseline gap-x-2">
                                            <span
                                                class="font-title-md text-title-md text-primary-container">{{ $auteur }}</span>
                                            @if ($commentaire->created_at)
                                                <time datetime="{{ $commentaire->created_at->toDateString() }}"
                                                    class="font-body-sm text-body-sm text-on-surface-variant">{{ $commentaire->created_at->translatedFormat('j F Y') }}</time>
                                            @endif
                                        </p>
                                        <p
                                            class="mt-1 whitespace-pre-line break-words font-body-md text-body-md text-on-surface-variant">
                                            {{ $commentaire->contenu }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mt-space-sm font-body-md text-body-md text-on-surface-variant">
                            Aucun commentaire pour le moment. Soyez le premier à réagir.</p>
                    @endif

                    <div class="mt-space-xl rounded-xl bg-surface-container-lowest p-space-lg shadow-sm">
                        <h3 class="font-headline-sm text-headline-sm text-primary-container">Laisser un commentaire</h3>
                        <p class="mb-space-lg mt-1 font-body-sm text-body-sm text-on-surface-variant">
                            Votre email ne sera pas publié. Votre commentaire apparaîtra après validation par le
                            cabinet.</p>
                        <x-message-form :actualite="$actualite" />
                    </div>
                </div>
            </section>
        </div>
    </article>

    @if ($autres->isNotEmpty())
        <section class="bg-surface-container py-16 lg:py-20">
            <div class="{{ $container }}">
                <div class="mb-space-xl flex flex-col justify-between gap-6 md:flex-row md:items-end" data-reveal>
                    <x-section-header surtitre="Veille juridique" titre="À lire aussi" class="mb-0" />
                    <a href="{{ route('actualites') }}"
                        class="inline-flex shrink-0 items-center gap-2 self-start rounded-lg bg-surface-container-lowest px-5 py-2.5 font-title-md text-title-md text-primary-container shadow-sm transition-colors hover:bg-secondary hover:text-on-secondary md:self-auto">
                        Toutes les actualités
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">menu_book</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3" data-reveal-stagger>
                    @foreach ($autres as $autre)
                        <x-actualite-card :actualite="$autre" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @push('scripts')
        <script>
            (() => {
                const bouton = document.getElementById('copier-lien');
                if (!bouton) return;

                // Le presse-papiers n'est disponible qu'en HTTPS
                if (!navigator.clipboard) {
                    bouton.classList.add('hidden');
                    return;
                }

                const libelle = bouton.querySelector('[data-libelle]');
                const texte = libelle.textContent;
                let minuteur;

                bouton.addEventListener('click', async () => {
                    try {
                        await navigator.clipboard.writeText(bouton.dataset.lien);
                        libelle.textContent = 'Lien copié';
                    } catch {
                        libelle.textContent = 'Copie impossible';
                    }
                    clearTimeout(minuteur);
                    minuteur = setTimeout(() => {
                        libelle.textContent = texte;
                    }, 2000);
                });
            })();
        </script>
    @endpush
</x-layouts.app>
