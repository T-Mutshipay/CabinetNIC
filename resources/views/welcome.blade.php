@php $container = 'mx-auto max-w-[1440px] px-gutter-mobile md:px-gutter-tablet lg:px-margin'; @endphp

<x-layouts.app
    description="Cabinet d'avocats à Kinshasa : conseil, assistance et représentation en droit des affaires, du travail, de la famille, immobilier et recouvrement.">

    @php
        $schema = [
                '@context' => 'https://schema.org',
                '@type' => 'LegalService',
                'name' => config('cabinet.name'),
                'description' => config('cabinet.description'),
                'url' => route('/'),
                'logo' => asset('img/icon-192.png'),
                'image' => asset(config('cabinet.og_image')),
                'telephone' => config('cabinet.phone_link'),
                'email' => config('cabinet.email'),
                'address' => ['@type' => 'PostalAddress'] + config('cabinet.adresse_structuree'),
                'areaServed' => 'République Démocratique du Congo',
                'knowsAbout' => array_column(config('cabinet.domaines'), 'titre'),
                'sameAs' => array_column(config('cabinet.reseaux'), 'url'),
        ];
    @endphp
    @push('meta')
        <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}</script>
    @endpush

    {{-- 1. Bannière --}}
    <section class="overflow-hidden bg-surface py-12 lg:py-20">
        <div class="{{ $container }} grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-8">
            <div class="flex flex-col items-start gap-space-xl lg:col-span-7">
                <div
                    class="inline-flex items-center gap-2.5 rounded-lg bg-surface-container-low px-3.5 py-1.5 shadow-sm motion-safe:animate-fade-up">
                    <span class="h-2 w-2 rounded-full bg-secondary"></span>
                    <span class="font-label-sm text-label-sm font-semibold uppercase tracking-wider text-secondary">
                        Barreau de Kinshasa / Gombe • Espace OHADA
                    </span>
                </div>

                <div class="flex max-w-2xl flex-col gap-space-md motion-safe:animate-fade-up motion-safe:[animation-delay:120ms]">
                    <h1
                        class="font-display-hero-mobile text-display-hero-mobile tracking-tight text-primary-container lg:text-display-hero">
                        Défendre vos droits, avec rigueur et engagement
                    </h1>
                    <p class="font-body-lg text-body-lg leading-relaxed text-on-surface-variant">
                        {{ config('cabinet.description') }} Nous accompagnons particuliers et entreprises à Kinshasa,
                        en conseil comme en contentieux.
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-4 motion-safe:animate-fade-up motion-safe:[animation-delay:240ms]">
                    <a href="#contact"
                        class="inline-flex items-center gap-2 rounded-lg bg-secondary px-6 py-3.5 font-title-md text-title-md text-on-secondary shadow-md transition duration-200 hover:bg-primary-container hover:text-secondary-fixed motion-safe:hover:-translate-y-0.5">
                        Prendre rendez-vous
                        <span class="material-symbols-outlined text-[20px]" aria-hidden="true">calendar_today</span>
                    </a>
                    <a href="{{ route('honoraires') }}" target="_blank" rel="noopener"
                        class="inline-flex items-center gap-2 rounded-lg bg-surface-container-lowest px-6 py-3.5 font-title-md text-title-md text-primary-container shadow-sm transition duration-200 hover:bg-surface-container-high motion-safe:hover:-translate-y-0.5">
                        Consulter les honoraires
                        <span class="material-symbols-outlined text-[20px]" aria-hidden="true">picture_as_pdf</span>
                    </a>
                </div>

                <dl
                    class="grid w-full grid-cols-3 gap-6 rounded-xl bg-surface-container-lowest p-6 shadow-sm motion-safe:animate-fade-up motion-safe:[animation-delay:360ms]">
                    <div class="flex flex-col">
                        <dt class="order-2 mt-1 font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">
                            Fondateur inscrit au Barreau</dt>
                        <dd class="font-headline-md-mobile text-headline-md-mobile font-bold text-primary-container lg:text-headline-lg">
                            {{ config('cabinet.fondateur_inscrit_en') }}</dd>
                    </div>
                    <div class="flex flex-col">
                        <dt class="order-2 mt-1 font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">
                            Avocats</dt>
                        <dd class="font-headline-md-mobile text-headline-md-mobile font-bold text-secondary lg:text-headline-lg">
                            <span data-count="{{ $nbAvocats }}">{{ $nbAvocats }}</span></dd>
                    </div>
                    <div class="flex flex-col">
                        <dt class="order-2 mt-1 font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">
                            Domaines d'intervention</dt>
                        <dd class="font-headline-md-mobile text-headline-md-mobile font-bold text-primary-container lg:text-headline-lg">
                            <span data-count="{{ count(config('cabinet.domaines')) }}">{{ count(config('cabinet.domaines')) }}</span></dd>
                    </div>
                </dl>
            </div>

            <div class="relative lg:col-span-5 motion-safe:animate-fade-in motion-safe:[animation-delay:200ms]">
                <div class="relative aspect-[4/5] w-full overflow-hidden rounded-xl bg-surface-container-high shadow-xl">
                    <img src="{{ asset(config('cabinet.hero_image')) }}" alt="Balance de la justice et ouvrages de droit"
                        class="h-full w-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary-container/80 via-transparent to-transparent">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 right-6 flex items-center gap-3 rounded-lg bg-surface-container-lowest/90 p-4 shadow-md backdrop-blur-md">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-secondary/15">
                            <span class="material-symbols-outlined text-[22px] text-secondary" aria-hidden="true">apartment</span>
                        </div>
                        <div class="min-w-0">
                            <p class="font-title-md text-title-md leading-tight text-primary-container">Notre cabinet</p>
                            <p class="truncate font-label-sm text-label-sm text-on-surface-variant">
                                {{ config('cabinet.address')[1] ?? '' }} • Kinshasa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Atouts --}}
    <section class="bg-surface-container-low py-14">
        <div class="{{ $container }} grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4" data-reveal-stagger>
            @foreach (config('cabinet.atouts') as $atout)
                <div class="carte-survol flex flex-col rounded-xl bg-surface-container-lowest p-8 shadow-sm">
                    <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-lg bg-secondary/10 text-secondary">
                        <span class="material-symbols-outlined text-[28px]" aria-hidden="true">{{ $atout['icon'] }}</span>
                    </div>
                    <h3 class="mb-2 font-title-lg text-title-lg text-primary-container">{{ $atout['titre'] }}</h3>
                    <p class="font-body-sm text-body-sm leading-relaxed text-on-surface-variant">{{ $atout['texte'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- 3. Présentation --}}
    <section class="bg-surface py-20">
        <div class="{{ $container }} grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-16">
            <div class="relative lg:col-span-6" data-reveal>
                <div class="aspect-[4/3] w-full overflow-hidden rounded-xl bg-surface-container-high shadow-xl">
                    <img src="{{ asset(config('cabinet.presentation_image')) }}"
                        alt="Me Christian Ngandu Ilunga, avocat fondateur" class="h-full w-full object-cover object-top"
                        loading="lazy">
                </div>
                <div
                    class="absolute -bottom-6 right-8 hidden max-w-xs rounded-lg bg-surface-container-lowest p-5 shadow-lg sm:block">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-[26px] text-secondary" aria-hidden="true">account_balance</span>
                        <div>
                            <p class="font-title-md text-title-md leading-none text-primary-container">
                                {{ implode(' • ', array_column(config('cabinet.valeurs'), 'titre')) }}</p>
                            <p class="mt-1 font-label-sm text-label-sm text-on-surface-variant">Nos valeurs</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-start gap-space-lg lg:col-span-6" data-reveal style="--reveal-delai: 150ms">
                <x-section-header surtitre="Notre vocation" titre="Un cabinet dédié à la défense de vos intérêts"
                    class="mb-0">
                    {{ config('cabinet.description') }}
                </x-section-header>
                <p class="font-body-md text-body-md leading-relaxed text-on-surface-variant">
                    Chaque dossier est unique, chaque solution sur mesure. Notre équipe allie expertise et passion pour
                    vous conseiller, vous assister et vous représenter, devant les juridictions comme en dehors.
                </p>

                <div>
                    <span class="mb-3 block font-label-sm text-label-sm font-semibold uppercase tracking-wider text-on-surface">
                        Champs de pratique privilégiés :</span>
                    <ul class="flex flex-wrap gap-2.5">
                        @foreach (config('cabinet.appetences') as $appetence)
                            <li
                                class="rounded-lg bg-surface-container-low px-3.5 py-1.5 font-label-md text-label-md text-on-surface shadow-sm">
                                {{ $appetence }}</li>
                        @endforeach
                    </ul>
                </div>

                <a href="{{ route('a-propos') }}"
                    class="group inline-flex items-center gap-2 rounded-lg bg-primary-container px-6 py-3 font-title-md text-title-md text-on-primary shadow-sm transition-colors hover:bg-secondary">
                    En savoir plus sur le cabinet
                    <span class="fleche material-symbols-outlined text-[18px]" aria-hidden="true">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

    {{-- 4. Domaines d'intervention --}}
    <section id="domaines" class="bg-surface-container-low py-20">
        <div class="{{ $container }}">
            <x-section-header surtitre="Pôles d'expertise" titre="Nos domaines d'intervention" centre data-reveal>
                Une assistance taillée sur mesure pour répondre à vos besoins juridiques, en conseil comme en contentieux.
            </x-section-header>

            <div class="grid grid-cols-1 gap-space-md md:grid-cols-2 lg:grid-cols-3" data-reveal-stagger>
                @foreach (array_slice(config('cabinet.domaines'), 0, 6) as $domaine)
                    <div class="carte-survol group flex gap-space-md rounded-xl bg-surface-container-lowest p-6 shadow-sm">
                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-secondary/10 text-secondary transition-colors group-hover:bg-secondary group-hover:text-on-secondary">
                            <span class="material-symbols-outlined text-[26px]" aria-hidden="true">{{ $domaine['icon'] }}</span>
                        </div>
                        <div>
                            <h3 class="font-headline-sm text-headline-sm text-primary-container">{{ $domaine['titre'] }}</h3>
                            <p class="mt-1 font-body-sm text-body-sm leading-relaxed text-on-surface-variant">
                                {{ $domaine['texte'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 text-center" data-reveal>
                <a href="{{ route('domaines') }}"
                    class="group inline-flex items-center gap-2 rounded-lg bg-primary-container px-8 py-3.5 font-title-md text-title-md text-on-primary shadow-md transition-colors hover:bg-secondary">
                    Voir les {{ count(config('cabinet.domaines')) }} domaines d'intervention
                    <span class="fleche material-symbols-outlined text-[20px]" aria-hidden="true">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

    {{-- 5. Services --}}
    <section id="services" class="bg-surface py-20">
        <div class="{{ $container }}">
            <x-section-header surtitre="Nos services" titre="Une prise en charge complète" data-reveal>
                Trois volets complémentaires pour assurer la sécurité juridique de nos clients, du conseil à la
                représentation.
            </x-section-header>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3" data-reveal-stagger>
                @foreach (config('cabinet.services') as $service)
                    <article class="carte-survol rounded-xl bg-surface-container-lowest p-8 shadow-sm lg:p-10">
                        <div class="mb-8 flex items-center justify-between">
                            <span class="font-display-hero text-[44px] font-bold leading-none text-secondary/30">
                                {{ sprintf('%02d', $loop->iteration) }}</span>
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-lg bg-surface-container text-primary-container">
                                <span class="material-symbols-outlined text-[22px]" aria-hidden="true">{{ $service['icon'] }}</span>
                            </div>
                        </div>
                        <h3 class="mb-4 font-headline-sm text-headline-sm text-primary-container">{{ $service['titre'] }}</h3>
                        <p class="mb-6 font-body-md text-body-md leading-relaxed text-on-surface-variant">
                            {{ $service['texte'] }}</p>
                        <ul class="flex flex-col gap-2 font-body-sm text-body-sm text-on-surface-variant">
                            @foreach ($service['points'] as $point)
                                <li class="flex items-center gap-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-secondary"></span>
                                    {{ $point }}
                                </li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 6. Actualités --}}
    @if ($actualites->isNotEmpty())
        <section class="bg-surface-container-low py-20">
            <div class="{{ $container }}">
                <div class="mb-space-xl flex flex-col justify-between gap-6 md:flex-row md:items-end" data-reveal>
                    <x-section-header surtitre="Veille juridique" titre="Actualités & décryptages" class="mb-0">
                        Analyses et notes d'information publiées par nos avocats sur l'actualité juridique en RDC et dans
                        l'espace OHADA.
                    </x-section-header>
                    <a href="{{ route('actualites') }}"
                        class="inline-flex shrink-0 items-center gap-2 self-start rounded-lg bg-surface-container-lowest px-5 py-2.5 font-title-md text-title-md text-primary-container shadow-sm transition-colors hover:bg-secondary hover:text-on-secondary md:self-auto">
                        Toutes les publications
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">menu_book</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3" data-reveal-stagger>
                    @foreach ($actualites as $actualite)
                        <x-actualite-card :actualite="$actualite" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 7. Contact --}}
    <section id="contact" class="relative overflow-hidden bg-primary-container py-20 text-on-primary">
        <div class="pointer-events-none absolute -bottom-20 -right-20 h-96 w-96 rounded-full bg-secondary/10 blur-3xl"></div>

        <div class="{{ $container }} relative grid grid-cols-1 gap-12 lg:grid-cols-12">
            <div class="flex flex-col gap-space-lg lg:col-span-5" data-reveal>
                <x-section-header surtitre="Contact" titre="Parlons de votre dossier" clair class="mb-0">
                    Décrivez-nous brièvement votre situation : un avocat du cabinet vous recontactera.
                </x-section-header>

                <ul class="flex flex-col gap-6 rounded-xl bg-surface-container-lowest/5 p-8 backdrop-blur-sm">
                    <li class="flex items-start gap-4">
                        <span
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-secondary/20 text-secondary-fixed">
                            <span class="material-symbols-outlined text-[22px]" aria-hidden="true">location_on</span>
                        </span>
                        <div>
                            <p class="font-title-md text-title-md">Adresse du cabinet</p>
                            <a href="{{ config('cabinet.maps_url') }}" target="_blank" rel="noopener"
                                class="mt-1 block font-body-sm text-body-sm text-primary-fixed hover:underline">
                                {{ implode(', ', config('cabinet.address')) }}
                            </a>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <span
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-secondary/20 text-secondary-fixed">
                            <span class="material-symbols-outlined text-[22px]" aria-hidden="true">phone_in_talk</span>
                        </span>
                        <div>
                            <p class="font-title-md text-title-md">Téléphone</p>
                            <a href="tel:{{ config('cabinet.phone_link') }}"
                                class="mt-1 block font-headline-sm text-headline-sm text-secondary-fixed hover:underline">
                                {{ config('cabinet.phone') }}</a>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <span
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-secondary/20 text-secondary-fixed">
                            <span class="material-symbols-outlined text-[22px]" aria-hidden="true">mail</span>
                        </span>
                        <div class="min-w-0">
                            <p class="font-title-md text-title-md">Email</p>
                            <a href="mailto:{{ config('cabinet.email') }}"
                                class="mt-1 block break-all font-body-sm text-body-sm text-primary-fixed hover:underline">
                                {{ config('cabinet.email') }}</a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="rounded-xl bg-surface-container-lowest p-space-lg text-on-surface shadow-xl lg:col-span-7 lg:p-space-xl"
                data-reveal style="--reveal-delai: 150ms">
                <h3 class="mb-space-lg font-headline-sm text-headline-sm text-primary-container">Envoyez-nous un message</h3>
                <x-message-form />
            </div>
        </div>
    </section>
</x-layouts.app>
