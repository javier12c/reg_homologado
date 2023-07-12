<div>
    @if ($isOpen2)
        <!-- Modal -->
        <div class="fixed inset-0 z-50 flex items-center justify-center min-h-screen">
            <div class="absolute inset-0 bg-black opacity-50"></div>

            <div class="bg-white w-1/2 rounded shadow relative z-10">
                <div class="p-4">
                    <!-- Contenido del formulario -->
                    <h2 class="text-xl font-bold mb-4">Agregar funcionario</h2>
                    <form class="space-y-6 " wire:submit.prevent="crearExpediente" novalidate>
                        <div class="mt-10 grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-6">

                            <div class="sm:col-span-6 sm:col-start-1">
                                <x-input-label for="nombreexpediente" :value="__('Nombre')" />
                                <x-text-input id="nombreexpediente" class="block mt-1 w-full" type="text"
                                    wire:model="nombreexpediente" :value="old('nombreexpediente')" />
                                @error('nombreexpediente')
                                    <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                                @enderror
                            </div>
                        </div>
                        <div class=" flex gap-5">
                            <x-button2 wire:click="$emit('MostrarAlerta')" class=" ">
                                {{ 'Crear Expediente ' }}
                            </x-button2>
                            <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded"
                                wire:click="closeModal2" type="button">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
