@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    <h1>Crear nueva Actividad</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

    {{-- <div class="card">
        <div class="card-body">


            @livewire('admin.activities-create')



        </div>

    </div> --}}


    <div class="container">
        <div class="row" style="margin-top:50px">
              <div class="col-md-6 offset-md-3">
                  {{-- <h1>Creacion de Actividades</h1><hr> --}}
                  @livewire('admin.activities-create', compact('courses', 'userActiveName',
                                                                'evaluations', 'userActiveId'))
              </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
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
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script> --}}
    {{-- <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script> --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script> --}}
    {{-- <script>src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"</script> --}}
    <script src="https://rawgit.com/dbushell/Pikaday/master/pikaday.js"></script>

    {{-- --DATEPICKER-- --}}
    {{-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> --}}
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    {{-- <script>
        $(function() {
        $( "#datepicker" ).datepicker();
        });
    </script> --}}

    <script src="moment.js"></script>
    <script src="pikaday.js"></script>
    {{-- <script>
        var picker = new Pikaday({ field: document.getElementById('datepicker'),
                                   format: 'MM/DD/YYYY',

        });
    </script> --}}

    <script>
            /* var picker = new Pikaday({
            field: document.getElementById('datepicker'),
            i18n: {
                previousMonth : 'Anterior',
                nextMonth     : 'Siguiente',
                months        : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                weekdays      : ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
                weekdaysShort : ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb']
                },
                format: 'DD/MM/YYYY',
                onSelect: function(date) {
                    field.value = this.getMoment().format('DD/MM/YYYY');

                }
            }); */

            /* var picker = new Pikaday({
                    field: document.getElementById('datapicker'),
                    toString(date, format) { // using moment
                        return moment(date).format('MM/DD/YYYY');
                    },
                }); */


                var picker = new Pikaday({
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
                })

                /* if ( $('html').hasClass('no-touch') ) {
                var $input, $btn;
                $( ".date-wrapper" ).each(function( index ) {
                    $input = $(this).find('input');
                    $btn = $(this).find('.calendar-btn');
                    $input.attr('type', 'text');
                    var pickerStart = new Pikaday({
                                        field: $input[0],
                                        trigger: $btn[0],
                                        container: $(this)[0],
                                        format: 'DD/MM/YYYY',
                                        firstDay: 1
                    });
                    $btn.show();
                });
                } else {
                $('.date-wrapper input').attr('type', 'date');
                $('.calendar-btn').hide();
                } */


    </script>

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
        .create( document.querySelector( '#body01' ) )
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
        //Sript para contar caracteres en textarea
        /* var myEditor;

            ClassicEditor
                .create( document.querySelector( '#body' ) )
                .then( editor => {
                    console.log( 'Editor was initialized', editor );
            p        myEditor = editor;
                } )
            .catch( err => {
                console.error( err.stack );
                } );
        myEditor.getData(); */

        /* var toolbarOptions = [
            ['bold', 'italic', 'underline'],        // toggled buttons
            ['blockquote'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'align': [] }],
            ['clean']                                         // remove formatting button
            ];

        Quill.register('modules/counter', function(quill, options) {
        var container = document.querySelector(options.container);
        quill.on('text-change', function() {
            var text = quill.getText();
            if (options.unit === 'word') {
            container.innerText = text.split(/\s+/).length + ' words';
            } else {
            container.innerText = text.length + ' characters';
            }
        });
        });
        var quill = new Quill('#body', {
        modules: {
            toolbar: toolbarOptions,
            counter: {
            container: '#counter',
            unit: 'character'
            }
        },
        theme: 'snow' });
        var form = document.querySelector('form');
        form.onsubmit = function() {
        // Populate hidden form on submit
        var about = document.querySelector('input[name=box]');
        about.value = JSON.stringify(quill.getContents());

        console.log("field length: " + about.value.length + " ", $(form).serialize(), $(form).serializeArray());

        // No back end to actually submit to!
        alert('Open the console to see the submit data!')
        return false;
        };
 */
        /* $(function() {
        $( "#datepicker" ).datepicker();
        }); */

    </script>
@stop
