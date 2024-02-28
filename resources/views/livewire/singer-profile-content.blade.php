<div id="singerProfileContent">
    <div id="singerMenu" class="grid grid-cols-2 text-center gap-4 mx-4">
        <div class="p-4 border-b-2 border-yellow-300 hover:border-b-4" wire:click='changeSection("publications")'>
            <h2 class="text-white text-2xl">
                Publicaciones
            </h2>
        </div>
        <div class="p-4 border-b-2 border-yellow-300 hover:border-b-4" wire:click='changeSection("songs")'>
            <h2 class="text-white text-2xl">
                Canciones
            </h2>
        </div>
    </div>

    <div id="profileContent">
        @switch($section)
            @case('publications')
                @if (Auth::check() && Auth::user()->id == $singer->id)
                    @livewire('CreatePublicationForm')
                @endif

                @foreach ($publications as $publication)
                    <livewire:publication :$publication :key="$publication->id" />
                @endforeach
            @break

            @case('songs')
                {{-- <livewire:song :$singer :key="$singer->id"/>
                Canciones --}}
            @break

        @endswitch
    </div>
</div>
