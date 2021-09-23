<x-app-layout>
    <div class="container py-8">
        <a href="{{route('posts.pdf.down',$post)}}" class="float-right btn btn-secondary btn-sm">PDF-down</a>
        <br>
        <a href="{{route('posts.pdf.show',$post)}}" class="float-right btn btn-secondary btn-sm">PDF-show</a>
        <hr>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <table class="w-full my-4 border border-separate border-gray-800 table-auto">
                    {{-- <thead>
                        <tr>
                            <th class="p-3">nombre</th>
                            <th class="p-3">email</th>
                            <th class="p-3">otro</th>
                        </tr>
                    </thead> --}}
                    <tbody class="text-center">
                        <tr>
                            <td class="w-1/4 h-12 bg-gray-300">Docente</td>
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
                    <hr>
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
                    <hr>
                    <tbody class="text-center">
                        <tr>
                            <td class="w-1/4 h-12 bg-gray-300">Actividad</td>
                            <td class="w-3/4 h-12 bg-gray-100">{{$post->name}}</td>
                        </tr>
                    </tbody>
                    <hr>
                    <tbody class="text-center">
                        <tr>
                            <td class="w-1/4 h-12 bg-gray-300">Tipo de Actividad</td>
                            <td class="w-3/4 h-12 bg-gray-100">seleccion</td>
                        </tr>
                    </tbody>
                </table>

                <table class="w-full my-4 border border-separate border-gray-800 table-auto">
                    <thead>
                        <tr>
                            <th class="p-1">Descripcion de la actividad</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            {{-- <td class="w-3/4 h-12 bg-gray-100">{!! $post->body !!}</td> --}}
                            <td class="w-3/4 h-12 bg-gray-100"" align = "justify">{!! $post->body !!}</td>
                        </tr>
                    </tbody>

                </table>
                <table class="w-full my-4 border border-separate border-gray-800 table-auto">
                    <thead>
                        <tr>
                            <th class="p-1">Proposito de la actividad</th>
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
                            <th class="p-1">Aprendido en la actividad</th>
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

</x-app-layout>

