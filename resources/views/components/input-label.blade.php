@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 uppercase space-y-6']) }}>
    {{ $value ?? $slot }}
</label>
