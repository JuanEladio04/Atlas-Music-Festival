<x-app-layout>
    <div id="singerProfile">

        <div class="singerData m-5 p-4 rounded-2xl bg-cPrimary grid grid-cols-3">
            <div class="singerImage col-span-1">
                <img class="rounded-full h-72 w-72" src="{{ $singer->photo_path }}" alt="">
            </div>
            <div class="singerName col-span-2 flex items-center">
                <h1 class="text-5xl cTitle">
                    {{ $singer->name }}
                </h1>
            </div>
        </div>

        <livewire:singerProfileContent :$singer :key="$singer->id"/>

    </div>
</x-app-layout>
