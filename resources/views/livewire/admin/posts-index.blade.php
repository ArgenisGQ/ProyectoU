<div class="card">
    <div class="card-body">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th colspan="2"></th>
        </thead>

        <Tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
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
    </div>
</div>
