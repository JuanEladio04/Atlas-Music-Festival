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
                @if (Auth::check() && Auth::user()->id == $singer->id)
                    <div class="flex justify-end px-5">
                        <a href=" {{ route('song.create') }} ">
                            <button type="button"
                                class="my-8 focus:outline-none text-white bg-yellow-300 hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                Añadir canción
                            </button>
                        </a>
                    </div>
                @endif

                @if (session('status'))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="gap-4 grid grid-cols-2 mx-4">
                    @foreach ($songs as $song)
                        <livewire:song :$song :key="$song->id" />
                    @endforeach
                </div>
            @break

        @endswitch
    </div>
</div>
