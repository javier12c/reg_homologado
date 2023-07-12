<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex bg-boton2 text-color-hover1 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline']) }}>
    {{ $slot }}
</button>
