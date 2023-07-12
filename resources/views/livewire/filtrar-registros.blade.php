<div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
    <div class="w-full md:w-full">
        <form wire:submit.prevent='leerDatosFormulario'>
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="termino">Término de
                        Búsqueda
                    </label>
                    <input id="termino" type="text" placeholder="Buscar por Término: ej. cargo"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model="termino" />
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Depertamento</label>
                    <select id="dependencia" wire:model="dependencia" :value="old('dependencia')"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option value="">--seleccione la unidad o dependencia--</option>
                        @foreach ($cat_unidadepedencias as $cat_unidadepedencia)
                            <option value="{{ $cat_unidadepedencia->dep_id }}">
                                {{ $cat_unidadepedencia->dep_nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Expediente</label>
                    <select wire:model="expediente" id="expediente"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option value="">--seleccione el expediente--</option>
                        @foreach ($expedientes as $expediente)
                            <option value="{{ $expediente->exp_id }}">
                                {{ $expediente->exp_nombre }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <x-button2>
                    {{ 'Buscar ' }}
                </x-button2>
            </div>
        </form>
    </div>

</div>
