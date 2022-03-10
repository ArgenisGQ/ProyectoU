<div class="card">
    {{-- Nothing in the world is as soft and yielding as water. --}}


    {{-- <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de la materia">
    </div> --}}



    @if ($courses->count())
                <div class="card-body">
                    <table class="table table-triped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>Materia</th>
                                <th>id_sima</th>
                                <th>id_continua</th>
                                <th>id_sima_doc</th>
                                <th>id_continua_doc</th>
                                <th>id_dpto</th>
                                <th>id_facultad</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{$course->id}}</td>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->code}}</td>
                                    <td>{{$course->section}}</td>
                                    <td>{{$course->id_sima}}</td>
                                    <td>{{$course->id_continua}}</td>
                                    <td>{{$course->id_sima_doc}}</td>
                                    <td>{{$course->id_continua_doc}}</td>
                                    <td>{{$course->id_dpto}}</td>
                                    <td>{{$course->id_faculty}}</td>
                                    <td width="10px">
                                        @can('admin.courses.edit')
                                            <a href="{{route('admin.courses.edit', $course)}}" class="btn btn-primary btn-sm">Editar</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('admin.courses.destroy')
                                            <form action="{{route('admin.courses.destroy', $course)}}" method="POST">
                                                @csrf
                                                @method('delete')

                                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{$courses->links()}}
                </div>
    @else
                <div class="card-body">
                    <strong>No hay ningun registro...</strong>
                </div>
    @endif




</div>
