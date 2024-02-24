    <div>
        <div class="pass grid grid-cols-3 my-14 mx-10">
            <div id="passImage" class="col-span-1">
                <img src="{{ $ticket->photo_path }}" alt="{{ $ticket->description }}" class="max-w-full h-auto">
            </div>
            <div id="passContent" class="col-span-2 p-4">
                <div id="passTitle">
                    <h1 class="text-3xl text-white">
                        {{ $ticket->name }}
                    </h1>
                </div>
                <div id="passDescription" class="mt-4">
                    <p>
                        {{ $ticket->description }}
                    </p>
                </div>
                <div id="passFunctions" class="mt-4 d-flex justify-content-between">
                    <p class="inline-block text-2xl">
                        {{ $ticket->price }}
                    </p>
                    <div class="inline-block mx-auto">
                        @if ($ticket->id != Auth::user()->pass)
                            <button type="button"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900"
                                wire:click='getTicket'>
                                Adquirir pase
                            </button>
                        @endif
                        @if (Auth::user()->type == 'admin')
                            <button type="button"
                                class="focus:outline-none text-white bg-blue-400 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-blue-900"
                                wire:click='openEditModal'>
                                Editar pase
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <livewire:EditTicketModal :ticket="$ticket" />
    </div>
