@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <h1>Perfil de usuario</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
    @endif


    @include('profile.show')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop
