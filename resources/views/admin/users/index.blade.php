@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <h1>LISTA DE USUARIOS</h1>
@stop

@section('content')
    @livewire('admin.usersindex')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
