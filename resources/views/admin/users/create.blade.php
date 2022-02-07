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
            {!! Form::open(['route' => 'admin.users.store']) !!}
            {{-- {!! Form::model($user, ['route' => ['admin.users.store', $user], 'method' => 'put']) !!} --}}

                @include('admin.users.partials.form')


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
