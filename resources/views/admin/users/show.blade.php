@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <h1>Perfil de usuario</h1>
@stop

@section('content')

    @include('profile.show-adminlte')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop
