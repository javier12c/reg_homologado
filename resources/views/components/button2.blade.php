<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-md bg-header boton-hover focus:ring-4 focus:outline-none px-3 py-2 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-invisible cursor-pointer']) }}>
    {{ $slot }}
</button>
