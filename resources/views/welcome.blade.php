<x-app-layout>

    <header class="bg-green-500 text-center h-96">
        <h1 class="text-yellow-400 stroke-slate-50 text-5xl">
            ATLAS MUSIC FESTIVAL
        </h1>
    </header>

    <!--NEWS--------------------------------------------------------------- -->

    <section>
        <h2 class="text-yellow-400 stroke-slate-50 text-2xl my-20 mx-10">
            NEWS:
        </h2>

        <div class="grid grid-cols-3 place-items-center">
            @for ($i = 0; $i < 3; $i++)
            <x-news-card>
                Prueba
            </x-news-card>
            @endfor
        </div>

    </section>

</x-app-layout>
