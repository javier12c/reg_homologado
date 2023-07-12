<aside id="logo-sidebar"
    class="md:fixed md:top-0 md:left-0 md:h-fit z-40 w-64  pt-20   bg-white border-r border-gray-200  "
    aria-label="Sidebar">
    <img src="{{ asset('img/logo ACA.png') }}" alt="Logo" class=" ">
    @if (auth()->user()->rol === 2)
        <h1 class=" text-center font-bold text-xl">Administracion</h1>
    @else
        <h1 class=" text-center font-bold text-2xl">Panel</h1>
    @endif
    <div class="h-full px-3 pb-4  bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <x-nav-link :href="route('usuario.index')" :active="request()->routeIs('usuario.index')">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <p class=" ml-2">{{ __('Dashboard') }} </p>
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('registro.index')" :active="request()->routeIs('registro.index')">

                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-5 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 5C5.34315 5 4 6.34315 4 8V16C4 17.6569 5.34315 19 7 19H17C18.6569 19 20 17.6569 20 16V12.5C20 11.9477 20.4477 11.5 21 11.5C21.5523 11.5 22 11.9477 22 12.5V16C22 18.7614 19.7614 21 17 21H7C4.23858 21 2 18.7614 2 16V8C2 5.23858 4.23858 3 7 3H10.5C11.0523 3 11.5 3.44772 11.5 4C11.5 4.55228 11.0523 5 10.5 5H7Z" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.8431 3.58579C18.0621 2.80474 16.7957 2.80474 16.0147 3.58579L11.6806 7.91992L11.0148 11.9455C10.8917 12.6897 11.537 13.3342 12.281 13.21L16.3011 12.5394L20.6347 8.20582C21.4158 7.42477 21.4158 6.15844 20.6347 5.37739L18.8431 3.58579ZM13.1933 11.0302L13.5489 8.87995L17.4289 5L19.2205 6.7916L15.34 10.6721L13.1933 11.0302Z" />
                    </svg>
                    <p class=" ml-2">{{ __('Nuevo registro') }} </p>
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('usuario.show')" :active="request()->routeIs('usuario.show')">

                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <p class=" ml-2">{{ __('Datos del usuario') }} </p>
                </x-nav-link>
            </li>

            <li>
                <x-nav-link :href="route('registro.show')" :active="request()->routeIs('registro.show')">

                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <p class=" ml-2">{{ __('Registros') }} </p>
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('funcionarios.show')" :active="request()->routeIs('funcionarios.show')">

                    <img src="{{ asset('img/data.svg') }}"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        alt="">
                    <p class=" ml-2">{{ __('Datos de funcionarios') }} </p>
                </x-nav-link>
            </li>
        </ul>
    </div>
    @if (auth()->user()->rol === 2)
        <hr class=" h-px  bg-gray-200 border-0 dark:bg-gray-700">
        <h1 class=" text-center font-bold text-xl">Gestion de usuario</h1>
        <div class="h-full px-3 pb-4  bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <x-nav-link :href="route('usuario.create')" :active="request()->routeIs('usuario.create')">
                        <img src="{{ asset('img/new (2).svg') }}" alt=""
                            class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                        <p class=" ml-2">{{ __('Agregar usuario') }} </p>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('usuario.shows')" :active="request()->routeIs('usuario.shows')">

                        <svg aria-hidden="true"
                            class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <p class=" ml-2">{{ __('Registros de usuarios') }} </p>
                    </x-nav-link>
                </li>
            </ul>
        </div>
    @endif
</aside>
