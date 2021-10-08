<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de la actividad">
    </div>

    @if ($posts->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre de la Actividad</th>
                    <th colspan="2"></th>
                </thead>

                <Tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            {{-- <td>{{$post->name}}</td> --}}
                            <td><a href="{{route('posts.show', $post)}}">
                                {{$post->name}}
                            </a></td>
                            <td with="10px">
                                <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td with="10px">
                                <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
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
            {{$posts->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningun registro...</strong>
        </div>
    @endif

</div>
