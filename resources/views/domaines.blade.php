@php $container = 'mx-auto max-w-[1440px] px-gutter-mobile md:px-gutter-tablet lg:px-margin'; @endphp

<x-layouts.app :title="'Domaines d\'intervention | ' . config('cabinet.name')"
    description="Droit des affaires, du travail, de la famille, immobilier, recouvrement… Découvrez les 12 domaines d'intervention du cabinet N.I.C & Associés à Kinshasa.">

    {{-- 1. Bannière --}}
    <section class="bg-gradient-to-br from-surface via-surface to-secondary-fixed/30 py-12 lg:py-20">
        <div class="{{ $container }}">
            <div class="grid grid-cols-1 items-start gap-space-xl lg:grid-cols-12">
                <div class="flex flex-col gap-space-lg lg:col-span-8">
                    <div
                        class="inline-flex items-center gap-2.5 self-start rounded-lg bg-surface-container-low px-3.5 py-1.5 shadow-sm motion-safe:animate-fade-up">
                        <span class="h-2 w-2 rounded-full bg-secondary"></span>
                        <span class="font-label-sm text-label-sm font-semibold uppercase tracking-wider text-secondary">
                            Pôles d'expertise • Barreau de Kinshasa / Gombe • Espace OHADA</span>
                    </div>
                    <h1
                        class="font-display-hero-mobile text-display-hero-mobile tracking-tight text-primary-container motion-safe:animate-fade-up motion-safe:[animation-delay:100ms] lg:text-display-hero">
                        Domaines d'intervention
                    </h1>
                    <p
                        class="max-w-2xl font-body-lg text-body-lg leading-relaxed text-on-surface-variant motion-safe:animate-fade-up motion-safe:[animation-delay:200ms]">
                        Une prise en charge juridique complète, du conseil à la représentation, pour défendre les
                        intérêts des particuliers, des entreprises et des institutions, dans le respect du droit congolais
                        et des standards OHADA.
                    </p>
                </div>

                <div
                    class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm motion-safe:animate-fade-up motion-safe:[animation-delay:300ms] lg:col-span-4">
                    <p class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Notre champ d'action</p>
                    <p class="mt-space-sm flex items-baseline gap-space-sm">
                        <span class="font-headline-lg text-headline-lg text-primary-container"
                            data-count="{{ count(config('cabinet.domaines')) }}">{{ count(config('cabinet.domaines')) }}</span>
                        <span class="font-title-md text-title-md text-on-surface">domaines de pratique</span>
                    </p>
                    <p class="mt-space-xs font-body-sm text-body-sm text-on-surface-variant">
                        Droit congolais, droit OHADA et procédures devant les juridictions de la RDC.</p>
                </div>
            </div>

            <ul class="mt-space-xl grid grid-cols-1 gap-space-md md:grid-cols-3" data-reveal-stagger>
                @foreach ([
                    ['account_balance', 'Avocats inscrits au Barreau', 'Cour d\'appel de Kinshasa / Gombe'],
                    ['gavel', 'Conseil et contentieux', 'Du premier avis à la plaidoirie'],
                    ['lock', 'Confidentialité', 'Secret professionnel garanti'],
                ] as [$icone, $titre, $detail])
                    <li class="flex items-center gap-space-md rounded-xl bg-surface-container-lowest p-space-md shadow-sm">
                        <span
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-surface-container text-primary-container">
                            <span class="material-symbols-outlined text-[20px]" aria-hidden="true">{{ $icone }}</span>
                        </span>
                        <span>
                            <span class="block font-title-md text-title-md text-on-surface">{{ $titre }}</span>
                            <span class="block font-body-sm text-body-sm text-on-surface-variant">{{ $detail }}</span>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- 2. Les domaines --}}
    <section class="bg-surface-container-low py-20">
        <div class="{{ $container }}">
            <div class="mb-space-xl flex flex-col justify-between gap-space-md lg:flex-row lg:items-end" data-reveal>
                <x-section-header surtitre="Cartographie" titre="Nos chambres spécialisées" class="mb-0" />
                <p class="max-w-md font-body-md text-body-md text-on-surface-variant">
                    Chaque dossier est suivi par un avocat du cabinet, qui vous accompagne de l'analyse à la résolution.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-space-md md:grid-cols-2 lg:grid-cols-3" data-reveal-stagger>
                @foreach (config('cabinet.domaines') as $domaine)
                    <article class="carte-survol group flex flex-col rounded-xl bg-surface-container-lowest p-8 shadow-sm">
                        <div class="mb-space-lg flex items-start justify-between">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-lg bg-secondary/10 text-secondary transition-colors group-hover:bg-secondary group-hover:text-on-secondary">
                                <span class="material-symbols-outlined text-[26px]" aria-hidden="true">{{ $domaine['icon'] }}</span>
                            </div>
                            <span class="font-label-md text-label-md text-on-surface-variant">
                                {{ sprintf('%02d', $loop->iteration) }}</span>
                        </div>
                        <h2 class="font-headline-sm text-headline-sm text-primary-container">{{ $domaine['titre'] }}</h2>
                        <p class="mt-space-sm font-body-md text-body-md leading-relaxed text-on-surface-variant">
                            {{ $domaine['texte'] }}</p>
                        <a href="{{ route('/') }}#contact"
                            class="mt-auto inline-flex items-center gap-2 pt-space-lg font-label-md text-label-md uppercase tracking-wider text-secondary hover:text-primary-container">
                            Nous consulter
                            <span class="fleche material-symbols-outlined text-[18px]" aria-hidden="true">arrow_forward</span>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 3. Méthodologie --}}
    <section class="bg-surface py-20">
        <div class="{{ $container }}">
            <x-section-header surtitre="Notre méthode" titre="Comment nous traitons votre dossier" centre data-reveal>
                Une démarche rigoureuse et transparente, pour que vous sachiez à chaque étape où en est votre affaire.
            </x-section-header>

            <ol class="grid grid-cols-1 gap-space-md md:grid-cols-3" data-reveal-stagger>
                @foreach (config('cabinet.methodologie') as $etape)
                    <li class="carte-survol rounded-xl bg-surface-container-low p-8">
                        <div class="mb-space-lg flex items-center justify-between">
                            <span class="font-display-hero text-[44px] font-bold leading-none text-secondary/40">
                                {{ sprintf('%02d', $loop->iteration) }}</span>
                            <span
                                class="flex h-10 w-10 items-center justify-center rounded-lg bg-surface-container-lowest text-primary-container">
                                <span class="material-symbols-outlined text-[22px]" aria-hidden="true">{{ $etape['icon'] }}</span>
                            </span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-primary-container">{{ $etape['titre'] }}</h3>
                        <p class="mt-space-sm font-body-md text-body-md leading-relaxed text-on-surface-variant">
                            {{ $etape['texte'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- 4. Appel à l'action --}}
    <section class="relative overflow-hidden bg-primary-container py-20 text-on-primary">
        <div class="pointer-events-none absolute -bottom-20 -right-20 h-96 w-96 rounded-full bg-secondary/10 blur-3xl"></div>
        <div class="{{ $container }} relative grid grid-cols-1 items-center gap-12 lg:grid-cols-12" data-reveal>
            <div class="lg:col-span-7">
                <x-section-header surtitre="Consultation" titre="Une question sur votre dossier ?" clair class="mb-0">
                    Nos avocats étudient votre situation et vous proposent une première analyse, dans le respect du
                    secret professionnel.
                </x-section-header>
                <div class="mt-space-lg flex flex-wrap gap-4">
                    <a href="{{ route('/') }}#contact"
                        class="group inline-flex items-center gap-2 rounded-lg bg-secondary px-6 py-3.5 font-title-md text-title-md text-on-secondary shadow-lg transition-colors hover:bg-secondary-fixed hover:text-on-secondary-fixed">
                        Prendre rendez-vous
                        <span class="fleche material-symbols-outlined text-[20px]" aria-hidden="true">arrow_forward</span>
                    </a>
                    <a href="{{ route('honoraires') }}" target="_blank" rel="noopener"
                        class="inline-flex items-center gap-2 rounded-lg bg-surface-container-lowest/10 px-6 py-3.5 font-title-md text-title-md text-on-primary transition-colors hover:bg-surface-container-lowest/20">
                        Consulter les honoraires
                        <span class="material-symbols-outlined text-[20px]" aria-hidden="true">picture_as_pdf</span>
                    </a>
                </div>
            </div>
            <div class="rounded-xl bg-surface-container-lowest/5 p-8 backdrop-blur-sm lg:col-span-5">
                <p class="font-label-sm text-label-sm uppercase tracking-wider text-secondary-fixed">Ligne directe</p>
                <a href="tel:{{ config('cabinet.phone_link') }}"
                    class="mt-1 block font-headline-md text-headline-md text-on-primary hover:text-secondary-fixed">
                    {{ config('cabinet.phone') }}</a>
                <p class="mt-space-md font-label-sm text-label-sm uppercase tracking-wider text-secondary-fixed">Cabinet</p>
                <p class="mt-1 font-body-sm text-body-sm text-primary-fixed">{{ implode(', ', config('cabinet.address')) }}</p>
            </div>
        </div>
    </section>
</x-layouts.app>
