<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>

    <style type="text/css">
        {{$css_data}}
        <style>
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
        }

        /* Añado la declaración de font-family, para usar la fuente de Google Fonts en este PDF */

        body {
            font-family: 'Roboto', serif;
            color: 303030;
        }
    </style>




    <style>
        @page {
            /* margin-left: 0cm;
            margin-right: 0cm; */
            margin: 0cm 0cm;
        }
        body {
            margin-top: 4cm;
            margin-left: 1.5cm;
            margin-right: 1.5cm;
            margin-bottom: 1cm;
        }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /* background-color: #ffffffdc; */
            /* color: gray; */
            /* text-align: left; */
            /* line-height: 0.5cm; */
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1.5cm;

            /* background-color: #ffffffdc; */
            color: gray;
            text-align: center;
            line-height: 1.5;
        }
        .page-break {
            page-break-after: always;
            /* page-break-before: auto; */
        }

        .page-break-no {
            /* page-break-after: always; */
            page-break-before: always;
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




    <header>

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

    </header>

    <main class="p-1">

       {{--  <div id="watermark">
            <img src="{{$logo}}" width="274" height="375" >
        </div> --}}


        <div class="">
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

                    <table class="age-break-no">
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
                    {{-- <div class="page-break"></div> --}}
                    <table class="page-break-no">
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
