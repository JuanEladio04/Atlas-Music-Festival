<x-app-layout>
    <form method="POST" action="{{ route('song.update', ['song' => $song->id]) }}" enctype="multipart/form-data"
        class="bg-cPrimary w-1/2 mx-auto my-36 p-20 rounded-3xl border-yellow-300 border-2">
        <h1 class="text-center text-2xl text-white mb-14">Modificar canción: {{ $song->name }}</h1>
        @csrf
        @method('PUT')

        <!--Name-->
        <div>
            <x-input-label for="name" :value="__('Nombre de la canción')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $song->name)" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="grid grid-cols-2 gap-7 mt-5">
            <!--Duration-->
            <div>
                <x-input-label for="duration" :value="__('Duración')" />
                <x-text-input id="duration" class="block mt-1 w-full" type="text" name="duration" :value="old('duration', $song->duration)"
                    required autofocus autocomplete="duration" />
                <x-input-error :messages="$errors->get('duration')" class="mt-2" />
            </div>

            <!--Gender-->
            <div>
                <x-input-label for="gender" :value="__('Género musical')" />
                <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender', $song->gender)"
                    required autofocus autocomplete="gender" />
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>
        </div>

        <!--Image-->
        <div class="mt-5">
            <x-input-label for="image" :value="__('Carátula')" />
            <input id="image" name="image" type="file" class="form-control bg-cSecondary"
                value="{{ old('image') }}" autofocus>
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <button type="submit"
            class="my-8 mx-auto focus:outline-none text-white bg-yellow-300 hover:bg-yellow-200 focus:ring-4 focus:ring-yellow-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
            Actualizar canción
        </button>

    </form>
</x-app-layout>
