<form action="" novalidate wire:submit.prevent="editarRegistro">
    <div class="space-y-14">
        <div class="border-b border-gray-900/10 p-11 bg-formulario mt-8 rounded-sm">
            <h2 class=" font-bold text-3xl leading-7 text-gray-900 text-center">Datos Generales</h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class="sm:col-span-2 ">
                    <x-input-label for="reg_fecha_documento" :value="__('Fecha del documento')" />
                    <x-text-input id="reg_fecha_documento" class="block mt-1 w-full" type="date"
                        wire:model="reg_fecha_documento" :value="old('reg_fecha_documento')" />
                    @error('reg_fecha_documento')
                        <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <x-input-label for="tipo_documento" :value="__('Tipo de documento')" />
                    <select wire:model="tipo_documento" id="tipo_documento"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option value="">--seleccione un tipo de documento--</option>
                        @foreach ($cat_tdocumentos as $cat_tdocumento)
                            <option value="{{ $cat_tdocumento->doc_id }}">
                                {{ $cat_tdocumento->doc_nombre }} </option>
                        @endforeach
                    </select>

                    @error('tipo_documento')
                        <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                    @enderror
                </div>

                <div class="sm:col-span-2 ">
                    <x-input-label for="reg_ndocumento" :value="__('Numero de documento')" />
                    <x-text-input id="reg_ndocumento" class="block mt-1 w-full" type="text"
                        wire:model="reg_ndocumento" :value="old('reg_ndocumento')" placeholder="Escribe el numero del documento" />
                    @error('reg_ndocumento')
                        <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                    @enderror
                </div>
                <div class="sm:col-span-4">
                    <x-input-label for="dependencia" :value="__('Unidad o dependencia administrativa')" />

                    <select id="dependencia" wire:model="dependencia" :value="old('dependencia')"
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

                <div class="sm:col-span-3">
                    <x-input-label for="servidorespublicoss" :value="__('Signado Por')" class=" mt-4" />
                    <select id="servidorespublicoss" wire:model="servidorespublicoss"
                        :value="old('servidorespublicoss')"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option value="">--seleccione el servidor publico--</option>
                        @foreach ($servidorespublicos as $servidorespublico)
                            <option value="{{ $servidorespublico->id }}">
                                {{ $servidorespublico->emp_nombre . $servidorespublico->emp_apellido }}
                            </option>
                        @endforeach
                    </select>
                    @error('servidorespublicoss')
                        <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                    @enderror

                </div>
                @if (!is_null($cargo))
                    <div class="sm:col-span-3 mt-2">
                        <x-input-label for="cargo" :value="__('Cargo')" />
                        <x-text-input id="cargo" class="block mt-1 w-full" type="text" wire:model="cargo"
                            placeholder="{{ $cargo->emp_puesto }}" disabled :value="$cargo->emp_puesto" />
                        @error('cargo')
                            <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                        @enderror
                    </div>
                @endif

                <div class="sm:col-span-6">
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        class="block text-white bg-empleado-boton bg-empleado-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full"
                        type="button">
                        No existe el funcionario
                    </button>
                </div>

                <div class="sm:col-span-4">
                    <x-input-label for="asunto" :value="__('Asunto')" />
                    <div class="mt-2">
                        <textarea type="text" wire:model="asunto" id="asunto" autocomplete="family-name" :value="old('asunto')"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 h-20"
                            placeholder="Escribe el asunto"></textarea>
                    </div>
                    @error('asunto')
                        <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="space-y-14">
        <div class="border-b border-gray-900/10 p-11 bg-formulario mt-16 rounded-sm">
            <h2 class=" font-bold text-3xl leading-7 text-gray-900 text-center">Enviado a </h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class="sm:col-span-3">
                    <x-input-label for="dirigido" :value="__('Dirigido A')" class=" mt-4" />
                    <select id="dirigido" wire:model="dirigido" :value="old('dirigido')"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option value="">--seleccione el servidor publico--</option>
                        @foreach ($servidorespublicos as $servidorespublico)
                            <option value="{{ $servidorespublico->id }}">
                                {{ $servidorespublico->emp_nombre . $servidorespublico->emp_apellido }}
                            </option>
                        @endforeach
                    </select>
                    @error('dirigido')
                        <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                    @enderror

                </div>


                @if (!is_null($cargo2))
                    <div class="sm:col-span-3 mt-2">
                        <x-input-label for="cargo" :value="__('Cargo')" />
                        <x-text-input id="cargo" class="block mt-1 w-full" type="text" wire:model="cargo"
                            placeholder="{{ $cargo2->emp_puesto }}" disabled :value="$cargo2->emp_puesto" />
                        @error('cargo')
                            <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                        @enderror
                    </div>
                @endif

                <div class="sm:col-span-6">
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        class="block text-white bg-empleado-boton bg-empleado-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full"
                        type="button">
                        No existe el funcionario
                    </button>
                </div>

                <div class="sm:col-span-2">
                    <x-input-label for="anexo" :value="__('Anexos')" />
                    <div iv class="flex gap-4">
                        <div class="">
                            <input id="anexo_si" type="radio" value="1" wire:model="anexo" autocomplete="off"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="anexo_si" class="ml-2 text-sm font-medium text-gray-900">si</label>
                        </div>
                        <div class="">
                            <input checked id="default-radio-2" type="radio" value="2" wire:model="anexo"
                                autocomplete="off"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900">no</label>
                        </div>
                        @error('anexo')
                            <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <x-input-label for="seguimiento_realizado" :value="__('Seguimiento realizado ')" />
                    <x-text-input id="seguimiento_realizado" class="block mt-1 w-full" type="text"
                        wire:model="seguimiento_realizado" :value="old('seguimiento_realizado')" placeholder="Escribe el nombre" />
                    @error('seguimiento_realizado')
                        <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <x-input-label for="resguardo" :value="__('Resguardo ')" />
                    <x-text-input id="resguardo" class="block mt-1 w-full" type="text" wire:model="resguardo"
                        :value="old('resguardo')" placeholder="" />
                    @error('resguardo')
                        <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="space-y-14">
        <div class="border-b border-gray-900/10 p-11 bg-formulario mt-12 rounded-sm">
            <h2 class=" font-bold text-3xl leading-7 text-gray-900 text-center">Guardado Virtual <span
                    class=" text-red-700	">(En el caso que aplique)*</span></h2>
            <div class="sm:col-span-6 mt-3">
                <x-input-label for="hipervinculo" :value="__('Hipervinculo ')" />
                <x-text-input id="hipervinculo" class="block mt-1 w-full" type="text" wire:model="hipervinculo"
                    :value="old('hipervinculo')" placeholder="" />
                @error('hipervinculo')
                    <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                @enderror
            </div>
        </div>
    </div>
    <div class="space-y-14">
        <div class="border-b border-gray-900/10 p-11 bg-formulario mt-12 rounded-sm">
            <h2 class=" font-bold text-3xl leading-7 text-gray-900 text-center">Guardado Fisico</h2>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class="sm:col-span-3">
                    <x-input-label for="expediente" :value="__('Nombre del expediente donde se guarda')" />
                    <select wire:model="expediente" id="expediente"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option value="">--seleccione el expediente--</option>
                        @foreach ($expedientes as $expediente)
                            <option value="{{ $expediente->exp_id }}">
                                {{ $expediente->exp_nombre }} </option>
                        @endforeach
                    </select>

                    @error('expediente')
                        <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                    @enderror
                </div>
                <div class="sm:col-span-3">
                    <x-input-label for="serie" :value="__('Seccion con serie ')" />
                    <x-text-input id="serie" class="block mt-1 w-full" type="text" wire:model="serie"
                        :value="old('serie')" placeholder="" />
                    @error('serie')
                        <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <button data-modal-target="nombre-expediente" data-modal-toggle="nombre-expediente"
                        class="block text-white bg-empleado-boton bg-empleado-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full"
                        type="button">
                        No existe el expediente
                    </button>
                </div>


                <div class="sm:col-span-3">
                    <x-input-label for="ubicacion" :value="__('Ubicación fisica ')" />
                    <x-text-input id="ubicacion" class="block mt-1 w-full" type="text" wire:model="ubicacion"
                        :value="old('ubicacion')" placeholder="" />
                    @error('ubicacion')
                        <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <x-input-label for="observaciones" :value="__('Observaciones ')" />

                    <div class="mt-2">
                        <textarea type="text" wire:model="observaciones" id="observaciones"
                            class="block p-2.5  w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 h-20"
                            placeholder="Escribe tu observacion">
                        </textarea>
                        @error('observaciones')
                            <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                        @enderror
                    </div>
                </div>
                @if (auth()->user()->rol === 2)
                    <div class="sm:col-span-3">
                        <x-input-label for="status" :value="__('Status ')" />

                        <select id="status" wire:model="status" :value="old('status')"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <option value="">Seleccione un status</option>
                            <option selected="selected" value="1">En revision</option>
                            <option value="2">Validado</option>
                        </select>
                        @error('status')
                            <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                        @enderror

                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <x-button2>
            {{ 'Modificar registro ' }}
        </x-button2>
    </div>

</form>

{{-- Modales --}}
<livewire:modal-funcionario></livewire:modal-funcionario>
<livewire:modal-expediente></livewire:modal-expediente>
