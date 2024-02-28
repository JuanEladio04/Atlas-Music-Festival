<div class="singerCard rounded-2xl grid grid-cols-3 bg-cSecondary border-r-8 border-r-yellow-300">
    <div id="singerImage" class="col-span-1">
        <img src="{{ $singer->photo_path }}" alt="Imagen del cantante">
    </div>
    <div id="singerContent" class="col-span-2 p-4">
        <a href="{{ route('singer.show', [$singer->id])}}">
            <h2 class="text-2xl">
                {{ $singer->name }}
            </h2>
        </a>
    </div>
</div>
