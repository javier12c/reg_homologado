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
    <livewire:mostrar-registros></livewire:mostrar-registros>
@endsection
