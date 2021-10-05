@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <a href="{{route('admin.posts.create')}}" class="float-right btn btn-secondary btn-sm">Nuevo post</a>

    <h1>Listado de Guias de Actividades desarrolladas</h1>
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
