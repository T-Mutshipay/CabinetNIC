@props(['actualite' => null])

@php
    $field = 'mt-1 block w-full rounded-lg border-outline-variant bg-surface font-body-md text-body-md text-on-surface focus:border-secondary focus:ring-secondary';
@endphp

<form action="{{ route('comment.store') }}" method="POST" class="flex flex-col gap-space-md">
    @csrf
    <div class="absolute -left-[9999px]" aria-hidden="true">
        <label for="site_web">Ne pas remplir ce champ</label>
        <input type="text" id="site_web" name="site_web" tabindex="-1" autocomplete="off">
    </div>
    @if ($actualite)
        <input type="hidden" name="actualite_id" value="{{ $actualite->id }}">
    @endif

    <div class="grid grid-cols-1 gap-space-md sm:grid-cols-2">
        <div>
            <label for="name" class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Nom</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" autocomplete="name" required
                maxlength="255" class="{{ $field }}">
            @error('name')
                <p class="mt-1 font-body-sm text-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email" class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="email" required
                maxlength="255" class="{{ $field }}">
            @error('email')
                <p class="mt-1 font-body-sm text-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <label for="comment" class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">
            {{ $actualite ? 'Commentaire' : 'Votre message' }}
        </label>
        <textarea id="comment" name="comment" rows="5" required maxlength="500" class="{{ $field }}">{{ old('comment') }}</textarea>
        @error('comment')
            <p class="mt-1 font-body-sm text-body-sm text-error">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit"
        class="inline-flex items-center justify-center gap-2 self-start rounded-lg bg-primary-container px-6 py-3 font-label-md text-label-md uppercase tracking-wider text-on-primary transition-colors hover:bg-secondary">
        <span class="material-symbols-outlined text-[18px]" aria-hidden="true">send</span>
        Envoyer
    </button>
</form>
