@extends('layouts.dashboard')
@section('aside')
    <livewire:mostrar-aside></livewire:mostrar-aside>
@endsection
@section('contenido')
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class=" text-3xl font-bold text-center my-10">Mis notificaciones</h1>
                    <div class=" divide-y divide-gray-200">
                        @forelse ($notificaciones as $notificacion)
                            <div class="  p-5 lg:flex lg:justify-between lg:items-center">
                                <div class=" ">
                                    <p class=""> Tienes un nuevo registro. Numero de documento es : <span
                                            class=" font-bold">
                                            {{ $notificacion->data['numero_documento'] }}
                                        </span> </p>
                                    <p class=""> El cual fue creado por el usuario <span class=" font-bold">
                                            {{ $notificacion->data['nombre_usuario'] }}
                                        </span> </p>
                                    <p class=""> Hace: <span class=" font-bold">
                                            {{ $notificacion->created_at->diffForHumans() }}
                                        </span> </p>
                                </div>
                                <div class=" mt-5 lg:mt-0">
                                    <a href="{{ route('registro.show') }}"
                                        class=" bg-header p-3 text-sm uppercase font-bold text-white rounded-lg">Ver
                                        registros</a>
                                </div>
                            </div>
                        @empty
                            <p class=" text-center text-gray-600 "> No hay notificaciones nuevas</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
