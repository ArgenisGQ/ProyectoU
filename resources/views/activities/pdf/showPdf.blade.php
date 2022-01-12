<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF show</title>

    <style type="text/css">
        {{$css_data}}
        <style>
        /* @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 300;
        src: local('Roboto Light'), local('Roboto-Light'), url(https://fonts.gstatic.com/s/roboto/v20/KFOlCnqEu92Fr1MmSU5vAw.ttf) format('truetype');
        }
        @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v20/KFOmCnqEu92Fr1Me5Q.ttf) format('truetype');
        }
        @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v20/KFOlCnqEu92Fr1MmWUlvAw.ttf) format('truetype');
        } */

        @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 250;
        src: local('Roboto'), local('Roboto-Regular'), url('fonts/Roboto-Regular.ttf') format('truetype');
        }

        /* Añado la declaración de font-family, para usar la fuente de Google Fonts en este PDF */

        body {
            font-family: 'Roboto', serif;
            color: 303030;
        }
    </style>




    <style>
        /* @page {
            /* margin-left: 0cm;
            margin-right: 0cm;
            margin: 0cm 0cm;
            border: 0cm;
            padding: 0cm;
            bottom: 0cm;
        } */

        /* @page {
            size: 8.5in 11in;
            margin: 10%;


        } */

        @page {
            @top-left-corner {  }
            @top-right-corner {  }
            @bottom-right-corner { }
            @bottom-left-corner {  }
        }

        body {
            /* margin-top: 4cm;
            margin-left: 1.5cm;
            margin-right: 1.5cm;
            margin-bottom: 1cm; */

            /* height: 842px;
            width: 595px; */
            height: 28cm;
            width: 18cm; /* to centre page on screen*/
            margin-top: 2cm;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 2cm;



        }

        /* main {
            float:none;
        } */
        header {
            /* position: fixed; */
            width: 22cm;
            margin-left: auto;
            margin-right: auto;
            top: 0cm;
            /* left: 0cm */;
            /* right: 0cm; */
            height: 0cm;

            /* height: 20mm;
            width: 220mm;
            margin-top: 2cm;
            margin-left: auto;
            margin-right: auto; */




            /* background-color: #ffffffdc; */
            /* color: gray; */
            /* text-align: left; */
            /* line-height: 0.5cm; */
        }
        footer {
            /* position: fixed; */
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1.5cm;

            /* background-color: #ffffffdc; */
            color: gray;
            text-align: center;
            line-height: 1.5;

        }

        /* forza un salto de pagina de un elemento */
        .page-break {
            page-break-after: auto;
            /* page-break-before: auto; */
        }

        /* evita un elemento salte de pagina antes de tiempo */
        .page-break-no {
            page-break-before:auto;
        }

        /* evita un elemento se divida en un salto de pagina  */
        .page-break-inside {
            page-break-inside: avoid;
        }

        .lines-widows {
            widows:3;
            orphans:3
        }

        #watermark  {
            position: fixed;

            /* posicion de la imagen en la pagina */
            bottom: 10cm;
            left: 5.5cm;

            /* cambiar tamaño de la imagen */
            width: 8cm;
            height: 8cm;

            /* marca de agua debe estar detras del texto */
            z-index: -1000;
        }

        /* --estilos para tablas-- */

        table.colapsado {
            border-collapse: collapse;
        }

        .ancho-1de4 {
            /* background-color: blue; */
            width: 25%;
        }

        .ancho-3de4 {
            /* background-color: blue;  */
            width: 75%;
        }

        .bg-gris {
            /* background-color: blue;  */
            background-color:#CEC8C6;
        }


    </style>


</head>


{{-- <body style="margin: 50px 40px"> --}}
<body>




    {{-- <header>

        <span class="p-2">
            <img src="{{$logo}}" width="90" class="mx-auto">
        </span>
        <span>
            <p class="text-right small"> FOO-VRA140-202321-104 </p>
        </span>
        <span>
            <h6 class="text-center ">UNIVERSIDAD YACAMBU</h6>
            <h6 class="text-center ">VICERRECTORADO ACADEMICO</h6>
            <h6 class="text-center ">DIRECCION DE ESTUDIOS A DISTANCIA</h6>
        </span>


    </header> --}}

    <main class="p-1">

       {{--  <div id="watermark">
            <img src="{{$logo}}" width="274" height="375" >
        </div> --}}


        <div class="">
            <p class="text-center"></p>
            <h3 class="text-center">Redaccion de Actividades de Aprendizaje</h3>
            <div class="row ">
                <div class="">
                    {{-- <table class="table table-hover page-break"> --}}
                    <table class="table table-hover page-break">
                        <tbody class="text-center">
                            <tr>
                                <th class="bg-gris" scope="row">Docente - PDF - ONLY SHOW</th>
                                <td>{!! auth()->user()->name !!}</td>
                            </tr>
                        </tbody>
                        <br>
                        <tbody class="text-center">
                            <tr>
                                <th scope="row" class="ancho-1de4 bg-gris">Asignatura</th>
                                <td class="ancho-3de4">
                                    @foreach ($activity->courses as $course)

                                            <a href="{{route('activities.course', $course)}}">
                                                <span class="">{{$course->name}}</span>
                                            </a>

                                    @endforeach
                                </td>
                            </tr>
                        </tbody>

                        <tbody class="text-center">
                            <tr>
                                <th class="bg-gris" scope="row">Facultad</th>
                                <td class="">
                                    @foreach ($facultad as $facultadd)

                                            <a href="{{route('activities.faculty', $facultadd)}}">
                                                <span class="ml-2 text-gray-600">{{$facultadd->name}}</span>
                                            </a>

                                    @endforeach
                                </td>
                            </tr>
                        </tbody class="text-center">

                        <tbody class="text-center">
                            <tr>
                                <th class="bg-gris" scope="row">Actividad</th>
                                <td class="">{{$activity->name}}</td>
                            </tr>
                        </tbody>

                        <tbody class="text-center">
                            <tr>
                                <th class="bg-gris colapsado" border="1" scope="row">Tipo de Actividad</th>
                                <td class="">- - - seleccion - - -</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="page-break colapsado" border="1"">
                        <thead class="thead-light">
                            <tr>
                                <th class="p-1 text-center bg-gris">Descripcion de la actividad</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="">{!! $activity->body !!}</td>
                            </tr>
                        </tbody>

                    </table>
                    {{-- <div class="page-break"></div> --}}
                    <table class="page-break-inside colapsado" border="1">
                        <thead>
                            <tr>
                                <th class="p-1 text-center bg-gris" >Proposito de la actividad</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="">{!!$activity->extract!!}</td>
                            </tr>
                        </tbody>

                    </table>
                    <table class="page-break-inside colapsado" border="1">
                        <thead>
                            <tr>
                                <th class="p-1 text-center bg-gris">Aprendido en la actividad</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="" >{!!$activity->extract01!!}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

    {{-- ------------------------------------------------------------------------------ --}}
        </div>
    </main>

    <footer>
        http://uny.edu.ve
    </footer>

{{-- --------Scrip de salto de pagina------------- --}}
    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 820, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>
</body>


</html>
