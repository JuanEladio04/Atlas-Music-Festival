<div>
    <div class="m-10 gap-4">
        <label for="usersBrowser" class="text-white">Buscar: </label>
        <input type="text" id="usersBrowser" wire:model.live='search'>
    </div>

    @if (session('status'))
        <div class="mx-10 my-10 p-4 mb-4 text-sm text-yellow-500 rounded-lg border-2 border-yellow-300" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3" wire:click='orderBy("id")'>
                        id
                    </th>
                    <th scope="col" class="px-6 py-3" wire:click='orderBy("DNI")'>
                        DNI
                    </th>
                    <th scope="col" class="px-6 py-3" wire:click='orderBy("name")'>
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3" wire:click='orderBy("last_name")'>
                        Apellidos
                    </th>
                    <th scope="col" class="px-6 py-3" wire:click='orderBy("email")'>
                        Email
                    </th>
                    {{-- <th scope="col" class="px-6 py-3"  wire:click='orderBy("password")'>
                    Contraseña
                </th> --}}
                    <th scope="col" class="px-6 py-3" wire:click='orderBy("f_nac")'>
                        Fecha de nacimiento
                    </th>
                    <th scope="col" class="px-6 py-3" wire:click='orderBy("n_telf")'>
                        Número de teléfono
                    </th>
                    <th scope="col" class="px-6 py-3" wire:click='orderBy("type")'>
                        Tipo de usuario
                    </th>
                    <th scope="col" class="px-6 py-3" wire:click='orderBy("pass")'>
                        Pase
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Foto de perfil
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Operaciones
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $user->id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->DNI }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->last_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        {{-- <td class="px-6 py-4">
                    {{ $user->password }}
                </td> --}}
                        <td class="px-6 py-4">
                            {{ $user->f_nac }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->n_telf }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->type }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->pass }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ $user->photo_path }}" alt="{{ $user->name }} profile photo" class="h-10">
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('user.edit', $user) }}">
                                <button type="button"
                                    class="ml-auto flex focus:outline-none text-white bg-yellow-300  hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-100 rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                    <span class="material-symbols-outlined"> edit </span>
                                </button>
                            </a>
                            <form action="{{ route('user.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="ml-auto flex focus:outline-none text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div>
        {{ $users->links() }}
    </div>

</div>
