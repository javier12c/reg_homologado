<main class="md:flex md:flex-row justify-center items-center">
    <form class="space-y-6 w-3/5   " novalidate wire:submit.prevent="editarFuncionario">
        <div class="mt-10 grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-6">

            <div class="sm:col-span-3 sm:col-start-1">
                <x-input-label for="nombre" :value="__('Nombre')" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" wire:model="nombre"
                    :value="old('nombre')" />
                @error('nombre')
                    <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <x-input-label for="apellido" :value="__('Apellidos')" />
                <x-text-input id="apellido" class="block mt-1 w-full" type="text" wire:model="apellido"
                    :value="old('apellido')" />
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
            <div class="sm:col-span-6 pb-8">
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
        <x-button2 class=" w-full">
            {{ 'Editar funcionario' }}
        </x-button2>

    </form>
</main>
