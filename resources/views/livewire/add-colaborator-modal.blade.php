<div>

    @if ($showModal == true)
        <div id="colaboratorsModal" class="fixed z-20 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
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
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-white" id="modal-title">Colaboradores de
                                    canción: {{ $song->name }}
                                </h3>
                                <div class="mt-2 text-white">
                                    @foreach ($singers as $singer)
                                        @if ($singer->id != Auth::user()->id)
                                            <div class="grid grid-cols-3">
                                                <p class="col-span-2">
                                                    {{ $singer->name }}
                                                </p>
                                                <button type="button" id=""
                                                    class="col-span-1 inline-flex justify-center text-white shadow-sm px-4 py-2"
                                                    wire:click='removeColaborator({{ $singer->id }})'>
                                                    <span class="material-symbols-outlined">
                                                        close
                                                    </span>
                                                </button>
                                            </div>
                                        @endif
                                    @endforeach

                                    @if (session('status'))
                                        <div class="my-2 p-4 mb-4 text-sm text-yellow-500 rounded-lg border-2 border-yellow-300"
                                            role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <div class="mt-2 text-white grid grid-cols-4">
                                        <input type="text" name="ittColaboratorMail" id="addInput"
                                            wire:model.live='singerEmail'
                                            placeholder="Correo electronico del colaborador" class="w-full col-span-3"
                                            class="text-black">
                                        <button type="button" id="addButton"
                                            class="inline-flex col-span-1 justify-center text-white rounded-md border border-yellow-300 shadow-sm px-4 py-2 bg-yellow-300 text-base font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-200"
                                            wire:click='addColaborator'>
                                            <span class="material-symbols-outlined">
                                                add
                                            </span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-cSecondary px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                        <button type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-yellow-300 shadow-sm px-4 py-2 bg-cSecondary text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            wire:click='toggleModal'>
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
