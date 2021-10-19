@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <h1>Crear usuarios</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {{-- {!! Form::open(['route' => 'admin.users.store']) !!} --}}
            {!! Form::model($user, ['route' => ['admin.users.store', $user], 'method' => 'put']) !!}

                {{-- @include('admin.users.partials.form') --}}

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            {!! Form::password('password', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="confirm-password">Confirmar Password</label>
                            {!! Form::password('confirm-password', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="">Rol</label>
                            {!! Form::select('roles[]', $role,[],['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div> --}}

                <h2 class="h5">Listado de Roles</h2>
                {{-- {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!} --}}
                    @foreach ($role as $roles)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $roles->id, null, ['class' => 'mr-1']) !!}
                                {{$roles->name}}
                            </label>
                        </div>
                    @endforeach

                {!! Form::submit('Crear usuario', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
