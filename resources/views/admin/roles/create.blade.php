@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <h1>CREAR NUEVO ROL</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        {!! Form::open(['route' => 'admin.roles.store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre del Rol') !!}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del Rol']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        </div>

        <h2 class="h3">Lista de permisos</h2>
            @foreach ($permissions as $permission)
                <div>
                    <label>
                        {!! Form::checkbox('permissions', $permission->od, null, ['class' => 'mr-1']) !!}
                        {{$permission->name}}
                    </label>
                </div>
            @endforeach


    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
