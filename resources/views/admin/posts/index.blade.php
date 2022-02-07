@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <a href="{{route('admin.posts.create')}}" class="float-right btn btn-secondary btn-sm">Nueva Actividad</a>

    <h1>Listado de Catalogo</h1>
@stop

@section('content')

        @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
        @endif

        @livewire('admin.posts-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
