<div id="newPublicationForm" class="bg-cPrimary flex justify-center py-5 px-44 flex-col">
    <input class="block my-2" wire:model='pTitle' type="text" name="pTitle" id="pTitle"
        placeholder="Introduce el título de la publicación">
    @error('pTitle')
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror

    <input class="block my-2" wire:model='pSubtitle' type="text" name="pSubtitle" id="pSubtitle"
        placeholder="Introduce el subtítulo de la publicación">
    @error('pSubtitle')
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror

    <input class="block my-2" wire:model='pContent' type="text" name="pContent" id="pContent"
        placeholder="Introduce el contenido de la publicación">
    @error('pContent')
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror

    <input class="block my-2" wire:model='pImage' type="file" name="pImage" id="pImage">
    @error('pImage')
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror

    <button type="button"
        class="focus:outline-none text-white bg-yellow-600 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 my-2"
        wire:click='savePublication'>
        Publicar
    </button>

    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-yellow-500 rounded-lg bg-cPrimary border-2" role="alert">
            <span class="font-medium">INFO</span> {{ session('status') }}
        </div>
    @endif
</div>
