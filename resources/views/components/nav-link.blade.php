@props(['active'])

@php
    $classes = $active ?? false ? 'flex items-center p-2  text-gray-900 rounded-lg bg-red-100' : 'flex items-center p-2 text-gray-900 rounded-lg bg-white hover:bg-gray-100';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
