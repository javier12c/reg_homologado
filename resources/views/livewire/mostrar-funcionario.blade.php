<main>
    <h1 class=" font-bold text-3xl mb-4">Funcionarios Publicos</h1>
    <!-- Start coding here -->
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <livewire:filtrar-funcionario></livewire:filtrar-funcionario>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-formulario dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-2">Nombre</th>
                        <th scope="col" class="px-3 py-3">Correo</th>
                        <th scope="col" class="px-3 py-3">Depedencia</th>
                        <th scope="col" class="px-3 py-3">Puesto</th>
                        <th scope="col" class="px-3 py-3">
                            <span class="sr-only">Acciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($funcionarios as $funcionario)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900  dark:text-white">
                                {{ $funcionario->emp_nombre . $funcionario->emp_apellido }} </th>
                            <td class="px-3 py-2"> {{ $funcionario->emp_correo }} </td>
                            <td class="px-3 py-2">{{ $funcionario->dependencia->dep_nombre }}</td>
                            <td class="px-3 py-2">{{ $funcionario->emp_puesto }}</td>
                            <td class=" mt-5  flex gap-3 w-14 items-center justify-end mr-4">
                                @if (auth()->user()->rol === 2)
                                    <button wire:click="$emit('MostrarAlerta',{{ $funcionario->id }})" href="#"
                                        class="">
                                        <img src="{{ asset('img/Vector3.svg') }}" alt="">
                                    </button>
                                @endif

                                <a href="{{ route('funcionarios.edit', $funcionario->id) }}">
                                    <img src="{{ asset('img/Vector2.svg') }}" alt="">
                                </a>
                            </td>
                        @empty
                            <p class=" p-3 text-center text-sm text-gray-600">No hay registros que mostrar</p>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="  mt-10">
            {{ $funcionarios->links() }}
        </div>
    </div>

</main>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('MostrarAlerta', funcionarioId => {
            Swal.fire({
                title: '¿Eliminar servidor publico?',
                text: "Un funcionario eliminado no se puede recuperar. Revisa sus registros",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, !Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    //Eliminar vacante
                    Livewire.emit('EliminarFuncionario', funcionarioId)
                    Swal.fire(
                        'Eliminado!',
                        'Eliminado correctamente',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
