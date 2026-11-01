@props(['surtitre', 'titre', 'as' => 'h2', 'centre' => false, 'clair' => false])

@php $margePerso = str_contains($attributes->get('class', ''), 'mb-'); @endphp

<div {{ $attributes->class(['max-w-3xl', 'mb-space-xl' => !$margePerso, 'mx-auto text-center' => $centre]) }}>
    <div @class(['mb-2 flex items-center gap-space-xs', 'justify-center' => $centre])>
        <span @class(['h-2 w-2 rounded-full', 'bg-secondary' => !$clair, 'bg-secondary-fixed' => $clair])></span>
        <span @class([
            'font-label-md text-label-md uppercase tracking-widest',
            'text-secondary' => !$clair,
            'text-secondary-fixed' => $clair,
        ])>{{ $surtitre }}</span>
    </div>
    <{{ $as }} @class([
        'font-headline-lg-mobile text-headline-lg-mobile lg:text-headline-lg',
        'text-primary-container' => !$clair,
        'text-on-primary' => $clair,
    ])>
        {{ $titre }}
    </{{ $as }}>
    @if ($slot->isNotEmpty())
        <p @class([
            'mt-space-sm font-body-lg text-body-lg',
            'text-on-surface-variant' => !$clair,
            'text-primary-fixed' => $clair,
        ])>{{ $slot }}</p>
    @endif
</div>
