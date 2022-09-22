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
            /* page-break-before:auto; */

            /* page-break-inside:always; */

            page-break-after:always
            /* page-break-after:always; */
        }

        /* evita un elemento se divida en un salto de pagina  */
        .page-break-inside {
            page-break-inside: avoid;
        }
/*
        table.page-break-inside tr td, table.page-break-inside tr th {
            page-break-inside: avoid;
        } */

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

        /* para tablas con css */
        .cell   {
            display: table-cell;
            border: solid;
            border-width: thin;
            padding-left: 5px;
            padding-right: 5px;
        }

        .tablet  {
            display: table;
        }

        .title   {
            display: table-caption;
            text-align: center;
            font-weight: bold;
            font-size: larger;
        }

        .heading   {
            display: table-row;
            font-weight: bold;
            text-align: center;
        }

        .row    {
            display: table-row;
        }
        /* ----------------- */

        .my-table {
            page-break-before: always;
            page-break-after: always;
        }
        .my-table-tr {
            page-break-inside: avoid;
        }


    </style>


</head>


{{-- <body style="margin: 50px 40px"> --}}
<body>




    <header>

        <span class="p-2">
            <img src="{{$logo}}" width="110" class="mx-auto mg-logo">
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
            <h6 class="mg-text-emcabezado text-center ">DIRECCION DE EDUCACION MEDIADA</h6>
            <h6 class="mg-text-emcabezado text-center ">POR LAS TECNOLOGIAS</h6>
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
                    {{-- <div class="">

                        <table class="table table-sm colapsado" border="2">
                            <tbody class="text-center">
                                <tr>
                                    <th scope="row" class="ancho-1de4 bg-gris">Docente diseñador(es) de la actividad:</th>
                                    <td class="ancho-3de4">{!! auth()->user()->name !!}</td>

                                </tr>
                            </tbody>

                            <tbody class="text-center">
                                <tr>
                                    <th class="bg-gris" scope="row">Asignatura</th>
                                    <td class="">


                                        @foreach ($coursesThisActivity as $course)

                                            @php

                                                $cursox = App\Models\User_course::where('id',$course->id_course)
                                                                        ->get()
                                                                        ->first();
                                            @endphp

                                            <span>{{$cursox->code.' '.$cursox->section}}/</span>

                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>

                            <tbody class="text-center">
                                <tr>
                                    <th class="bg-gris" scope="row">Facultad</th>
                                    <td class="">
                                        @foreach ($facultad as $facultadd)
                                                    <span class="ml-2 text-gray-600">{{$facultadd->name}}</span>
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
                                    <td class="">{{$activity->activity_type}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
 --}}
                    <div>
                        <table class="table table-sm colapsado" border="2">
                            <tbody class="text-center">
                                <tr>
                                    {{-- <th scope="row" class="ancho-2de4 bg-gris">Docente diseñador(es) de la actividad</th>
                                    <th scope="row" class="ancho-1de4 bg-gris">Cedula(s)</th>
                                    <th scope="row" class="ancho-2de4 bg-gris">correo Electronico</th>
                                    <th scope="row" class="ancho-1de4 bg-gris">Facultad</th> --}}

                                    <td scope="row" class="ancho-2de4 bg-gris">Docente diseñador(es) de la actividad</td>
                                    <td scope="row" class="ancho-1de4 bg-gris">Cedula(s)</td>
                                    <td scope="row" class="ancho-2de4 bg-gris">Correo Electronico</td>
                                    <td scope="row" class="ancho-1de4 bg-gris">Facultad</td>
                                    {{-- <td class="ancho-3de4">{!! auth()->user()->name !!}</td> --}}
                                </tr>
                                <tr>
                                    {{-- <th scope="row" class="ancho-1de4 bg-gris">Docente diseñador(es) de la actividad:</th> --}}
                                    <td class="ancho-2de4">{!! auth()->user()->name !!}</td>
                                    <td class="ancho-1de4">{!! auth()->user()->ced !!}</td>
                                    <td class="ancho-2de4">--</td>
                                    <td class="ancho-1de4">--</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-sm colapsado" border="2">
                            <tbody class="text-center">
                                <tr>
                                    <th scope="row" class="ancho-2de4 bg-gris">Asignatura</th>
                                    <th scope="row" class="ancho-1de4 bg-gris">Seccion</th>
                                    <th scope="row" class="ancho-2de4 bg-gris">Unidad</th>
                                    <th scope="row" class="ancho-1de4 bg-gris">Nombre de la Actividad</th>
                                    <th scope="row" class="ancho-1de4 bg-gris">Tipo de Participacion</th>
                                    {{-- <td class="ancho-3de4">{!! auth()->user()->name !!}</td> --}}
                                </tr>
                                <tr>
                                    {{-- <th scope="row" class="ancho-1de4 bg-gris">Docente diseñador(es) de la actividad:</th> --}}
                                    <td class="ancho-2de4">
                                        @foreach ($coursesThisActivity as $course)

                                            @php
                                                $cursox = App\Models\User_course::where('id',$course->id_course)
                                                                        ->get()
                                                                        ->first();
                                            @endphp

                                            <span>{{$cursox->code}}/</span>

                                        @endforeach
                                    </td>
                                    <td class="ancho-1de4">
                                        @foreach ($coursesThisActivity as $course)

                                            @php
                                                $cursox = App\Models\User_course::where('id',$course->id_course)
                                                                        ->get()
                                                                        ->first();
                                            @endphp

                                            <span>{{$cursox->section}}/</span>

                                        @endforeach
                                    </td>
                                    <td class="ancho-2de4">{{$activity->unit}}</td>
                                    <td class="ancho-1de4">{{$activity->name}}</td>
                                    <td class="ancho-1de4">{{$activity->activity_type}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                    <div class="">
                        <h5 class="text-center">Descripcion de la Actividad</h5>
                    {{-- <div class="tablet"> --}}
                        {{-- <table class="colapsado" border="1">
                            <thead class="">
                                <tr class="">
                                    <th class="p-1 text-center bg-gris">
                                        <div class="">Proposito de la actividad</div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="">
                                    <td class="">
                                        <div class="">{!! $activity->body !!}</div>
                                    </td>
                                </tr>
                            </tbody>

                        </table> --}}


                            {{-- <div class="thead-light">
                                <div>
                                    <div class="p-1 text-center table-dark">Proposito de la actividad</div>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <div class="">{!! $activity->body !!}</div>
                                </div>
                            </div> --}}



                            {{-- --------NORMAL--------- --}}
                            {{-- <div class="thead-light">
                                <div>
                                    <div class="p-1 text-center bg-gris">Proposito de la actividad</div>
                                </div>
                            </div>

                            <div class="">
                                <div>
                                    <div class="">{!! $activity->body !!}</div>
                                </div>
                            </div> --}}
                            {{-- ----------------------- --}}



                            {{-- <div class="heading">
                                <div class="cell p-1 text-center bg-gris">
                                    <div class="">Proposito de la actividad</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="cell">
                                    <div class="">{!! $activity->body !!}</div>
                                </div>
                            </div> --}}

                            <div class="">

                                <div>
                                    <div>
                                        <h5 class="p-1 text-center bg-gris">Proposito</h5>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="">
                                        <div>{!! $activity->body !!}</div>
                                    </div>
                                </div>

                            </div>


                    </div>





                    {{-- <div class="page-break"></div> --}}



                    {{-- <div class="page-break-inside">

                        <table class="colapsado" border="1" width="100%">


                            <tbody>
                                <tr>
                                    <th scope="row" class="ancho-1de4 p-1 text-center bg-gris">Lapso de entrega</th>
                                    <td class="ancho-3de4 text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!!$lapse_in!!} al {!!$lapse_out!!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}


                    <div class="page-break-inside">

                            <div>
                                <div>
                                    <h5 class="p-1 text-center bg-gris">Competencias</h5>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <div class="">{!!$activity->extract!!}</div>
                                </div>
                            </div>


                    </div>







                    <div class="page-break-inside">

                        {{-- <table class="colapsado" border="1" >
                            <thead>
                                <tr>
                                    <th class="p-1 text-center bg-gris">Puntuacion en la actividad</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="" >{!!$activity->extract01!!}</td>
                                </tr>
                            </tbody>
                        </table> --}}


                            <div>
                                <div>
                                    <h5 class="p-1 text-center bg-gris">Criterios de Evaluacion</h5>
                                </div>
                            </div>

                            <div>
                                    <TABLE class="table table-sm colapsado" border="">
                                        <tbody class="text-center">
                                            <TR>
                                                <TH class="ancho-3de4">Criterio</TH>
                                                <TH class="ancho-1de4">Puntuacion</TH>
                                            </TR>
                                            @foreach ($criteries as $critery)
                                                <TR>
                                                    <TD class="ancho-3de4">{{$critery->critery}}</TD>
                                                    <TD class="ancho-1de4">{{$critery->evaluation}}</TD>
                                                </TR>
                                            @endforeach
                                        </tbody>
                                    </TABLE>
                            </div>
                    </div>

                    <div class="page-break-inside">
                            <div>
                                <div>
                                    <h5 class="p-1 text-center bg-gris">Estrategia(s) de Evaluacion</h5>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <div class="" >{!!$activity->extract01!!}</div>
                                </div>
                            </div>
                    </div>

                    <div class="page-break-inside">
                        <div>
                            <div>
                                <h5 class="p-1 text-center bg-gris">Tecnica(s) de Evaluacion</h5>
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class="" >{!!$activity->extract02!!}</div>
                            </div>
                        </div>
                    </div>

                    <div class="page-break-inside">
                        <div>
                            <div>
                                <h5 class="p-1 text-center bg-gris">Herramienta(s) Digitales educativas</h5>
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class="" >{!!$activity->extract03!!}</div>
                            </div>
                        </div>
                    </div>

                    <div class="page-break-inside">
                        <div>
                            <div>
                                <h5 class="p-1 text-center bg-gris">Recursos Digitales Educativos</h5>
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class="" >{!!$activity->extract04!!}</div>
                            </div>
                        </div>
                    </div>

                    <div class="page-break-inside">
                        <div>
                            <div>
                                <h5 class="p-1 text-center bg-gris">Referencias bilbiograficas</h5>
                            </div>
                        </div>

                        <div>
                            <div>
                                <TABLE class="table table-sm colapsado" border="">
                                    <tbody class="text-center">
                                        <TR>
                                            <TH class="ancho-3de4">Titulo</TH>
                                            <TH class="ancho-2de4">Autor</TH>
                                            <TH class="ancho-1de4">Año</TH>
                                        </TR>
                                        @foreach ($references as $reference)
                                            <TR>
                                                <TD class="ancho-3de4">{{$reference->title}}</TD>
                                                <TD class="ancho-2de4">{{$reference->autor}}</TD>
                                                <TD class="ancho-1de4">{{$reference->year}}</TD>
                                            </TR>
                                        @endforeach
                                    </tbody>
                                </TABLE>
                            </div>
                        </div>
                    </div>

                    <div class="page-break-inside">
                        <div>
                            <div>
                                <h5 class="p-1 text-center bg-gris">Instrucciones</h5>
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class="" >{!!$activity->instruction!!}</div>
                            </div>
                        </div>
                    </div>



                    <div class="page-break-inside">
                        <table class="colapsado" border="1" width="100%">
                            <tbody>
                                <tr>
                                    <th scope="row" class="ancho-1de4 p-1 text-center bg-gris">Lapso de entrega</th>
                                    <td class="ancho-3de4 text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!!$lapse_in!!} al {!!$lapse_out!!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="page-break-inside" >
                        <table class="colapsado" border="1" width="100%">
                            <tbody>
                                <tr>
                                    <th class="p-1 text-center bg-gris" >Tipo de evaluacion</th>
                                    <td class="ancho-3de4 text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! $evaluacion->first()->name !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="page-break-inside" >
                        <table class="colapsado" border="1" width="100%">
                            <tbody>
                                <tr>
                                    <th class="p-1 text-center bg-gris" >Ponderacion</th>
                                    <td class="ancho-3de4 text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!!$activity->evaluation!!}</td>
                                </tr>
                            </tbody>
                        </table>
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
