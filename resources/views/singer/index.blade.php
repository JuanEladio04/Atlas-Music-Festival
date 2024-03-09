<x-app-layout>

    <h1 class="text-white text-center text-4xl my-10 cTitle">
        Nuestros cantantes
    </h1>

    <div class="grid grid-cols-2 gap-4 mx-6">
        @foreach ($singers as $singer)
            <livewire:singer :$singer :key="$singer->id"/>
        @endforeach
    </div>

</x-app-layout>