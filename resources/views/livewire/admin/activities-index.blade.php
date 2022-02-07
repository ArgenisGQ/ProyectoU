<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de la actividad">
    </div>

    @if ($activities->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre de la Actividad</th>
                    <th colspan="2"></th>
                </thead>

                <Tbody>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{$activity->id}}</td>
                            {{-- <td>{{$post->name}}</td> --}}
                            <td><a href="{{route('activities.show', $activity)}}">
                                {{$activity->name}}
                            </a></td>
                            <td with="10px">
                                <a href="{{route('admin.activities.edit', $activity)}}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td with="10px">
                                <form action="{{route('admin.activities.destroy', $activity)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </Tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$activities->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningun registro...</strong>
        </div>
    @endif

</div>
