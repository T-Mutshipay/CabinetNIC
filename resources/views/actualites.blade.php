@php $container = 'mx-auto max-w-[1440px] px-gutter-mobile md:px-gutter-tablet lg:px-margin'; @endphp

<x-layouts.app :title="'Actualités juridiques | ' . config('cabinet.name')"
    description="Analyses et décryptages de l'actualité juridique en RDC et dans l'espace OHADA, par les avocats du cabinet N.I.C & Associés.">

        <section class="bg-surface py-space-xl lg:py-24">
            <div class="{{ $container }}">
                <x-section-header surtitre="Veille juridique" titre="L'actualité juridique" as="h1" class="motion-safe:animate-fade-up">
                    Dans un paysage juridique en constante évolution, {{ config('cabinet.name') }} décrypte pour vous les
                    tendances et réformes essentielles.
                </x-section-header>

                @if ($actualites->isEmpty())
                    <p class="font-body-lg text-body-lg text-on-surface-variant">Aucune actualité publiée pour le moment.</p>
                @else
                    <div class="relative mb-space-xl max-w-xl motion-safe:animate-fade-up motion-safe:[animation-delay:150ms]">
                        <label for="search-input" class="sr-only">Rechercher un article</label>
                        <span class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-outline"
                            aria-hidden="true">search</span>
                        <input type="search" id="search-input" placeholder="Rechercher un article…"
                            class="w-full rounded-lg border-outline-variant bg-surface-container-lowest py-3 pl-12 pr-4 font-body-md text-body-md focus:border-secondary focus:ring-secondary">
                    </div>

                    <div class="grid grid-cols-1 gap-space-md md:grid-cols-2 lg:grid-cols-3" id="articles-container" data-reveal-stagger>
                        @foreach ($actualites as $actualite)
                            <x-actualite-card :actualite="$actualite"
                                data-search="{{ Str::lower($actualite->titre . ' ' . $actualite->description) }}" />
                        @endforeach
                    </div>

                    <p id="no-results" class="mt-space-xl hidden font-body-lg text-body-lg text-on-surface-variant" role="status">
                        Aucun article ne correspond à votre recherche.
                    </p>
                @endif
            </div>
        </section>

    @push('scripts')
        <script>
            (() => {
                const input = document.getElementById('search-input');
                if (!input) return;
                const articles = document.querySelectorAll('#articles-container [data-search]');
                const noResults = document.getElementById('no-results');

                input.addEventListener('input', () => {
                    const term = input.value.trim().toLowerCase();
                    let visible = 0;
                    articles.forEach((article) => {
                        const match = article.dataset.search.includes(term);
                        // Classe (et non attribut hidden) : la classe « flex » de la carte l'emporterait sur l'attribut
                        article.classList.toggle('hidden', !match);
                        visible += match;
                    });
                    noResults.classList.toggle('hidden', visible > 0);
                });
            })();
        </script>
    @endpush
</x-layouts.app>
