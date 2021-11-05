<x-app-layout>
    <div class="container mx-auto">
        <a href="{{route('activities.pdf.down',$activity)}}" class="float-right btn btn-secondary btn-sm">PDF-down</a>
        <br>
        <a href="{{route('activities.pdf.show',$activity)}}" class="float-right btn btn-secondary btn-sm">PDF-show</a>
        <hr>
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg"> --}}

                {{-- <div class=""> --}}
                    <table class="w-full my-4 border border-separate border-gray-800 table-auto">
                        <tbody class="text-center">
                            <tr>
                                <td class="w-1/4 h-8 bg-gray-300">Docente</td>
                                <td class="w-3/4 h-8 bg-gray-100">{!! auth()->user()->name !!}</td>
                            </tr>
                        </tbody>
                        <br>
                        <tbody class="text-center">
                            <tr>
                                <td class="w-1/4 h-8 bg-gray-300">Asignatura</td>
                                <td class="w-3/4 h-8 bg-gray-100">
                                    @foreach ($activity->courses as $course)

                                            <a href="{{route('activities.course', $course)}}">
                                                <span class="ml-2 text-gray-600">{{$course->name}}</span>
                                            </a>

                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                        <hr>
                        <tbody class="text-center">
                            <tr>
                                <td class="w-1/4 h-8 bg-gray-300">Facultad</td>
                                <td class="w-3/4 h-8 bg-gray-100">
                                    @foreach ($facultad as $faculty)

                                            <a href="{{route('posts.category', $faculty)}}">
                                                <span class="ml-2 text-gray-600">{{$faculty->name}}</span>
                                            </a>

                                    @endforeach
                                </td>
                            </tr>
                        </tbody class="text-center">
                        <hr>
                        <tbody class="text-center">
                            <tr>
                                <td class="w-1/4 h-8 bg-gray-300">Actividad</td>
                                <td class="w-3/4 h-8 bg-gray-100">{{$activity->name}}</td>
                            </tr>
                        </tbody>
                        <hr>
                        <tbody class="text-center">
                            <tr>
                                <td class="w-1/4 h-8 bg-gray-300">Tipo de Actividad</td>
                                <td class="w-3/4 h-8 bg-gray-100">seleccion</td>
                            </tr>
                        </tbody>
                    </table>
                {{-- </div> --}}

                {{-- <div class=""> --}}
                    <table class="w-full my-4 border border-separate border-gray-800 table-auto">
                        <thead>
                            <tr>
                                <th class="p-1 ">Descripcion de la actividad</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                {{-- <td class="w-3/4 h-12 bg-gray-100">{!! $post->body !!}</td> --}}
                                <td class="">{!! $activity->body !!}</td>
                                {{-- <td class="">{{ html_entity_decode($post->body) }}</td> --}}
                                {{-- <td class="">{!! html_entity_decode($post->body) !!}</td> --}}
                            </tr>
                        </tbody>
                    </table>
                {{-- </div> --}}

                {{-- <div class=""> --}}
                    <table class="w-full my-4 border border-separate border-gray-800 table-auto ">
                        <thead>
                            <tr>
                                <th class="p-1">Proposito de la actividad</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="">{!! $activity->extract!!}</td>
                            </tr>
                        </tbody>
                    </table>
                {{-- </div> --}}

                {{-- <div class=""> --}}
                    <table class="w-full my-4 border border-separate border-gray-800 table-auto ">
                        <thead>
                            <tr>
                                <th class="p-1">Aprendido en la actividad</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="">{!!$activity->extract01!!}</td>
                            </tr>
                        </tbody>
                    </table>
                {{-- </div> --}}

            {{-- </div> --}}
        </div>
    </div>

{{-- ------------------------------------------------------------------------------ --}}

</x-app-layout>

