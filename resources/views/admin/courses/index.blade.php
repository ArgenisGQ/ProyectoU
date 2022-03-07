@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    @can('admin.courses.create')
        <a href="{{route('admin.courses.create')}}" class="float-right btn btn-secondary">Nueva Materia</a>
    @endcan


    <h1>Listado de materias</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.course-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
