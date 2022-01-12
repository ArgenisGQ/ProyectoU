<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>

    <style type="text/css">
        {{$css_data}}
        <style>/*
        @font-face {
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

        /* h6 {
            font-family: 'Roboto', serif;
            color: 303030;
        } */

        h1,h2,h3,h4,h5,h6 {
            font-family: "Roboto", sans-serif;
            font-weight: normal;
            /* color: red; */
            margin-bottom:5px;
            margin-top:0px;
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
            margin-top: 4cm;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 0cm;



        }

        /* main {
            float:none;
            /* top: 0cm; */
            margin-top: 0cm;
            margin-bottom: 0cm;
        } */

        header {
            position: fixed;
            width: 18cm;
            margin-left: auto;
            margin-right: auto;
            top: 0cm;
        }

        main {
            float:none;
            width: 18cm;
            /* top: 0cm; */
            margin-top: auto;
            margin-bottom: auto;
            margin-left: auto;
            margin-right: auto;
            font-size: 15px;
        }

        /* header {
            position: fixed;
            width: 18cm;
            margin-left: auto;
            margin-right: auto;
            top: 0cm;
            /* left: 0cm ; */
            /* right: 0cm; */
            /* height: 4cm; */

            /* height: 20mm;
            width: 220mm;
            margin-top: 2cm;
            margin-left: auto;
            margin-right: auto; */




            /* background-color: #ffffffdc; */
            /* color: gray; */
            /* text-align: left; */
            /* line-height: 4cm; */
        } */

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;

            /* background-color: #ffffffdc; */
            color: gray;
            text-align: center;
            line-height: 1cm;

        }

        /* forza un salto de pagina de un elemento */
        .page-break {
            page-break-after: always;
            /* page-break-before: auto; */
        }

        /* evita un elemento salte de pagina antes de tiempo */
        .page-break-no {
            page-break-before:always;
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

            /* opacidad */
            filter:alpha(opacity=15);
            opacity:.15;
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

        /* ---Margenes para texto lado del logo--- */

        .mg-text  {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 80px;
        }

        .mg-logo  {
            margin-top: 20px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .mg-text-codigo  {
            margin-top: 25px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .mg-text-emcabezado  {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 30px;
        }

    </style>


</head>


{{-- <body style="margin: 50px 40px"> --}}
<body>




    <header>

        <span class="p-2">
            <img src="{{$logo}}" width="70" class="mx-auto mg-logo">
        </span>
        <span>
            <p class="text-right small mg-text-codigo "> FOO-VRA140-202321-104 </p>
        </span>
        {{-- <span>
            <h6 class="mg-text ">UNIVERSIDAD YACAMBU</h6>
            <h6 class="mg-text ">VICERRECTORADO ACADEMICO</h6>
            <h6 class="mg-text ">DIRECCION DE ESTUDIOS A DISTANCIA</h6>
        </span> --}}

        <span>
            <h6 class="mg-text-emcabezado text-center ">UNIVERSIDAD YACAMBU</h6>
            <h6 class="mg-text-emcabezado text-center ">VICERRECTORADO ACADEMICO</h6>
            <h6 class="mg-text-emcabezado text-center ">DIRECCION DE ESTUDIOS A DISTANCIA</h6>
        </span>

    </header>

    <main class="p-1">

        {{-- <div id="watermark">
            <img src="{{$logo}}" width="274" height="375" >
        </div> --}}


        <div class="">
            <p class="text-center"></p>
            <h3 class="text-center">Redaccion de Actividades de Aprendizaje</h3>
            <div class="">
                <div class="">
                    <div class="">

                        <table class="table table-sm colapsado" border="2">
                            <tbody class="text-center">
                                <tr>
                                    <th scope="row" class="ancho-1de4 bg-gris">Docente - PDF - down</th>
                                    <td class="ancho-3de4">{!! auth()->user()->name !!}</td>

                                </tr>
                            </tbody>

                            <tbody class="text-center">
                                <tr>
                                    <th class="bg-gris" scope="row">Asignatura</th>
                                    <td class="">
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
                                    <th class="bg-gris" scope="row">Tipo de Actividad</th>
                                    <td class="">- - - seleccion - - -</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="">

                        <table class="colapsado" border="1">
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



                            {{-- <div class="thead-light">
                                <div>
                                    <div class="p-1 text-center table-dark">Descripcion de la actividad</div>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <div class="">{!! $activity->body !!}</div>
                                </div>
                            </div> --}}




                    </div>
                    {{-- <div class="page-break"></div> --}}

                    <div class="page-break-inside">

                        <table class="colapsado" border="1" >
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


                            {{--
                            <div>
                                <div>
                                    <h5 class="p-1 text-center" >Proposito de la actividad</h5>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <div class="">{!!$activity->extract!!}</div>
                                </div>
                            </div>
                            --}}

                    </div>

                    <div class="page-break-inside">

                        <table class="colapsado" border="1" >
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



                            {{-- <div>
                                <div>
                                    <h5 class="p-1 text-center">Aprendido en la actividad</h5>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <div class="" >{!!$activity->extract01!!}</div>
                                </div>
                            </div>
                            --}}

                    </div>
                </div>
            </div>

    {{-- ------------------------------------------------------------------------------ --}}
        </div>
    </main>

    <footer class="">
        <p>http://uny.edu.ve</p>
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
