@props(['actualite'])

<article {{ $attributes->merge(['class' => 'group relative flex flex-col overflow-hidden rounded-xl bg-surface-container-lowest shadow-sm carte-survol']) }}>
    <div class="relative aspect-[16/10] overflow-hidden bg-surface-container-high">
        <img src="{{ asset($actualite->image ?: 'img/fond.jpg') }}" alt=""
            class="h-full w-full object-cover transition-transform duration-700 ease-out motion-safe:group-hover:scale-105"
            loading="lazy">
    </div>
    <div class="flex flex-1 flex-col gap-space-sm p-space-lg">
        @if ($actualite->created_at)
            <time datetime="{{ $actualite->created_at->toDateString() }}"
                class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">
                {{ $actualite->created_at->translatedFormat('d F Y') }}
            </time>
        @endif
        <h3 class="font-headline-sm text-headline-sm text-primary-container">
            <a href="{{ route('actualites.show', $actualite) }}" class="after:absolute after:inset-0">
                {{ $actualite->titre }}
            </a>
        </h3>
        <p class="line-clamp-3 font-body-md text-body-md text-on-surface-variant">{{ $actualite->description }}</p>
        <span
            class="mt-auto inline-flex items-center gap-2 pt-space-sm font-label-md text-label-md uppercase tracking-wider text-secondary group-hover:text-primary-container">
            Lire l'article
            <span class="fleche material-symbols-outlined text-[18px]" aria-hidden="true">arrow_forward</span>
        </span>
    </div>
</article>
