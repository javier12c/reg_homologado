@props(['messages'])

@if ($messages)
    <ul
        {{ $attributes->merge(['class' => 'border border-red-500 bg-red-100  text-red-700 font-bold uppercase text-xs  p-2 m-2']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
