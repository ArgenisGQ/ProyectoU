<div class="form-group">
    {!! Form::label('name', 'Nombre del Rol') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del Rol']) !!}

    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<h2 class="h3">Lista de permisos</h2>
    @foreach ( $categories as $category )

        @php
            /* use Spatie\Permission\Models\Permission; */
            $permisos = Spatie\Permission\Models\Permission::where('group_id', $category->id)->get('name');

            /* $descripcion = $permisos->description; */

        @endphp

        <div> {{$category->name}}</div>
        {{-- <div> {{$category->id}}</div> --}}
        {{-- {{$category->id }} --}}
        {{$permisos}}
        {{-- {{App\Models\Category::find($post->category_id)->name}}
 --}}








            {{-- @foreach ($permissions as $permission)
                    <div>
                        <label>
                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            {{$permission->description}}
                        </label>
                    </div>
            @endforeach --}}

    @endforeach

        {{-- @foreach ($permissions as $permission)
            <div>

                <label>
                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                    {{$permission->description}}
                </label>
            </div>
        @endforeach --}}
