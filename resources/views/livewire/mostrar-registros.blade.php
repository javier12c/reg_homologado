<main>
    <h1 class=" font-bold text-3xl mt-6 mb-4">Registros por correspondencia</h1>
    <!-- Start coding here -->
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <livewire:filtrar-registros></livewire:filtrar-registros>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-formulario dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-2">Folio</th>
                        <th scope="col" class="px-3 py-3">Fecha del documento</th>
                        <th scope="col" class="px-3 py-3">No. del documento</th>
                        <th scope="col" class="px-3 py-3">Unidad o depedencia</th>
                        <th scope="col" class="px-3 py-3">Cargo</th>
                        <th scope="col" class="px-3 py-3">Asunto</th>
                        <th scope="col" class="px-3 py-3">Nombre del expediente</th>
                        <th scope="col" class="px-3 py-3">Estatus</th>
                        <th scope="col" class="px-3 py-3">
                            <span class="sr-only">Acciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Iteracion de los registros que tiene el usuario logeado --}}
                    @forelse ($registros as $registro)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $registro->id }} </th>
                            <td class="px-3 py-2"> {{ $registro->reg_fecha_documento->format('d/m/y') }} </td>
                            <td class="px-3 py-2">{{ $registro->reg_ndocumento }}</td>
                            <td class="px-3 py-2">{{ $registro->dependencia->dep_nombre }}</td>
                            <td class="px-3 py-2">{{ $registro->servidor->emp_puesto }}</td>
                            <td class="px-3 py-2">{{ $registro->reg_asunto }}</td>
                            <td class="px-3 py-2"> {{ $registro->expediente->exp_nombre }}</td>
                            @if ($registro->reg_status == 1)
                                <td class="px-3 py-2 bg-yellow-200">En revision</td>
                            @else
                                <td class="px-3 py-2 bg-green-200">Validado </td>
                            @endif
                            <td class=" mt-5  flex gap-3 w-14 items-center justify-end">
                                <button wire:click="exportarExcel({{ $registro->id }})" wire:loading.attr="disabled"
                                    href="" class="">
                                    <img src="{{ asset('img/Vector1.svg') }}" alt="">
                                </button>
                                <a @if ($registro->reg_status === 2) style="pointer-events: none;" @endif
                                    href="{{ route('registros.edit', $registro->id) }}">
                                    <img src="{{ asset('img/Vector2.svg') }}" alt="">
                                </a>
                            </td>
                        </tr>
                    @empty
                        <p class=" p-3 text-center text-sm text-gray-600">No hay registros que mostrar</p>
                    @endforelse
                </tbody>
            </table>
            <div class="  mt-10">
                {{ $registros->links() }}
            </div>
        </div>

    </div>

</main>
