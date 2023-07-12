@extends('layouts.dashboard')
@section('aside')
    <livewire:mostrar-aside></livewire:mostrar-aside>
@endsection
@section('contenido')
    @livewire('registros-usuario', ['usuarioId' => $user->id])
@endsection
