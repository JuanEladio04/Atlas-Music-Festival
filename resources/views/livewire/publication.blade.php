<div class="text-white bg-cPrimary my-5 mx-8 p-11 rounded-2xl">
    <div id="profileData" class="mb-5 flex items-center justify-between">
        <div class="flex items-center">
            <img class="rounded-full w-10 h-10 inline-block mx-4" src="{{ $singer->photo_path }}" alt="Singer image">
            <p class="inline-block mx-4"> {{ $singer->name }} </p>
        </div>
        @if (Auth::user()->type == 'admin' || Auth::user()->id == $singer->id)
            <button type="button"
                class="ml-auto focus:outline-none text-white bg-yellow-600 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 my-2 flex items-center"
                wire:click='toggleModal'>
                <span class="material-symbols-outlined">
                    delete
                </span>
            </button>
        @endif
    </div>

    <div id="publicationContent" class="grid grid-cols-3">
        <div class="col-span-2">
            <h2 class="col-span-2">
                {{ $publication->title }}
            </h2>
            <h3 class="col-span-2">
                {{ $publication->subtitle }}
            </h3>
            <p class="col-span-2">
                {{ $publication->content }}
            </p>
        </div>
        @if ($publication->image_path != null || $publication->image_path != '')
            <div class="col-span-1">
                <img src="{{ $publication->image_path }}" alt="Imagen del post">
            </div>
        @endif
    </div>

    @if ($showModal == true)
        <div id="confirmDelete" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <!-- Modal panel -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <!-- Icono de advertencia -->
                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.82-1.24 2.82-2.77V10.77c0-1.53-1.28-2.77-2.82-2.77H5.062C3.52 8 .68 9.24.68 10.77v8.46c0 1.53 1.84 2.77 4.382 2.77z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">¿Estás seguro?
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Estás a punto de eliminar un elemento. Esta acción
                                        no se puede deshacer. ¿Quieres continuar?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                            wire:click='realizeDelete'>
                            Eliminar
                        </button>
                        <button type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            wire:click='toggleModal'>
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
