<div>

    @if ($showModal == true)
        <div id="updateTicketModal" tabindex="-1" aria-hidden="true"
            class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-10 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-cBackground rounded-lg border-2 border-yellow-300 shadow sm:p-5">
                    <!-- Modal header -->
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Editar pase
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="updateTicketModal" wire:click='toggleShowModal'>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div >
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:
                            </label>
                            <input type="text" name="name" id="name" wire:model='name'
                                class="bg-cSecondary border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Introduce el nombre del ticket">
                            @error('name')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror

                        </div>
                        <div>
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción: </label>
                            <textarea id="description" rows="4" wire:model='description'
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write your thoughts here..."></textarea>

                            @error('description')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio:
                            </label>
                            <input type="text" name="price" id="price" wire:model='price'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Introduce la descripción del ticket">
                            @error('price')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="photo">Imagen del pase</label>
                            <input wire:model="photo" type="file" id="photo" name="photo"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                            @error('photo')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>
                    <div class="flex items-center space-x-4 mt-4">
                        <button type="submit" wire:click='realizeUpdate'
                            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Actualizar pase
                        </button>
                        <button type="button"
                        wire:click='toggleShowDeleteModal'
                            class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                            </svg>
                            Eliminar ticket
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

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
                                <p class="text-sm text-cAccent">Estás a punto de eliminar un elemento. Esta acción
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
                        wire:click='toggleShowDeleteModal'>
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

</div>
