<x-app-layout>

    <div id="index">
        <header id="presentationHeader" class="h-96">
            <h1 class="text-7xl cTitle">
                ATLAS MUSIC FESTIVAL
            </h1>
        </header>


        <!--NEWS--------------------------------------------------------------- -->

        <section>
            <h2 class="my-20 mx-10 cTitle text-3xl">
                NEWS:
            </h2>

            <div class="grid grid-cols-3 place-items-center">
                <x-news-card title="Nuevos artistas"
                    content="Descubre a los talentosos artistas emergentes que se unen a nosotros este año en Atlas. ¡No te los pierdas!"
                    img_path="/storage/img/index/card-1.png" />

                <x-news-card title="Nuevas canciones"
                    content="Disfruta de las emocionantes nuevas canciones que se estrenarán en Atlas. ¡Prepárate para moverte al ritmo!"
                    img_path="/storage/img/index/card-2.png" />

                <x-news-card title="Actividades recreativas"
                    content="Participa en las divertidas actividades recreativas que hemos preparado para ti en Atlas. ¡Diversión garantizada!"
                    img_path="/storage/img/index/card-3.png" />

            </div>

        </section>
    </div>

</x-app-layout>
