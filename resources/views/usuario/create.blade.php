@extends('layouts.dashboard')
@section('aside')
    <livewire:mostrar-aside></livewire:mostrar-aside>
@endsection
@section('contenido')
    @if (session()->has('mensaje'))
        <div class=" mt-14 uppercase border border-green-600 bg-green-100 text-green-600 p-2 font-bold my-3 text-sm">
            {{ session('mensaje') }}
        </div>
    @endif
    <main class="md:flex md:flex-row justify-center items-center bg-gray-50 md:mt-14">

        <form method="POST" action="{{ route('usuario.create') }}" novalidate class=" w-3/4 ">
            @csrf
            <h1 class="font-bold text-2xl mt-2 text-center">Creando usuario </h1>
            <div class="mt-10 pb-10 grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-6">
                <!-- Name -->
                <div class=" sm:col-span-6 sm:col-start-1">
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4 sm:col-span-6 sm:col-start-1">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mt-4 sm:col-span-2  ">
                    <x-input-label for="telefono" :value="__('Telefono')" />
                    <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div>
                <div class="mt-4 sm:col-span-2">
                    <x-input-label for="sexo" :value="__('sexo')" />
                    <select id="sexo" name="sexo" :value="{{ old('sexo') }}"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option value="">--seleccione su sexo--</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                    <x-input-error :messages="$errors->get('sexo')" class="mt-2" />

                </div>
                <div class="mt-4 sm:col-span-2">
                    <x-input-label for="rol" :value="__('rol')" />
                    <select id="rol" name="rol" value="{{ old('rol') }}"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option value="">--seleccione su rol--</option>
                        <option value="1">Usuario</option>
                        <option value="2">Administrador</option>
                    </select>
                    <x-input-error :messages="$errors->get('rol')" class="mt-2" />

                </div>
                <div class="sm:col-span-6">
                    <x-input-label for="dependencia" :value="__('Unidad o dependencia administrativa')" />

                    <select id="dependencia" name="dependencia"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option value="">--seleccione la unidad o dependencia--</option>

                        @foreach ($cat_unidadepedencias as $cat_unidadepedencia)
                            <option value="{{ $cat_unidadepedencia->dep_id }}">
                                {{ $cat_unidadepedencia->dep_nombre }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('dependencia')" class="mt-2" />

                </div>

                <!-- Password -->
                <div class="mt-4 sm:col-span-3">
                    <x-input-label for="password" :value="__('Contraseña')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4 sm:col-span-3">
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <x-button2 class="  ">
                    {{ 'Registrar' }}
                </x-button2>
            </div>
        </form>
    </main>
@endsection
