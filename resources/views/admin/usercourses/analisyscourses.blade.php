@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <h1>Analisis MATERIAS</h1>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Seccion</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($total_courses as $total_course)
                        <tr>
                            <td>{{ $total_course->id }}</td>
                            <td>{{ $total_course->code }}</td>
                            <td>{{ $total_course->course }}</td>
                            <td>{{ $total_course->section }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <div class="container mt-5">
                <h3>analisis de datos de profesores y materias</h3>




                {{-- @if ( $errors->any() )
                    <div class="alert alert-danger">
                        @foreach( $errors->all() as $error )<li>{{ $error }}</li>@endforeach
                    </div>
                @endif --}}

                {{-- @if ( isset($fallas))
                    <div class="alert alert-danger">
                        @foreach( $fallas as $falla )
                        <li>{{ $falla }}</li>
                        @endforeach
                    </div>
                @endif --}}

                {{-- @if(isset($numRows))
                    <div class="alert alert-sucess">
                        Se importaron {{$numRows}} registros.
                    </div>
                @endif --}}


                    {{-- <form action="{{route('admin.usercourses.import')}}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <input type="file" name="file" id="file" accept=".xlsx">
                            <br>
                            @error('file')
                                <small class="text-danger">{{$message}}</small>
                            @enderror

                        </div>

                    </form> --}}


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
