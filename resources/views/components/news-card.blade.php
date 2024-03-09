<div
    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-purple-700 dark:border-gray-700 text-center inline-block my-10">
    <div class="p-5">
        <a href="#">
            <h3 class="mb-2 font-bold tracking-tight text-white text-2xl">
                {{ $attributes['title'] }}
            </h3>
        </a>
        <p class="mb-3 font-normal text-white">
            {{ $attributes['content'] }}
        </p>

    </div>

    <img class="rounded-lg h-52 w-full" src="{{ $attributes['img_path'] }}" alt="" />
</div>
