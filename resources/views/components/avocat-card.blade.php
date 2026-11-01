@props(['avocat', 'featured' => false])

<article @class([
    'group overflow-hidden rounded-xl border border-outline-variant/40 bg-surface-container-lowest',
    'md:grid md:grid-cols-5' => $featured,
    'carte-survol flex h-full flex-col' => !$featured,
])>
    <div @class([
        'relative overflow-hidden',
        'h-80 md:col-span-2 md:h-full' => $featured,
        'h-64' => !$featured,
    ])>
        <img src="{{ asset($avocat->image) }}" alt="{{ $avocat->nom_complet }}"
            class="h-full w-full object-cover transition-transform duration-700 ease-out motion-safe:group-hover:scale-105"
            loading="lazy">
    </div>

    <div @class([
        'flex flex-1 flex-col p-6',
        'md:col-span-3 md:p-10' => $featured,
    ])>
        <p class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">
            {{ $avocat->role }}
        </p>

        <h3 @class([
            'mt-2 font-serif text-on-surface',
            'text-headline-lg-mobile lg:text-headline-lg' => $featured,
            'text-headline-sm' => !$featured,
        ])>
            {{ $avocat->nom_complet }}
        </h3>

        @if ($avocat->email)
            <a href="mailto:{{ $avocat->email }}"
                class="mt-3 inline-flex items-center gap-2 font-body-md text-body-md text-on-surface-variant hover:text-secondary">
                <span class="material-symbols-outlined text-[20px]" aria-hidden="true">mail</span>
                {{ $avocat->email }}
            </a>
        @endif

        @if ($featured)
            <div class="mt-4 font-body-md text-body-md text-on-surface-variant">
                {!! nl2br(e($avocat->description)) !!}
            </div>
        @else
            <details class="group mt-4 font-body-md text-body-md text-on-surface-variant">
                <summary class="cursor-pointer list-none">
                    <span class="line-clamp-3 group-open:hidden">{{ $avocat->description }}</span>
                    <span class="mt-1 inline-block text-sm text-secondary group-open:hidden">Voir plus</span>
                    <span class="hidden text-sm text-secondary group-open:inline">Voir moins</span>
                </summary>
                <div class="mt-2">{!! nl2br(e($avocat->description)) !!}</div>
            </details>
        @endif

        @if ($avocat->social_links->isNotEmpty())
            <div class="mt-auto flex gap-4 pt-6">
                @foreach ($avocat->social_links as $social)
                    @php
                        $platform = strtolower($social->plateforme);
                        $url = Str::startsWith($social->url, ['http://', 'https://'])
                            ? $social->url
                            : "https://{$social->url}";
                    @endphp
                    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                        class="text-on-surface-variant hover:text-secondary"
                        aria-label="{{ ucfirst($platform) }} de {{ $avocat->nom_complet }}">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            @if ($platform === 'facebook')
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            @elseif ($platform === 'twitter' || $platform === 'x')
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            @elseif ($platform === 'linkedin')
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            @else
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                                    fill="none" />
                                <text x="12" y="16" text-anchor="middle" font-size="10"
                                    fill="currentColor">{{ substr(ucfirst($platform), 0, 1) }}</text>
                            @endif
                        </svg>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</article>
