<x-layouts.app :title="$actualite->titre . ' | ' . config('cabinet.name')" :description="$actualite->description"
    :image="$actualite->image" type="article">
    @if ($actualite->created_at)
        @push('meta')
            <meta property="article:published_time" content="{{ $actualite->created_at->toIso8601String() }}">
        @endpush
    @endif

        <article class="bg-surface pb-space-xl lg:pb-24">
            <header class="bg-primary-container">
                <div class="mx-auto max-w-3xl px-gutter-mobile py-space-xl md:px-gutter-tablet lg:py-24 motion-safe:animate-fade-up">
                    <a href="{{ route('actualites') }}"
                        class="mb-space-lg inline-flex items-center gap-2 font-label-md text-label-md uppercase tracking-wider text-secondary-fixed hover:text-on-primary">
                        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">arrow_back</span>
                        Toutes les actualités
                    </a>
                    @if ($actualite->created_at)
                        <time datetime="{{ $actualite->created_at->toDateString() }}"
                            class="block font-label-sm text-label-sm uppercase tracking-wider text-primary-fixed">
                            {{ $actualite->created_at->translatedFormat('d F Y') }}
                        </time>
                    @endif
                    <h1
                        class="mt-space-sm font-headline-lg-mobile text-headline-lg-mobile text-on-primary lg:text-headline-lg">
                        {{ $actualite->titre }}
                    </h1>
                    <p class="mt-space-md font-body-lg text-body-lg text-primary-fixed">{{ $actualite->description }}</p>
                </div>
            </header>

            <div class="mx-auto max-w-3xl px-gutter-mobile md:px-gutter-tablet">
                @if ($actualite->image)
                    <img src="{{ asset($actualite->image) }}" alt=""
                        class="-mt-space-lg motion-safe:animate-fade-in motion-safe:[animation-delay:200ms] aspect-[16/9] w-full rounded-xl object-cover shadow-md">
                @endif

                <div class="mt-space-xl font-body-lg text-body-lg leading-relaxed text-on-surface">
                    {!! nl2br(e($actualite->contenu)) !!}
                </div>

                <section id="commentaires" class="mt-space-xl border-t border-outline-variant/40 pt-space-xl">
                    <h2 class="font-headline-md-mobile text-headline-md-mobile text-primary-container lg:text-headline-md">
                        Commentaires ({{ $commentaires->count() }})
                    </h2>

                    @if ($commentaires->isNotEmpty())
                        <ul class="mt-space-lg flex flex-col gap-space-md">
                            @foreach ($commentaires as $commentaire)
                                <li class="rounded-xl bg-surface-container-low p-space-md">
                                    <p class="font-title-md text-title-md text-primary-container">
                                        {{ $commentaire->user?->name ?? 'Anonyme' }}
                                        @if ($commentaire->created_at)
                                            <time datetime="{{ $commentaire->created_at->toDateString() }}"
                                                class="ml-2 font-body-sm text-body-sm font-normal text-on-surface-variant">
                                                {{ $commentaire->created_at->translatedFormat('d F Y') }}
                                            </time>
                                        @endif
                                    </p>
                                    <p class="mt-1 font-body-md text-body-md text-on-surface-variant">
                                        {{ $commentaire->contenu }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="mt-space-lg rounded-xl bg-surface-container-lowest p-space-lg shadow-sm">
                        <x-message-form :actualite="$actualite" />
                    </div>
                </section>
            </div>
        </article>
</x-layouts.app>
