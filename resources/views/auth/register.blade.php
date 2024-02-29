<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!--DNI-->
        <div>
            <x-input-label for="dni" :value="__('DNI')" />
            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required
                autofocus autocomplete="dni" />
            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- last_name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Apellidos')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- f_nac -->
        <div class="mt-4">
            <x-input-label for="f_nac" :value="__('Fecha de nacimiento')" />
            <x-text-input id="f_nac" class="block mt-1 w-full" type="date" name="f_nac" :value="old('f_nac')"
                required autofocus autocomplete="f_nac" />
            <x-input-error :messages="$errors->get('f_nac')" class="mt-2" />
        </div>

        <!-- n_telf -->
        <div class="mt-4">
            <x-input-label for="n_telf" :value="__('Número de teléfono')" />
            <x-text-input id="n_telf" class="block mt-1 w-full" type="text" name="n_telf" :value="old('n_telf')"
                required autofocus autocomplete="n_telf" />
            <x-input-error :messages="$errors->get('n_telf')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Type -->
        <div class="mt-4">
            <x-input-label for="type" :value="__('¿Que tipo de usuario eres?')" />
            <select id="type" name="type" class="block mt-1 w-full" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" disabled selected>¿Que eres?</option>
                <option value="user" {{ old('type') == 'user' ? 'selected' : '' }}>Cliente</option>
                <option value="singer" {{ old('type') == 'singer' ? 'selected' : '' }}>Cantante</option>
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
