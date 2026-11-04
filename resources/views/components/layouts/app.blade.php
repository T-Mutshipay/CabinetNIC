@props(['title' => null, 'description' => null, 'image' => null, 'type' => 'website'])
@php
    $title ??= config('cabinet.name') . " | Cabinet d'avocats à Kinshasa";
    $description = Str::limit($description ?? config('cabinet.description'), 160);
    $image = asset($image ?: config('cabinet.og_image'));
er ici toute nouvelle icône écrite en dur dans une vue ; celles de config/cabinet.php sont ajoutées seules.
    $icones = collect(['account_balance', 'apartment', 'arrow_back', 'arrow_forward', 'calendar_today', 'call',
        'chat_bubble', 'check_circle', 'groups', 'link', 'location_on', 'mail', 'menu', 'menu_book', 'phone_in_talk',
        'picture_as_pdf', 'schedule', 'search', 'send', 'gavel', 'lock'])
        ->merge(collect(['atouts', 'valeurs', 'services', 'domaines', 'methodologie'])->flatMap(fn ($cle) => array_column(config("cabinet.$cle"), 'icon')))
        ->unique()->sort()->implode(',');

    $nav = [
        ['Accueil', route('/'), request()->routeIs('/')],
        ['À propos', route('a-propos'), request()->routeIs('a-propos')],
        ['Domaines', route('domaines'), request()->routeIs('domaines')],
        ['Actualités', route('actualites'), request()->routeIs('actualites', 'actualites.show')],
        ['Contact', route('/') . '#contact', false],
    ];
    $container = 'mx-auto max-w-[1440px] px-gutter-mobile md:px-gutter-tablet lg:px-margin';
@endphp

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <link rel="canonical" href="{{ url()->current() }}">
    @unless (app()->isProduction())
        <meta name="robots" content="noindex, nofollow">
    @endunless

    <meta property="og:type" content="{{ $type }}">
    <meta property="og:site_name" content="{{ config('cabinet.name') }}">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $image }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" type="image/png" href="{{ asset('img/icon-192.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/icon-192.png') }}">
    <meta name="theme-color" content="#0b1f3a">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,400,0,0&icon_names={{ $icones }}&display=block">
    @stack('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen flex-col bg-surface font-body-md text-on-surface antialiased">
    <header data-entete
        class="fixed inset-x-0 top-0 z-50 bg-surface/90 shadow-[0_1px_12px_rgba(11,31,58,0.04)] backdrop-blur-xl transition-[background-color,box-shadow] duration-300 data-[defile]:bg-surface/95 data-[defile]:shadow-[0_8px_30px_-4px_rgba(11,31,58,0.12)]">
        <div class="{{ $container }} flex h-20 items-center justify-between gap-space-md">
            <a href="{{ route('/') }}" class="flex min-w-0 items-center gap-space-sm">
                <img src="{{ asset('img/icon-192.png') }}" alt="" width="44" height="44"
                    class="h-11 w-11 shrink-0 object-contain">
                <span class="flex min-w-0 flex-col">
                    <span
                        class="font-headline-sm text-headline-sm font-semibold leading-none tracking-tight text-primary-container">{{ config('cabinet.name') }}</span>
                    <span
                        class="mt-1 hidden truncate font-label-sm text-label-sm uppercase tracking-widest text-secondary sm:block">{{ config('cabinet.tagline') }}</span>
                </span>
            </a>

            <nav class="hidden items-center gap-space-xs lg:flex" aria-label="Navigation principale">
                @foreach ($nav as [$label, $href, $active])
                    <a href="{{ $href }}" @if ($active) aria-current="page" @endif
                        class="rounded-lg px-3 py-2 font-body-sm text-body-sm transition-colors {{ $active ? 'bg-primary-container font-semibold text-on-primary' : 'text-on-surface-variant hover:text-on-surface' }}">{{ $label }}</a>
                @endforeach
            </nav>

            <div class="flex shrink-0 items-center gap-space-md">
                <div class="hidden flex-col text-right xl:flex">
                    <span
                        class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Permanence</span>
                    <a href="tel:{{ config('cabinet.phone_link') }}"
                        class="font-title-md text-title-md text-primary-container transition-colors hover:text-secondary">{{ config('cabinet.phone') }}</a>
                </div>
                <a href="{{ route('honoraires') }}" target="_blank" rel="noopener"
                    class="hidden items-center gap-2 rounded-lg bg-secondary px-4 py-2.5 font-label-md text-label-md uppercase tracking-wider text-on-secondary transition-colors hover:bg-primary-container hover:text-secondary-fixed sm:inline-flex">
                    <span class="material-symbols-outlined text-[18px]" aria-hidden="true">picture_as_pdf</span>
                    Honoraires
                </a>
                <button type="button" data-collapse-toggle="mobile-menu" aria-controls="mobile-menu"
                    aria-expanded="false"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-primary-container hover:bg-surface-container lg:hidden">
                    <span class="sr-only">Ouvrir le menu</span>
                    <span class="material-symbols-outlined" aria-hidden="true">menu</span>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden border-t border-outline-variant/40 bg-surface lg:hidden">
            <nav class="{{ $container }} flex flex-col gap-1 py-space-md" aria-label="Navigation mobile">
                @foreach ($nav as [$label, $href, $active])
                    <a href="{{ $href }}"
                        class="rounded-lg px-3 py-3 font-body-md text-body-md {{ $active ? 'bg-primary-container font-semibold text-on-primary' : 'text-on-surface-variant hover:bg-surface-container' }}">{{ $label }}</a>
                @endforeach
                <a href="{{ route('honoraires') }}" target="_blank" rel="noopener"
                    class="mt-space-sm inline-flex items-center justify-center gap-2 rounded-lg bg-secondary px-3 py-3 font-label-md text-label-md uppercase tracking-wider text-on-secondary">
                    <span class="material-symbols-outlined text-[18px]" aria-hidden="true">picture_as_pdf</span>
                    Honoraires
                </a>
                <a href="tel:{{ config('cabinet.phone_link') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-lg px-3 py-3 font-title-md text-title-md text-primary-container">
                    <span class="material-symbols-outlined text-[18px]" aria-hidden="true">call</span>
                    {{ config('cabinet.phone') }}
                </a>
            </nav>
        </div>
    </header>

    <main class="flex-1 pt-20">
        @if (session('success'))
            <div role="status" class="{{ $container }} my-space-md">
                <p
                    class="flex items-center gap-space-sm rounded-lg bg-secondary-fixed px-space-md py-3 font-body-md text-body-md text-on-secondary-fixed">
                    <span class="material-symbols-outlined" aria-hidden="true">check_circle</span>
                    {{ session('success') }}
                </p>
            </div>
        @endif

        {{ $slot }}
    </main>

    <footer class="bg-surface-container-low pb-space-lg pt-space-xl">
        <div class="{{ $container }}">
            <div class="grid grid-cols-1 gap-space-xl pb-space-xl md:grid-cols-2 lg:grid-cols-4">
                <div class="flex flex-col gap-space-sm">
                    <div class="flex items-center gap-space-xs">
                        <img src="{{ asset('img/icon-192.png') }}" alt="" width="36" height="36" class="h-9 w-9 object-contain" loading="lazy">
                        <span
                            class="font-headline-sm text-headline-sm font-semibold tracking-tight text-primary-container">{{ config('cabinet.name') }}</span>
                    </div>
                    <p class="font-body-sm text-body-sm leading-relaxed text-on-surface-variant">
                        {{ config('cabinet.description') }}</p>
                    <div class="flex items-center gap-space-xs pt-2">
                        <span class="h-2 w-2 rounded-full bg-secondary"></span>
                        <span
                            class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">{{ config('cabinet.tagline') }}</span>
                    </div>
                </div>

                <div class="flex flex-col gap-space-sm">
                    <span class="font-title-md text-title-md text-primary-container">Nous contacter</span>
                    <address class="flex flex-col gap-1 font-body-sm text-body-sm not-italic text-on-surface-variant">
                        <a href="{{ config('cabinet.maps_url') }}" target="_blank" rel="noopener"
                            class="hover:text-secondary">
                            @foreach (config('cabinet.address') as $line)
                                <span class="block">{{ $line }}</span>
                            @endforeach
                        </a>
                        <a href="tel:{{ config('cabinet.phone_link') }}" class="pt-2 hover:text-secondary">Tél. :
                            {{ config('cabinet.phone') }}</a>
                        <a href="mailto:{{ config('cabinet.email') }}" class="break-all hover:text-secondary">Email :
                            {{ config('cabinet.email') }}</a>
                    </address>
                </div>

                <div class="flex flex-col gap-space-sm">
                    <span class="font-title-md text-title-md text-primary-container">Champs de pratique</span>
                    <ul class="flex flex-col gap-2 font-body-sm text-body-sm text-on-surface-variant">
                        @foreach (array_slice(config('cabinet.appetences'), 0, 5) as $appetence)
                            <li>{{ $appetence }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex flex-col gap-space-sm">
                    <span class="font-title-md text-title-md text-primary-container">Navigation</span>
                    <ul class="flex flex-col gap-2 font-body-sm text-body-sm text-on-surface-variant">
                        @foreach ($nav as [$label, $href])
                            <li><a href="{{ $href }}" class="hover:text-secondary">{{ $label }}</a></li>
                        @endforeach
                        <li><a href="{{ route('honoraires') }}" target="_blank" rel="noopener"
                                class="hover:text-secondary">Honoraires (PDF)</a></li>
                    </ul>
                    @if (config('cabinet.reseaux'))
                        <span class="pt-2 font-label-sm text-label-sm uppercase tracking-wider text-secondary">Suivez-nous</span>
                        <div class="flex flex-wrap gap-space-md">
                            @foreach (config('cabinet.reseaux') as $reseau)
                                <a href="{{ $reseau['url'] }}" target="_blank" rel="noopener noreferrer"
                                    class="font-body-sm text-body-sm font-medium text-on-surface hover:text-secondary">{{ $reseau['nom'] }}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div
                class="flex flex-col items-start justify-between gap-space-sm border-t border-outline-variant/40 pt-space-lg font-body-sm text-body-sm text-on-surface-variant md:flex-row md:items-center">
                <span>&copy; {{ date('Y') }} {{ config('cabinet.name') }}. Tous droits réservés.</span>
                <span class="flex items-center gap-2 font-label-sm text-label-sm uppercase tracking-wider">
                    <span class="h-2 w-2 rounded-full bg-secondary-container"></span>
                    Kinshasa • RDC
                </span>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>
