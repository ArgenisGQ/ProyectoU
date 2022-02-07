@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')

<a href="{{route('admin.users.create')}}" class="float-right btn btn-secondary btn-sm">Agregar nuevo usuario</a>
    <h1>LISTA DE USUARIOS</h1>

@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
    @endif

    @livewire('admin.usersindex')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
