@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-yellow-100 text-sm font-medium leading-5 text-white focus:outline-none focus:border-yellow-100 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-sm font-medium leading-5 text-white hover:text-yellow-300 hover:border-yellow-100 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-yellow-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
