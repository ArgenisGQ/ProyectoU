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

    <div class="card">
        <div class="card-body">
            <table class="table table-triped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de la Materia</th>
                        <th>Codigo</th>
                        <th>Materia</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->code}}</td>
                            <td>{{$course->section}}</td>
                            <td width="10px">
                                @can('admin.courses.edit')
                                    <a href="{{route('admin.courses.edit', $course)}}" class="btn btn-primary btn-sm">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.courses.destroy')
                                    <form action="{{route('admin.courses.destroy', $course)}}" method="POST">
                                        @csrf
                                        @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
