<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-6">
                <h3 class="mb-4 text-xl font-medium text-gray-900">
                    Agregando Funcionario
                </h3>
                <form class="space-y-6" method="POST" novalidate action="{{ route('funcionario.store') }}">
                    <div class="mt-10 grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-3 sm:col-start-1">
                            <x-input-label for="nombre" :value="__('Nombre')" />
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                :value="old('nombre')" />
                            @error('nombre')
                                <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                            @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label for="tdocumento"
                                class="block text-sm font-medium leading-6 text-gray-900">Apellido</label>
                            <div class="mt-2">
                                <input type="text" name="folio" id="folio"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6  pl-5  p-2.5">

                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="tdocumento"
                                class="block text-sm font-medium leading-6 text-gray-900">Correo</label>
                            <div class="mt-2">
                                <input type="text" name="folio" id="folio"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6  pl-5  p-2.5">

                            </div>
                        </div>
                        <div class="sm:col-span-3 ">
                            <label for="puesto" class="block mb-2 text-sm font-medium text-gray-900">Cargo</label>
                            <input type="text" name="puesto" id="puesto"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                required />
                        </div>
                        <div class="sm:col-span-6 pb-8">
                            <x-input-label for="dependencia_fun" :value="__('Unidad o dependencia administrativa')" />

                            <select id="dependencia_fun" wire:model="dependencia_fun"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                                <option value="">--seleccione la unidad o dependencia--</option>

                            </select>
                            @error('dependencia_fun')
                                <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                            @enderror
                        </div>
                    </div>
                    <x-button2 class=" w-full">
                        {{ 'Crear Funcionario ' }}
                    </x-button2>

                </form>
            </div>
        </div>
    </div>
</div> <!-- Cierre modal-->
