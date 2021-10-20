<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del Usuario']) !!}

    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('ced', 'Cedula') !!}
    {!! Form::text('ced', null, ['class'=>'form-control','placeholder'=>'Ingrese el numero de cedula del Usuario']) !!}

    @error('ced')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'Ingrese el email del Usuario']) !!}

    @error('email')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::text('password', null, ['class'=>'form-control','placeholder'=>'Ingrese el password']) !!}

    @error('password')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>



<div class="form-group">
    {!! Form::label('confirm-passwordd', 'Password') !!}
    {!! Form::text('confirm-password', null, ['class'=>'form-control','placeholder'=>'Ingrese password para confirmar']) !!}

    @error('confirm-password')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

{{-- <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="">Rol</label>
            {!! Form::select('roles[]', $role,[],['class' => 'form-control']) !!}
        </div>
    </div>
</div> --}}


<h2 class="h5">Listado de Roles</h2>

    @foreach ($roles as $role)
        <div>
            <label>
                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                {{$role->name}}
            </label>
        </div>
    @endforeach

