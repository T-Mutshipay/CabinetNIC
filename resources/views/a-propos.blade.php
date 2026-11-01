@php $container = 'mx-auto max-w-[1440px] px-gutter-mobile md:px-gutter-tablet lg:px-margin'; @endphp

<x-layouts.app :title="'À propos | ' . config('cabinet.name')"
    description="Découvrez le cabinet N.I.C & Associés, inscrit au Barreau de Kinshasa / Gombe : notre histoire, nos valeurs et notre équipe d'avocats.">

    {{-- 1. Présentation --}}
    <section class="bg-gradient-to-br from-surface via-surface to-secondary-fixed/30 py-12 lg:py-20">
        <div class="{{ $container }}">
            <div class="flex max-w-3xl flex-col items-start gap-space-lg">
                <div class="flex items-center gap-space-xs motion-safe:animate-fade-up">
                    <span class="h-2 w-2 rounded-full bg-secondary"></span>
                    <span class="font-label-md text-label-md uppercase tracking-widest text-secondary">
                        Histoire & vision • Kinshasa • RDC</span>
                </div>
                <h1
                    class="font-display-hero-mobile text-display-hero-mobile tracking-tight text-primary-container motion-safe:animate-fade-up motion-safe:[animation-delay:100ms] lg:text-display-hero">
                    Un cabinet ancré à Kinshasa, au service de vos droits
                </h1>
                <p
                    class="font-body-lg text-body-lg leading-relaxed text-on-surface-variant motion-safe:animate-fade-up motion-safe:[animation-delay:200ms]">
                    {{ config('cabinet.name') }} est un cabinet d'avocats inscrit au Barreau de Kinshasa / Gombe, fondé
                    par Me Christian Ngandu Ilunga. Nous conjuguons une connaissance fine du droit congolais et du droit
                    OHADA pour conseiller, assister et représenter nos clients, particuliers comme entreprises.
                </p>
                <div class="flex flex-wrap items-center gap-4 motion-safe:animate-fade-up motion-safe:[animation-delay:300ms]">
                    <a href="{{ route('/') }}#contact"
                        class="group inline-flex items-center gap-2 rounded-lg bg-primary-container px-6 py-3 font-label-md text-label-md uppercase tracking-wider text-on-primary shadow-md transition-colors hover:bg-secondary">
                        Prendre rendez-vous
                        <span class="fleche material-symbols-outlined text-[18px]" aria-hidden="true">arrow_forward</span>
                    </a>
                    <a href="#equipe"
                        class="inline-flex items-center gap-2 rounded-lg bg-surface-container-lowest px-6 py-3 font-label-md text-label-md uppercase tracking-wider text-primary-container shadow-sm transition-colors hover:bg-surface-container-high">
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">groups</span>
                        Notre équipe
                    </a>
                </div>
            </div>

            <dl
                class="mt-space-xl grid grid-cols-2 gap-space-lg rounded-xl bg-surface-container-lowest p-space-lg shadow-sm motion-safe:animate-fade-up motion-safe:[animation-delay:400ms] md:grid-cols-4">
                {{-- Le 3e élément indique si le chiffre défile (une année ne se « compte » pas) --}}
                @foreach ([
                    [config('cabinet.fondateur_inscrit_en'), false, 'Inscription au Barreau', 'Avocat fondateur, Kinshasa / Gombe'],
                    [$avocats->count(), true, 'Avocats', 'Au service de vos dossiers'],
                    [count(config('cabinet.domaines')), true, "Domaines d'intervention", 'Conseil et contentieux'],
                    [count(config('cabinet.services')), true, 'Pôles de services', 'Du conseil à la représentation'],
                ] as [$chiffre, $compteur, $libelle, $detail])
                    <div class="flex flex-col border-outline-variant/40 md:border-l md:pl-space-lg md:first:border-l-0 md:first:pl-0">
                        <dt class="order-2 mt-1 font-title-md text-title-md text-on-surface">{{ $libelle }}</dt>
                        <dd class="order-1 font-headline-lg text-headline-lg text-primary-container">
                            <span @if ($compteur) data-count="{{ $chiffre }}" @endif>{{ $chiffre }}</span></dd>
                        <span class="order-3 font-body-sm text-body-sm text-on-surface-variant">{{ $detail }}</span>
                    </div>
                @endforeach
            </dl>
        </div>
    </section>

    {{-- 2. Valeurs --}}
    <section class="bg-surface-container-low py-20">
        <div class="{{ $container }}">
            <div class="mb-space-xl flex flex-col justify-between gap-space-md lg:flex-row lg:items-end" data-reveal>
                <x-section-header surtitre="Fondements" titre="Nos valeurs fondatrices" class="mb-0" />
                <p class="max-w-md font-body-md text-body-md text-on-surface-variant">
                    La confiance de nos clients repose sur une éthique exigeante et une discipline de chaque instant.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-space-md md:grid-cols-3" data-reveal-stagger>
                @foreach (config('cabinet.valeurs') as $valeur)
                    <article class="carte-survol flex flex-col gap-space-md rounded-xl bg-surface-container-lowest p-8 shadow-sm">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-surface-container text-primary-container">
                            <span class="material-symbols-outlined" aria-hidden="true">{{ $valeur['icon'] }}</span>
                        </div>
                        <div>
                            <span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">
                                {{ sprintf('%02d', $loop->iteration) }}</span>
                            <h3 class="mt-1 font-headline-sm text-headline-sm text-primary-container">{{ $valeur['titre'] }}</h3>
                        </div>
                        <p class="font-body-md text-body-md leading-relaxed text-on-surface-variant">{{ $valeur['texte'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 3. Équipe --}}
    <section id="equipe" class="bg-surface py-20">
        <div class="{{ $container }}">
            <x-section-header surtitre="L'équipe" titre="Nos avocats" data-reveal>
                Expertise, dévouement et excellence au service de vos droits.
            </x-section-header>

            @php
                $fondateur = $avocats->first();
                $autres = $avocats->slice(1);
            @endphp

            <div class="flex flex-col gap-space-xl">
                @if ($fondateur)
                    <div data-reveal>
                        <x-avocat-card :avocat="$fondateur" featured />
                    </div>
                @endif

                @if ($autres->isNotEmpty())
                    <div class="grid grid-cols-1 gap-space-md md:grid-cols-2 lg:grid-cols-3" data-reveal-stagger>
                        @foreach ($autres as $avocat)
                            <x-avocat-card :avocat="$avocat" />
                        @endforeach
                    </div>
                @endif
            </div>

            @if ($collabs->isNotEmpty())
                <h3 class="mb-space-lg mt-20 font-headline-md-mobile text-headline-md-mobile text-primary-container lg:text-headline-md"
                    data-reveal>
                    Équipe de soutien</h3>
                <div class="grid grid-cols-1 gap-space-md sm:grid-cols-2 lg:grid-cols-4" data-reveal-stagger>
                    @foreach ($collabs as $collaborateur)
                        <article
                            class="carte-survol group overflow-hidden rounded-xl border border-outline-variant/40 bg-surface-container-lowest">
                            <div class="aspect-square overflow-hidden bg-surface-container-high">
                                <img src="{{ asset($collaborateur->image) }}" alt="{{ $collaborateur->nom_complet }}"
                                    class="h-full w-full object-cover object-top transition-transform duration-700 ease-out motion-safe:group-hover:scale-105"
                                    loading="lazy">
                            </div>
                            <div class="flex flex-col gap-space-xs p-space-lg">
                                <p class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">
                                    {{ $collaborateur->post }}</p>
                                <h4 class="font-headline-sm text-headline-sm text-primary-container">
                                    {{ $collaborateur->nom_complet }}</h4>
                                @if ($collaborateur->description)
                                    <p class="font-body-sm text-body-sm text-on-surface-variant">{{ $collaborateur->description }}</p>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- 4. Devise --}}
    <section class="bg-primary-container py-20 text-center">
        <div class="{{ $container }}" data-reveal>
            <span class="font-headline-lg text-headline-lg text-secondary-fixed" aria-hidden="true">“</span>
            <blockquote>
                <p class="font-headline-lg-mobile text-headline-lg-mobile italic text-on-primary lg:text-display-hero">
                    {{ config('cabinet.devise') }}
                </p>
                <footer class="mt-space-md font-label-md text-label-md uppercase tracking-widest text-on-primary-container">
                    Devise du cabinet {{ config('cabinet.name') }}
                </footer>
            </blockquote>
        </div>
    </section>

    {{-- 5. Appel à l'action --}}
    <section class="bg-surface py-20">
        <div class="{{ $container }}">
            <div data-reveal
                class="flex flex-col items-start justify-between gap-space-lg rounded-xl bg-surface-container-low p-space-lg lg:flex-row lg:items-center lg:p-space-xl">
                <div class="max-w-2xl">
                    <h2 class="font-headline-md-mobile text-headline-md-mobile text-primary-container lg:text-headline-md">
                        Confiez-nous votre dossier</h2>
                    <p class="mt-space-sm font-body-md text-body-md text-on-surface-variant">
                        Nous vous recevons à notre cabinet : {{ implode(', ', config('cabinet.address')) }}.
                    </p>
                </div>
                <div class="flex w-full flex-col gap-space-sm sm:w-auto">
                    <a href="{{ route('/') }}#contact"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-primary-container px-6 py-3 font-label-md text-label-md uppercase tracking-wider text-on-primary transition-colors hover:bg-secondary">
                        Prendre rendez-vous
                    </a>
                    <a href="tel:{{ config('cabinet.phone_link') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-surface-container-lowest px-6 py-3 font-title-md text-title-md text-primary-container hover:bg-surface-container-high">
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">call</span>
                        {{ config('cabinet.phone') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
