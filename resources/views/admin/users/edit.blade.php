@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <h1>Editar usuarios</h1>
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
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}

                @include('admin.users.partials.form')


                {!! Form::submit('Actualizar usuario', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        //Scrip para cargar archivo de imagen en url
        document.getElementById("file").addEventListener('change', cambiarImagen);

            function cambiarImagen(event){
                var file = event.target.files[0];

                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById("picture").setAttribute('src', event.target.result);
                };

        reader.readAsDataURL(file);
        }
    </script>
@stop
