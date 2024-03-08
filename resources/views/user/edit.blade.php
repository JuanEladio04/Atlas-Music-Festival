<x-app-layout>

    <h1 class="text-white text-center text-2xl my-10">
        Editar usuario: {{ $user->name }} {{ $user->last_name }}
    </h1>

    <form method="POST" action="{{ route('user.update', ['user' => $user->id]) }}" enctype="multipart/form-data"
        class="mx-auto bg-cPrimary p-10 w-2/4 rounded-2xl">
        @csrf
        @method('PUT')

        <!--dni-->
        <div class="mt-7">
            <x-input-label for="dni" :value="__('DNI')" />
            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni', $user->DNI)" required
                autofocus autocomplete="dni" />
            @error('dni')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!--name-->
        <div class="mt-7">
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

        </div>

        <!--last_name-->
        <div class="mt-7">
            <x-input-label for="last_name" :value="__('Apellidos')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name', $user->last_name)"
                required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />

        </div>

        <!--email-->
        <div class="mt-7">
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email', $user->email)"
                required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

        </div>

        <!--f_nac-->
        <div class="mt-7">
            <x-input-label for="f_nac" :value="__('Fecha de nacimiento')" />
            <x-text-input id="f_nac" class="block mt-1 w-full" type="date" name="f_nac" :value="old('f_nac', $user->f_nac)"
                required autofocus autocomplete="f_nac" />
            <x-input-error :messages="$errors->get('f_nac')" class="mt-2" />

        </div>

        <!--n_telf-->
        <div class="mt-7">
            <x-input-label for="n_telf" :value="__('Numero de teléfono')" />
            <x-text-input id="n_telf" class="block mt-1 w-full" type="text" name="n_telf" :value="old('n_telf', $user->n_telf)"
                required autofocus autocomplete="n_telf" />
            <x-input-error :messages="$errors->get('n_telf')" class="mt-2" />

        </div>

        <!--pass-->
        <div class="mt-7">
            <x-input-label for="pass" :value="__('Pase')" />
            <x-text-input id="pass" class="block mt-1 w-full" type="number" name="pass" :value="old('pass', $user->pass)"
                required autofocus autocomplete="pass" />
            <x-input-error :messages="$errors->get('pass')" class="mt-2" />

        </div>

        <!--type-->
        <div class="mt-7">
            <x-input-label for="type" :value="__('Tipo')" />
            <select id="type" name="type"
                class="block mt-1 w-full rounded-md shadow-sm focus:ring-opacity-50 p-2 ">
                <option value="admin" {{ old('type', $user->type) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('type', $user->type) == 'user' ? 'selected' : '' }}>Usuario</option>
                <option value="singer" {{ old('type', $user->type) == 'singer' ? 'selected' : '' }}>Cantante</option>
            </select>
            <x-input-error :messages="$errors->get('type')" class="mt-2" />

        </div>

        <!--image-->
        <div class="grid grid-cols-3 justify-center align-middle mt-7 gap-5">
            <img src="{{ $user->photo_path }}" alt="" class="col-span-1">
            <div class="col-span-2">
                <x-input-label for="image" :value="__('Tipo')" />
                <input type="file" id="image" name="image">
            </div>
            <x-input-error :messages="$errors->get('image')" class="mt-2" />

        </div>

        <button type="submit"
            class="flex mt-10 mx-auto focus:outline-none text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
            Guardar cambios
        </button>

    </form>

</x-app-layout>
