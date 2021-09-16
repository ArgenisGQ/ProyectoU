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
            margin-left: 0.5cm;
            margin-right: 0;
        }
        .page-break {
            page-break-after: always;
        }
    </style>


</head>
<body style="margin: 50px 40px">

    

    <div class="container">
        <h2 class="text-center table-dark">Redaccion de Actividades de Aprendizaje</h2>
        <div class="">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <table class="table w-full my-4 border border-separate border-gray-800 table-auto table-hover">
                    <tbody class="text-center">
                        <tr>
                            <td class="w-1/4 h-12 bg-gray-300">Docente - PDF - down</td>
                            <td class="w-3/4 h-12 bg-gray-100">{!! auth()->user()->name !!}</td>
                        </tr>
                    </tbody>
                    <br>
                    <tbody class="text-center">
                        <tr>
                            <td class="w-1/4 h-12 bg-gray-300">Asignatura</td>
                            <td class="w-3/4 h-12 bg-gray-100">
                                @foreach ($post->tags as $tag)

                                        <a href="{{route('posts.tag', $tag)}}">
                                            <span class="ml-2 text-gray-600">{{$tag->name}}</span>
                                        </a>

                                @endforeach
                            </td>
                        </tr>
                    </tbody>

                    <tbody class="text-center">
                        <tr>
                            <td class="w-1/4 h-12 bg-gray-300">Facultad</td>
                            <td class="w-3/4 h-12 bg-gray-100">
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
                            <td class="w-1/4 h-12 bg-gray-300">Actividad</td>
                            <td class="w-3/4 h-12 bg-gray-100">{{$post->name}}</td>
                        </tr>
                    </tbody>

                    <tbody class="text-center">
                        <tr>
                            <td class="w-1/4 h-12 bg-gray-300">Tipo de Actividad</td>
                            <td class="w-3/4 h-12 bg-gray-100">- - - seleccion - - -</td>
                        </tr>
                    </tbody>
                </table>

                <table class="w-full my-4 border border-separate border-gray-800 table-auto">
                    <thead class="thead-light">
                        <tr>
                            <th class="p-1 text-center table-dark">Descripcion de la actividad</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="w-3/4 h-12 bg-gray-100">{!! $post->body !!}</td>
                        </tr>
                    </tbody>

                </table>
                <table class="w-full my-4 border border-separate border-gray-800 table-auto">
                    <thead>
                        <tr>
                            <th class="p-1 text-center">Proposito de la actividad</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="w-3/4 h-12 bg-gray-100">{!!$post->extract!!}</td>
                        </tr>
                    </tbody>

                </table>
                <table class="w-full my-4 border border-separate border-gray-800 table-auto">
                    <thead>
                        <tr>
                            <th class="p-1 text-center">Aprendido en la actividad</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="w-3/4 h-12 bg-gray-100">{!!$post->extract01!!}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>

{{-- ------------------------------------------------------------------------------ --}}

    </div>

</body>

<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(270, 730, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    }
</script>
</html>
