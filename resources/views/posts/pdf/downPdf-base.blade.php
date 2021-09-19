<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>

    <style type="text/css">
        {{$css_data}}
    </style>

    <style>
        @page {
            /* margin-left: 0cm;
            margin-right: 0cm; */
            margin: 0cm 0cm;
        }
        body {
            margin-top: 3cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /* background-color: #ffffffdc; */
            color: gray;
            /* text-align: left; */
            line-height: 0.5cm;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /* background-color: #ffffffdc; */
            color: gray;
            text-align: center;
            line-height: 1.5;
        }
        .page-break {
            page-break-after: always;
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
    </style>


</head>


{{-- <body style="margin: 50px 40px"> --}}
<body>




    <header class="p-2">

        {{-- <img src="{{$logo}}" width="77" height="104" class="mx-auto">
        <p class="text-right small"> FOO-VRA140-202321-104 </p>
        <h6 class="text-center ">UNIVERSIDAD YACAMBU</h6>
        <h6 class="text-center ">VICERRECTORADO ACADEMICO</h6>
        <h6 class="text-center ">DIRECCION DE ESTUDIOS A DISTANCIA</h6> --}}


       {{--  <div class="container">

            <div class="row ">
                <table>
                    <tbody class="">
                        <tr>
                            <td width="100"  rowspan="">
                                <img src="{{$logo}}" width="77" height="104" class="mx-auto">
                            </td>

                            <td width="100"  rowspan="">
                                <h6 class="text-left ">UNIVERSIDAD YACAMBU</h6>
                                <h6 class="text-left ">VICERRECTORADO ACADEMICO</h6>
                                <h6 class="text-left ">DIRECCION DE ESTUDIOS A DISTANCIA</h6>

                            </td>
                            <td width="100">
                                <p class="text-right small"> </p>
                            </td>
                            <td width="100">
                                <p class="text-right small"> FOO-VRA140-202321-104 </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
 --}}

        <div>
            <img src="{{$logo}}" width="77" height="104" class="mx-auto">
        </div>
        <div>
            <p class="text-right small"> FOO-VRA140-202321-104 </p>
        </div>
        <div>
            <h6 class="text-center ">UNIVERSIDAD YACAMBU</h6>
            <h6 class="text-center ">VICERRECTORADO ACADEMICO</h6>
            <h6 class="text-center ">DIRECCION DE ESTUDIOS A DISTANCIA</h6>
        </div>



    </header>

    <main class="p-2">

       {{--  <div id="watermark">
            <img src="{{$logo}}" width="274" height="375" >
        </div> --}}


        <div class="container">
            <p class="text-center"></p>
            <h3 class="text-center">Redaccion de Actividades de Aprendizaje</h3>
            <div class="row">
                <div class="">
                    <table class="table table-hover">
                        <tbody class="text-center">
                            <tr>
                                <th scope="row">Docente - PDF - down</th>
                                <td >{!! auth()->user()->name !!}</td>
                            </tr>
                        </tbody>
                        <br>
                        <tbody class="text-center">
                            <tr>
                                <th scope="row">Asignatura</th>
                                <td class="">
                                    @foreach ($post->tags as $tag)

                                            <a href="{{route('posts.tag', $tag)}}">
                                                <span class="">{{$tag->name}}</span>
                                            </a>

                                    @endforeach
                                </td>
                            </tr>
                        </tbody>

                        <tbody class="text-center">
                            <tr>
                                <th scope="row">Facultad</th>
                                <td class="">
                                    @foreach ($categoria as $categoriaa)

                                            <a href="{{route('posts.category', $categoriaa)}}">
                                                <span class="ml-2 text-gray-600">{{$categoriaa->name}}</span>
                                            </a>

                                    @endforeach
                                </td>
                            </tr>
                        </tbody class="text-center">

                        <tbody class="text-center">
                            <tr>
                                <th scope="row">Actividad</th>
                                <td class="">{{$post->name}}</td>
                            </tr>
                        </tbody>

                        <tbody class="text-center">
                            <tr>
                                <th scope="row">Tipo de Actividad</th>
                                <td class="">- - - seleccion - - -</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="">
                        <thead class="thead-light">
                            <tr>
                                <th class="p-1 text-center table-dark">Descripcion de la actividad</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="" align = "justify">{!! $post->body !!}</td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="page-break"></div>
                    <table class="">
                        <thead>
                            <tr>
                                <th class="p-1 text-center" >Proposito de la actividad</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="" align = "justify">{!!$post->extract!!}</td>
                            </tr>
                        </tbody>

                    </table>
                    <table class="">
                        <thead>
                            <tr>
                                <th class="p-1 text-center">Aprendido en la actividad</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="" align = "justify">{!!$post->extract01!!}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

    {{-- ------------------------------------------------------------------------------ --}}
        </div>
    </main>

    <footer>
        UNY.EDU.VE
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
