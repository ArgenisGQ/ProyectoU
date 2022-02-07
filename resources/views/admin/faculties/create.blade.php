@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <h1>Crear nueva Facultad</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        {!! Form::open(['route' => 'admin.faculties.store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre de facultad') !!}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la Facultad']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Slug de la facultad','readonly']) !!}

                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            {!! Form::submit('Crear facultad', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop
