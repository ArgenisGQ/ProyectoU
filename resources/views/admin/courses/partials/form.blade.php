<div class="form-group">
    {!! Form::label('name', 'Materia:') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la materia']) !!}

    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Ingrese el slug de la materia','readonly']) !!}

    @error('slug')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <label for="">Color</label>

    {{-- <select name="color" id="" class="form-control">
        <option value="red">Color Rojo</option>
        <option value="green">Color Verde</option>
        <option value="blue" selected>Color Azul</option>
    </select> --}}

    {!! Form::label('color', "Color:") !!}
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}
</div>
