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

        {{-- <div class="card">
            <div class="card-body">
            {!! Form::model($activity,['route' => ['admin.activities.update', $activity], 'autocomplete' => 'off', 'files' => 'true', 'method' => 'PUT' ]) !!} --}}

                {{-- {!! Form::hidden('user_id', auth()->user()->id) !!} --}}

                {{-- @include('admin.activities.partials.form') --}}


                {{-- {!! Form::submit('Actualizar actividad', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            </div>
        </div> --}}

        <div class="container">
            <div class="row" style="margin-top:50px">
                  <div class="col-md-6 offset-md-3">
                      {{-- <h1>Creacion de Actividades</h1><hr> --}}
                      @livewire('admin.activities-edit', compact('courses', 'userActiveName',
                                                                    'evaluations', 'userActiveId', 'lapse_in', 'lapse_out',
                                                                    'activity', 'id_activity', 'activity_course', 'coursesForUser'))
                  </div>
            </div>
        </div>
@stop

@section('css')

        {{-- <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"> --}}

        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" integrity="sha256-SMGbWcp5wJOVXYlZJyAXqoVWaE/vgFA5xfrH3i/jVw0=" crossorigin="anonymous" /> --}}

        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css"> --}}
        {{-- <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet"> --}}

        {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> --}}

        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> --}}

        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css"> --}}



        {{-- <link rel="stylesheet"  href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
        <link rel="stylesheet"  href="{{asset('datePicker/css/bootstrap-standalone.css')}}"> --}}

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

        {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css"> --}}


        {{-- @import './node_modules/pikaday/css/pikaday.css'; --}}
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css"> --}}

        @livewireStyles

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

             /* textarea independiente  */
                .text-editor {
                width:800px;
                margin-top:20px;
                }
                #editor-container {
                height: 100px;
                }
                #counter {
                border: 1px solid #ccc;
                border-width: 0px 1px 1px 1px;
                color: #aaa;
                padding: 5px 15px;
                text-align: right;
                }

                .btn01 {
                margin-top:15px;
                font-size: 14px;
                font-weight: 400;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                border: 1px solid transparent;
                border-radius: 4px;
                }
                .btn-primary01 {
                cursor: pointer;
                color: #fff;
                background-color: #337ab7;
                border-color: #2e6da4;
                padding: 5px;
                border-radius: 5px;
                }

                @import "compass/css3";

                * {
                box-sizing: border-box;
                }

                body {
                padding: 2em;
                font-family: Arial, sans-serif;
                font-weight: normal;
                color: #333;
                }

                .dates-wrapper {
                background: #f0f0f0;
                padding: 1em 1em 0 1em;
                display: inline-block;
                }

                .input-text {
                background-color: #ffffff;
                padding: 2px 10px;
                color: #333;
                border: 1px solid #dddddd;
                outline: none;
                vertical-align: middle;
                height: 36px;
                border-radius: 0;
                display: block;
                width: 100%;
                -webkit-appearance: none;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                }

                .date-wrapper {
                position: relative;
                margin: 0 42px 10px 0;
                display: inline-block;
                .label {
                    float: left;
                    display: inline-block;
                    margin-right: 28px;
                    padding-top: 10px;
                }
                .input {
                    font-size: 15px;
                    color: #333;
                    max-width: 172px;
                    float: left;
                    margin-right: 10px;
                    input {
                    float: left;
                    width: 100%;
                    padding: 2px 10px;
                    }
                }
                .calendar-btn {
                    display: inline-block;
                    width: 36px;
                    height: 36px;
                    border-radius: 18px;
                    float: left;
                    background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/9487/icon-calendar-72x72.png);
                    background-repeat: no-repeat;
                    background-size: 36px 36px;
                }
        }

                .pika-single {
                position: absolute;
                top: 40px;
                left: 0px;
                .pika-title {
                    color: #444;
                }
                .is-selected .pika-button {
                    border-radius: 0;
                    box-shadow: none;
                    background: #ec0000;
                }
                .pika-table tbody td {
                    border: 1px solid #b9b9b9;
                }
                .pika-button:hover {
                    border-radius: 0 !important;
                    box-shadow: none !important;
                    background: #868686 !important;
                }
                .is-today .pika-button {
                    color: #ec0000;
                }
                .is-today.is-selected .pika-button {
                    color: #fff;
                }
                }

                .hide-text {
                text-indent: 100%;
                white-space: nowrap;
                overflow: hidden;
                }
                .group:after {
                content: "";
                display: table;
                clear: both;
                }

        </style>
@stop

@section('js')
        @livewireScripts
        {{-- @stack('js') --}}

        {{-- @push('js')
                <script>
                    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

                    /
                        .create( document.querySelector('body'))
                        .catch(error => {
                            console.error (error);
                        });


                </script>
        @endpush --}}
        {{-- <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script> --}}
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script> NO--}}

        {{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>



        {{-- <script src="https://rawgit.com/dbushell/Pikaday/master/pikaday.js"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script> --}}
        {{-- <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script> --}}

        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> --}}


        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
        <script src="{{ asset('dataPicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('dataPicker/locales/bootstrap-datepicker.es.min.js') }}"></script>

        <script src="https://rawgit.com/dbushell/Pikaday/master/pikaday.js"></script>



        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        {{-- <script src="https://cdn.jsdelivr/npm/pikaday/pikaday.js"></script> --}}


        {{-- <script src="moment.js"></script>
        <script src="pikaday.js"></script> --}}

        {{-- @stack('js') --}}


        {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> --}}

        <script>
            $(document).ready( function() {
                $("#name").stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-'
                });
            });

            /* var picker = new Pikaday({
                field: document.getElementById('datepicker'),
                onSelect: date => {
                    const year = date.getFullYear()
                        ,month = date.getMonth() + 1
                        ,day = date.getDate()
                        ,formattedDate = [
                                    month < 10 ? '0' + month : month,
                                    day < 10 ? '0' + day : day,
                                    year
                        ].join('/')
                    document.getElementById('datepicker').value = formattedDate
                }
                }) */


            /* $(function() { */
                /* var picker = new Pikaday({
                        field: document.getElementById('#datetimepicker2'),
                        format: 'DD MM YYYY'

                    }) */
                /* }); */
            /* }); */


            /* $(function() {
                $('#datetimepicker1').datetimepicker();
            }); */

            /* $(function () { */
                    /* $('.datetimepicker').datepicker({
                        format: "mm/dd/yy",
                        weekStart: 0,
                        calendarWeeks: true,
                        autoclose: true,
                        todayHighlight: true,
                        orientation: "auto"
                    }); */
            /*     }); */

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



            /* CKEDITOR.replace( 'extract' );

            CKEDITOR.replace( 'extract01' );

            CKEDITOR.replace( 'body' ); */


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


