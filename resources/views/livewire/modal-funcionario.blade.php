<div>
    @if ($isOpen)
        <!-- Modal -->
        <div class="fixed inset-0 z-50 flex items-center justify-center min-h-screen">
            <div class="absolute inset-0 bg-black opacity-50"></div>

            <div class="bg-white w-1/2 rounded shadow relative z-10">
                <div class="p-4">
                    <!-- Contenido del formulario -->
                    <h2 class="text-xl font-bold mb-4">Agregar funcionario</h2>
                    <form wire:key="form1" class="space-y-6 " novalidate wire:submit.prevent="crearFuncionario">
                        <div class="mt-10 grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-6">

                            <div class="sm:col-span-3 sm:col-start-1">
                                <x-input-label for="nombre" :value="__('Nombre')" />
                                <x-text-input id="nombre" class="block mt-1 w-full" type="text"
                                    wire:model="nombre" :value="old('nombre')" />
                                @error('nombre')
                                    <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <x-input-label for="apellido" :value="__('Apellidos')" />
                                <x-text-input id="apellido" class="block mt-1 w-full" type="text"
                                    wire:model="apellido" :value="old('apellido')" />
                                @error('apellido')
                                    <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="email"
                                    :value="old('email')" />
                                @error('email')
                                    <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                                @enderror
                            </div>
                            <div class="sm:col-span-3 ">
                                <x-input-label for="cargo" :value="__('Cargo')" />
                                <x-text-input id="cargo" class="block mt-1 w-full" type="text" wire:model="cargo"
                                    :value="old('cargo')" />
                                @error('cargo')
                                    <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                                @enderror
                            </div>
                            <div class="sm:col-span-6 pb-4">
                                <x-input-label for="dependencia" :value="__('Unidad o dependencia administrativa')" />

                                <select id="dependencia" wire:model="dependencia"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                                    <option value="">--seleccione la unidad o dependencia--</option>

                                    @foreach ($cat_unidadepedencias as $cat_unidadepedencia)
                                        <option value="{{ $cat_unidadepedencia->dep_id }}">
                                            {{ $cat_unidadepedencia->dep_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('dependencia')
                                    <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                                @enderror
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <x-button2 class="" wire:click="$emit('MostrarAlerta')">
                                {{ 'Crear Funcionario ' }}
                            </x-button2>
                            <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded"
                                wire:click="closeModal" type="button">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
