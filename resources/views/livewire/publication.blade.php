<div class="text-white bg-cPrimary my-5 mx-8 p-11 rounded-2xl">
    <div id="profileData" class="mb-5 flex items-center justify-between">
        <div class="flex items-center">
            <img class="rounded-full w-10 h-10 inline-block mx-4" src="{{ $singer->photo_path }}" alt="Singer image">
            <p class="inline-block mx-4"> {{ $singer->name }} </p>
        </div>
        @if (Auth::user()->type == 'admin' || Auth::user()->id == $singer->id)
        <button type="button"
        class="ml-auto focus:outline-none text-white bg-yellow-600 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 my-2 flex items-center">
        <span class="material-symbols-outlined">
            delete
        </span>
    </button>
        @endif
    </div>

    <div id="publicationContent" class="grid grid-cols-3">
        <div class="col-span-2">
            <h2>
                {{ $publication->title }}
            </h2>
            <h3>
                {{ $publication->subtitle }}
            </h3>
            <p>
                {{ $publication->content }}
            </p>
        </div>
        @if ($publication->image_path != null)
            <div class="col-span-1">
                <img src="{{ $publication->image_path }}" alt="">
            </div>
        @endif
    </div>
</div>
