@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    @can('admin.periods.create')
        <a href="{{route('admin.periods.create')}}" class="float-right btn btn-secondary btn-sm">Agregar Periodo</a>
    @endcan

    <a href="{{route('admin.periods.create')}}" class="float-right btn btn-secondary btn-sm">Agregar Periodo</a>

    <h1>Lista de Periodos</h1>
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
                        <th>Nombre del periodo</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($periods as $period)
                        <tr>
                            <td>{{$period->id}}</td>
                            <td>{{$period->name}}</td>
                            <td width="10px">
                                @can('admin.periods.edit')
                                    <a href="{{route('admin.periods.edit', $period)}}" class="btn btn-primary btn-sm">Editar</a>
                                @endcan

                            </td>
                            <td width="10px">
                                @can('admin.periods.destroy')
                                    <form action="{{route('admin.periods.destroy', $period)}}" method="POST">
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


