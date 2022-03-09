<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o el email del usuario">
        </div>

        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Email</th>
                            <th>Rol</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                {{-- <td>{{$user->name}}</td> --}}
                                {{-- <td><a href="{{route('profile.show', $user)}}">
                                    {{$user->name}}
                                </a></td> --}}
                                <td><a href="{{route('admin.users.show', $user)}}">
                                    {{$user->name}}
                                </a></td>
                                <td>{{$user->ced}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $rolName )
                                        <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                        @endforeach
                                    @endif
                                </td>
                                <td width="10px">
                                    <a href="{{route('admin.users.edit', $user)}}" class="btn btn-primary  btn-sm">Editar</a>
                                </td>
                                <td class="10px">
                                    <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$users->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif

    </div>
</div>
