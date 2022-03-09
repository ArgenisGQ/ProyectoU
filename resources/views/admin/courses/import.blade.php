@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <h1>Crear materias</h1>
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
            {{-- {!! Form::model($user, ['route' => ['admin.courses.store', $user], 'method' => 'put']) !!} --}}

            <div class="container mt-5">
                <h3>Importar materias</h3>

                <p>El nombre del archivo debe ser materias.xlsx</p>
                <p>El listado debe tener en inicio de linea los campos de</p>
                <p>NOMBRE, CEDULA, EMAIL, CLAVE</p>
                {{-- @if ( $errors->any() )
                    <div class="alert alert-danger">
                        @foreach( $errors->all() as $error )<li>{{ $error }}</li>@endforeach
                    </div>
                @endif --}}

                @if ( isset($fallas))
                    <div class="alert alert-danger">
                        @foreach( $fallas as $falla )<li>{{ $falla }}</li>@endforeach
                    </div>
                @endif

                @if(isset($numRows))
                    <div class="alert alert-sucess">
                        Se importaron {{$numRows}} registros.
                    </div>
                @endif


                    <form action="{{route('admin.courses.import')}}" method="post" enctype="multipart/form-data">
                        {{-- {{csrf_field()}} --}}
                        @csrf
                        <div class="form-group">
                            <input type="file" name="file" id="file" accept=".xlsx">
                            <br>
                            @error('file')
                                <small class="text-danger">{{$message}}</small>
                            @enderror

                        </div>
                            <button type="submit" class="btn btn-primary" >Importar</button>


                    {{--
                        <div class="row">
                            <div class="col-3">
                                <div class="custom-file">
                                    <input type="file" name="usuarios" class="custom-file-input" id="usuarios">
                                    <label class="custom-file-label" for="usuarios">Seleccionar archivo</label>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Importar</button>
                                </div>
                            </div>
                        </div>
                         --}}
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
