@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    @can('admin.faculties.create')
        <a href="{{route('admin.faculties.create')}}" class="float-right btn btn-secondary btn-sm">Agregar Facultades</a>
    @endcan

    <h1>Lista de Facultades</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de la Facultades</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($faculties as $faculty)
                        <tr>
                            <td>{{$faculty->id}}</td>
                            <td>{{$faculty->name}}</td>
                            <td width="10px">
                                @can('admin.faculties.edit')
                                    <a href="{{route('admin.faculties.edit', $faculty)}}" class="btn btn-primary btn-sm">Editar</a>
                                @endcan

                            </td>
                            <td width="10px">
                                @can('admin.faculties.destroy')
                                    <form action="{{route('admin.faculties.destroy', $faculty)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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


