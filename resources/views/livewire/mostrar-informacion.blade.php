<main class="md:flex md:flex-row md:mt-10 md:justify-center md:items-center">
    <div class="md:w-2/3 bg-login shadow-md">
        <h1 class=" font-bold uppercase text-center pt-10 text-usuario-letra"> {{ Auth()->user()->name }} </h1>
        <div class="container w-16 mx-auto text-center">
            @if (Auth()->user()->sexo === 1)
                <img src="{{ asset('img/236831.png') }}" alt="sexo hombre">
            @else
                <img src="{{ asset('img/mujer.png') }}" alt="sexo mujer">
            @endif

        </div>
        <div class=" rounded-2xl bg-white mt-10 mx-10  h-14 py-2 px-2">
            <h1 class="  font-bold mr-5">Unidad administrativa: <span class="text-usuario-letra">
                    {{ Auth()->user()->dependencia->dep_nombre }}
                </span></h1>
        </div>
        <div class=" rounded-2xl bg-white mt-4 mx-10  h-12 py-2 px-2">
            <h1 class=" font-bold">Correo: <span class="text-usuario-letra">{{ Auth()->user()->email }}
                </span></h1>
        </div>
        <div class=" rounded-2xl bg-white mt-4 mx-10  h-12 py-2 px-2 mb-5">
            <h1 class=" font-bold">Telefono: <span class="text-usuario-letra"> {{ Auth()->user()->telefono }}
                </span></h1>
        </div>
        <div class="container pb-6 px-10  min-w-full flex  items-center gap-4 object-center mx-auto">
            <a href="{{ route('profile.edit') }}"
                class="block text-white bg-header boton-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                Editar Perfil
            </a>
        </div>
    </div>

</main>
