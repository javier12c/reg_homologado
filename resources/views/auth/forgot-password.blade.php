@extends('layouts.principal')

@section('contenido')
    <!-- Session Status -->
    <main class=" md:flex md:flex-row md:mt-12 justify-center items-center">
        <div class=" md:w-1/3 bg-login shadow-md">
            <div class="rounded px-8 pt-6 pb-8 text-sm text-gray-600 dark:text-gray-400">
                {{ __('¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.') }}
            </div>
            <!-- Session Status -->
            <x-auth-session-status class=" rounded px-8 text-sm" :status="session('status')" />

            <form novalidate class="rounded px-8 pt-6 pb-8 mb-2 ml-5 mr-5" method="POST"
                action="{{ route('password.email') }}">
                @csrf
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Enviar Link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </main>
@endsection
