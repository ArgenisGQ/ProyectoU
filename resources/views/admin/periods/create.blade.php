@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <h1>Crear nuevo periodo academico</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        {!! Form::open(['route' => 'admin.periods.store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre del periodo') !!}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del Periodo']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

           {{--  <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Slug de la facultad','readonly']) !!}

                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div> --}}

            <div class="form-group">

                {!! Form::label('lapse', 'Fecha de inicio del periodo:') !!}


                {{-- {!! Form::textarea('lapse', null, ['class' => 'form-control']) !!} --}}

                {{-- {{Form::date ('lapse_in', $activity->lapse_in )}} --}}
                {{Form::date ('academic_start', $last_period )}}

                @error('academic_start')
                    <span class="text-danger">{{$message}}</span>
                @enderror


                {{-- ---- --}}
                {!! Form::label('lapse', 'Fecha de cierre del periodo:') !!}

                {{-- {{Form::date ('lapse_out', $activity->lapse_out )}} --}}
                {{Form::date ('academic_finish', $last_period )}}

                @error('academic_finish')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                {{-- ---- --}}
            </div>



            {!! Form::submit('Crear periodo', ['class' => 'btn btn-primary']) !!}
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
