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
                                                                'evaluations'))
              </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
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


    </style>
@stop

@section('js')
    @livewireScripts
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script> --}}
    {{-- <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script> --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    {{-- --DATEPICKER-- --}}
    {{-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> --}}
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    {{-- <script>
        $(function() {
        $( "#datepicker" ).datepicker();
        });
    </script> --}}

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
                    myEditor = editor;
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
