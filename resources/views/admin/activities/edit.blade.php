@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <h1>Editar Actividad</h1>
@stop

@section('content')

        @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
            {!! Form::model($activity,['route' => ['admin.activities.update', $activity], 'autocomplete' => 'off', 'files' => 'true', 'method' => 'PUT' ]) !!}

                {{-- {!! Form::hidden('user_id', auth()->user()->id) !!} --}}

                @include('admin.activities.partials.form')


                {!! Form::submit('Actualizar actividad', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            </div>
        </div>
@stop

@section('css')
        <style>
            .image-wrapper{
                position: relative;
                padding-bottom: 56.25%
            }

            .image-wrapper img{
                position:absolute;
                objet-fit: cover;
                width: 100%;
                height: 100%;
            }

        </style>
@stop

@section('js')
        <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script> --}}
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            $(document).ready( function() {
                $("#name").stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-'
                });
            });

            /* ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );

            ClassicEditor
            .create( document.querySelector( '#extract01' ) )
            .catch( error => {
                console.error( error );
            } );

            ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } ); */

            CKEDITOR.replace( 'extract' );

            CKEDITOR.replace( 'extract01' );

            CKEDITOR.replace( 'body' );


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
