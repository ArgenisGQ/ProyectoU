@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    {{-- @can('admin.roles.create') --}}
        <a href="{{route('admin.roles.create')}}" class="float-right btn btn-secondary btn-sm">Agregar rol</a>
    {{-- @endcan --}}
    <h1>LISTA DE ROLES</h1>
@stop

@section('content')

        @if (session('info'))
            <div class="alert alert-success">
                {{session('info')}}
            </div>
        @endif

        <div class="card">

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td width="10px">
                                   {{--  @can('admin.roles.edit') --}}
                                        <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary btn-sm">Editar</a>
                                    {{-- @endcan --}}

                                </td>
                                <td width="10px">
                                    {{-- @can('admin.roles.destroy') --}}
                                        <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    {{-- @endcan --}}
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
