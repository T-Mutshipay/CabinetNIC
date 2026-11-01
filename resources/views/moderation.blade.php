<x-layouts.app :title="'Modération | ' . config('cabinet.name')">
    @push('meta')
        <meta name="robots" content="noindex, nofollow">
    @endpush

    <section class="bg-surface py-space-xl lg:py-24">
        <div class="mx-auto max-w-2xl px-gutter-mobile md:px-gutter-tablet">
            <x-section-header surtitre="Modération"
                :titre="$action === 'publier' ? 'Publier ce commentaire ?' : 'Supprimer ce commentaire ?'" as="h1">
                @if ($commentaire->actualite)
                    Article : « {{ $commentaire->actualite->titre }} »
                @endif
            </x-section-header>

            <div class="rounded-xl bg-surface-container-low p-space-lg">
                <p class="font-title-md text-title-md text-primary-container">
                    {{ $commentaire->user?->name ?? 'Anonyme' }}
                    <span class="font-body-sm text-body-sm font-normal text-on-surface-variant">
                        — {{ $commentaire->user?->email }}</span>
                </p>
                <p class="mt-space-sm font-body-md text-body-md text-on-surface-variant">{{ $commentaire->contenu }}</p>
                <p class="mt-space-md font-label-sm text-label-sm uppercase tracking-wider text-secondary">
                    {{ $commentaire->valide ? 'Actuellement publié' : 'Actuellement masqué' }}
                </p>
            </div>

            {{-- La même URL signée authentifie l'action --}}
            <form method="POST" action="{{ request()->fullUrl() }}" class="mt-space-lg flex flex-wrap gap-space-md">
                @csrf
                <button type="submit" @class([
                    'inline-flex items-center gap-2 rounded-lg px-6 py-3 font-label-md text-label-md uppercase tracking-wider text-on-primary transition-colors',
                    'bg-primary-container hover:bg-secondary' => $action === 'publier',
                    'bg-error hover:bg-on-error-container' => $action === 'supprimer',
                ])>
                    {{ $action === 'publier' ? 'Oui, publier' : 'Oui, supprimer définitivement' }}
                </button>
                @if ($commentaire->actualite)
                    <a href="{{ route('actualites.show', $commentaire->actualite_id) }}"
                        class="inline-flex items-center rounded-lg bg-surface-container-lowest px-6 py-3 font-label-md text-label-md uppercase tracking-wider text-primary-container shadow-sm hover:bg-surface-container-high">
                        Voir l'article
                    </a>
                @endif
            </form>
        </div>
    </section>
</x-layouts.app>
