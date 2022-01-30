@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <h1>Editar Periodo</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
        {!! Form::model($period, ['route' => ['admin.periods.update', $period], 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre del periodo') !!}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del periodo']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            {{-- <div class="form-group">
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
                {{Form::date ('academic_start', $start_acad )}}

                @error('academic_start')
                    <span class="text-danger">{{$message}}</span>
                @enderror


                {{-- ---- --}}
                {!! Form::label('lapse', 'Fecha de cierre del periodo:') !!}

                {{-- {{Form::date ('lapse_out', $activity->lapse_out )}} --}}
                {{Form::date ('academic_finish', $finish_acad )}}

                @error('academic_finish')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                {{-- ---- --}}
                {!! Form::hidden('start_acad', $start_acad) !!}
                {!! Form::hidden('finish_acad',$finish_acad) !!}
            </div>


            {!! Form::submit('Actualizar periodo', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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
