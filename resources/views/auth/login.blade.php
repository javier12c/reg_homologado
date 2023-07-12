@extends('layouts.principal')

@section('contenido')
    <!-- Session Status -->
    <main class="md:flex md:flex-row md:mt-12 justify-center items-center">
        <div class="md:w-1/3  bg-login shadow-md">
            <h1 class=" font-bold uppercase text-center p-6 text-color-login">login</h1>
            <x-auth-session-status class="mb-4" :status="session('status')" />


            <form class="rounded px-8 pt-6 pb-8 mb-2 ml-5 mr-5" method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-color-iconos" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                        <x-text-input id="email" class="block mt-1 w-full pl-10 p-2.5" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-color-iconos">
                                <g id="style=fill">
                                    <g id="key">
                                        <path id="Subtract" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M19.7245 4.25634C16.8672 1.40867 12.2422 1.40731 9.39229 4.25664C7.50743 6.13282 6.87285 8.78545 7.46375 11.1886L6.75131 11.901C6.77638 11.92 6.80046 11.9409 6.82333 11.9638L8.80539 13.9459C9.07435 14.2148 9.07435 14.6509 8.80539 14.9198C8.53643 15.1888 8.10036 15.1888 7.8314 14.9198L5.84934 12.9378C5.82647 12.9149 5.80554 12.8908 5.78656 12.8657L4.56916 14.0831L6.5821 16.0961C6.85106 16.365 6.85106 16.8011 6.5821 17.07C6.31314 17.339 5.87707 17.339 5.60811 17.07L3.59516 15.0571L2.7613 15.8909L2.75414 15.8983C2.51883 16.1408 2.35105 16.4612 2.24946 16.7659C2.14833 17.0693 2.08799 17.4316 2.13777 17.7776L2.13823 17.7807L2.39979 19.6821L2.40133 19.6922C2.47514 20.1754 2.7279 20.61 3.04998 20.9335C3.37189 21.2569 3.80877 21.5143 4.30034 21.5826L6.20174 21.8442L6.20497 21.8447C6.54317 21.8934 6.9021 21.8415 7.21104 21.7414C7.51802 21.6419 7.84612 21.4719 8.09426 21.2183L12.8009 16.5199C15.2002 17.1184 17.8514 16.4729 19.7329 14.6006L19.734 14.5994C22.5836 11.7499 22.5836 7.10579 19.7245 4.25634ZM14.6197 6.92451C13.2731 6.92451 12.1815 8.01611 12.1815 9.36267C12.1815 10.7092 13.2731 11.8008 14.6197 11.8008C15.9662 11.8008 17.0578 10.7092 17.0578 9.36267C17.0578 8.01611 15.9662 6.92451 14.6197 6.92451Z"
                                            fill="#9f2241" />
                                    </g>
                                </g>
                            </svg>

                        </div>
                        <x-text-input id="password" class="block mt-1 w-full pl-10 p-2.5" type="password" name="password"
                            required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center ">
                            <input id="remember_me" type="checkbox"
                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recuerdame') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="inline-block align-baseline font-bold text-sm text-color-login cursor-pointer text-color-hover"
                                href="{{ route('password.request') }}">
                                {{ __('¿Olvido la contraseña?') }}
                            </a>
                        @endif

                        <x-primary-button class="ml-6 gap-3">
                            {{ __('Ingresar') }}
                        </x-primary-button>
                    </div>
            </form>
        </div>
    </main>
@endsection
