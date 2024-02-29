<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 grid grid-cols-2 gap-4"
        enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <div>
                <x-input-label for="dni" :value="__('DNI')" />
                <x-text-input id="dni" name="dni" type="text" class="mt-1 block w-full" :value="old('dni', $user->DNI)"
                    required autofocus autocomplete="dni" />
                <x-input-error class="mt-2" :messages="$errors->get('dni')" />
            </div>

            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                    required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="last_name" :value="__('Apellidos')" />
                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)"
                    required autofocus autocomplete="last_name" />
                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
            </div>

            <div>
                <x-input-label for="f_nac" :value="__('Fecha de nacimiento')" />
                <x-text-input id="f_nac" name="f_nac" type="date" class="mt-1 block w-full" :value="old('f_nac', $user->f_nac)"
                    required autofocus autocomplete="f_nac" />
                <x-input-error class="mt-2" :messages="$errors->get('f_nac')" />
            </div>

            <div>
                <x-input-label for="n_telf" :value="__('Número de teléfono')" />
                <x-text-input id="n_telf" name="n_telf" type="text" class="mt-1 block w-full" :value="old('n_telf', $user->n_telf)"
                    required autofocus autocomplete="n_telf" />
                <x-input-error class="mt-2" :messages="$errors->get('n_telf')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                    required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4 mt-4">
                <x-primary-button>{{ __('Guardar') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Guardado') }}</p>
                @endif
            </div>
        </div>

        @if (Auth::user()->type == 'singer')
            <div class="text-center mx-auto">
                <h3 class="text-white">Imagen de perfil</h3>
                <img class="rounded-full h-72 w-72 my-8" src="{{ Auth::user()->photo_path }}" alt="Imagen de perfil del usuario">
                <input id="uImage" name="uImage" type="file" class="form-control bg-cSecondary" value="{{ old('uImage') }}"
                    autofocus>
                <x-input-error class="mt-2" :messages="$errors->get('uImage')" />
            </div>
        @endif


    </form>
</section>
