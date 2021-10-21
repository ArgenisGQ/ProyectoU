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
            {{-- {!! Form::open(['route' => 'admin.users.import']) !!} --}}
            {{-- {!! Form::model($user, ['route' => ['admin.users.store', $user], 'method' => 'put']) !!} --}}

            <div class="container mt-5">
                <h3>Importar profesores</h3>

                @if ( $errors->any() )

                    <div class="alert alert-danger">
                        @foreach( $errors->all() as $error )<li>{{ $error }}</li>@endforeach
                    </div>
                @endif

                @if(isset($numRows))
                    <div class="alert alert-sucess">
                        Se importaron {{$numRows}} registros.
                    </div>
                @endif

                <form action="{{route('admin.users.import')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-3">
                            <div class="custom-file">
                                <input type="file" name="alumnos" class="custom-file-input" id="alumnos">
                                <label class="custom-file-label" for="alumnos">Seleccionar archivo</label>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Importar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>




                {{-- {!! Form::submit('Crear usuario', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!} --}}
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
