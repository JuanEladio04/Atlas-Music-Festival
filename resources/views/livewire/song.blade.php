<div class="rounded-full grid grid-cols-3 bg-cSecondary my-12 h-52 overflow-hidden">

    <img src="{{ $song->photo_path }}" alt="" class="col-span-1 rounded-full object-cover h-52 w-52">

    <div class="inline-block col-span-2 w-96">
        <div>
            <h2 class="text-white">
                {{ $song->name }}
            </h2>
            <p>
                Géneros: {{ $song->gender }}
            </p>
            <p>
                Duración: {{ $song->duration }}
            </p>
        </div>

        @if (Auth::check() &&
                Auth::user()->songs()->where('songs.id', $song->id)->exists() || Auth::user()->type == 'admin')
            <div class="flex justify-end">

                <a href="{{ route('song.edit', ['song' => $song]) }}">
                    <button type="button"
                        class="my-8 h-10 focus:outline-none text-white bg-yellow-300 hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                        Editar canción
                    </button>
                </a>

                <button type="button" wire:click='toggleDeleteModal'
                    class="my-8 h-10 focus:outline-none text-white bg-yellow-300 hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                    Eliminar canción
                </button>

                <button type="button" wire:click='showColaboratorsModal'
                    class="my-8 h-10 text-center justify-center focus:outline-none text-white bg-yellow-300 hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                    <span class="material-symbols-outlined">
                        person_add
                    </span>
                </button>

            </div>
        @endif
    </div>

    @if ($showDeleteModal == true)
        <div id="confirmDelete" class="fixed z-20 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <!-- Modal panel -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-cBackground rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-Primary px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-cAccent sm:mx-0 sm:h-10 sm:w-10">
                                <!-- Icono de advertencia -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.82-1.24 2.82-2.77V10.77c0-1.53-1.28-2.77-2.82-2.77H5.062C3.52 8 .68 9.24.68 10.77v8.46c0 1.53 1.84 2.77 4.382 2.77z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-white" id="modal-title">¿Estás seguro?
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm color-cAccent">Estás a punto de eliminar un elemento. Esta acción
                                        no se puede deshacer. ¿Quieres continuar?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-cSecondary px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 sm:ml-3 sm:w-auto sm:text-sm"
                            wire:click='realizeDelete'>
                            Eliminar
                        </button>
                        <button type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-yellow-300 shadow-sm px-4 py-2 bg-cSecondary text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            wire:click='toggleDeleteModal'>
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <livewire:AddColaboratorModal :$song :key="$song->id" />
</div>
