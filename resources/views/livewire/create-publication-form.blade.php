<div id="createPublicationForm" wire:submit='savePublication'>
    <form id="newPublicationForm" class="bg-cPrimary flex justify-center py-5 px-44 flex-col">
        <input class="block newPublicationInput mt-10" wire:model='pTitle' type="text" name="pTitle" id="pTitle"
            placeholder="Introduce el título de la publicación">
        @error('pTitle')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
        <input class="block newPublicationInput" wire:model.lazy='pSubtitle' type="text" name="pSubtitle" id="pSubtitle"
            placeholder="Introduce el subtítulo de la publicación">
        @error('pSubtitle')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror

        <textarea class="block newPublicationInput mb-10" wire:model='pContent' name="pContent" id="pContent"
            placeholder="Introduce el contenido de la publicación" cols="30" rows="10"></textarea>

        @error('pContent')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror

        <input class="block newPublicationInput mb-3" wire:model='pImage' type="file" name="pImage" id="pImage">
        @error('pImage')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror

        <button type="submit"
            class="w-24 focus:outline-none text-white bg-yellow-600 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 my-2">
            Publicar
        </button>
    </form>

    @if (session('status'))
        <div class="mx-44 my-10 p-4 mb-4 text-sm text-yellow-500 rounded-lg border-2 border-yellow-300" role="alert">
            <span class="font-medium"></span> {{ session('status') }}
        </div>
    @endif

</div>
