<main>
    <h1 class=" font-bold text-3xl  mb-4">Usuarios</h1>
    <!-- Start coding here -->
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-formulario dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-2">id</th>
                        <th scope="col" class="px-3 py-2">Nombre</th>
                        <th scope="col" class="px-3 py-3">Email</th>
                        <th scope="col" class="px-3 py-3">Unidad o depedencia</th>
                        <th scope="col" class="px-3 py-3">Numero de registros</th>
                        <th>
                            <span class="sr-only">Acciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Iteracion de los registros que tiene el usuario logeado --}}
                    @forelse ($users as $user)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->id }} </th>
                            <td class="px-3 py-2">{{ $user->name }}</td>
                            <td class="px-3 py-2">{{ $user->email }}</td>
                            <td class="px-3 py-2">{{ $user->dependencia->dep_nombre }}</td>
                            <td class="px-3 py-2">{{ $user->registros->count() }}</td>

                            <td class=" mt-5 mr-8 flex gap-3 w-14 items-center justify-end">
                                <button wire:click="verRegistros({{ $user->id }}) class="">
                                    <img src="{{ asset('img/Vector1.svg') }}" alt="">
                                </button>
                            </td>
                        </tr>
                    @empty
                        <p class=" p-3 text-center text-sm text-gray-600">No hay registros que mostrar</p>
                    @endforelse
                </tbody>
            </table>
            <div class="  mt-10">
                {{ $users->links() }}
            </div>
        </div>

    </div>

</main>
