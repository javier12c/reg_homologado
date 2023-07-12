@extends('layouts.dashboard')
@section('aside')
    <livewire:mostrar-aside></livewire:mostrar-aside>
@endsection
@section('contenido')
    @if (session()->has('mensaje'))
        <div class=" mt-14 uppercase border border-green-600 bg-green-100 text-green-600 p-2 font-bold my-3 text-sm">
            {{ session('mensaje') }}
        </div>
    @endif
    <h1 class="font-bold text-2xl mt-2 text-center">Editando servidor publico <span
            class=" text-usuario-letra">{{ $funcionario->emp_nombre . $funcionario->emp_apellido }}</span> </h1>
    <livewire:editar-funcionario :funcionario="$funcionario" />
@endsection
