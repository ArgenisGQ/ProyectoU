<div class="form-group">
    {!! Form::label('name', 'Materia:') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la materia']) !!}

    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('code', 'Codigo:') !!}
    {!! Form::text('code', null, ['class'=>'form-control','placeholder'=>'Ingrese el codigo de la materia']) !!}

    @error('code')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('section', 'Seccion:') !!}
    {!! Form::text('section', null, ['class'=>'form-control','placeholder'=>'Ingrese la seccion de la materia']) !!}

    @error('section')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('id_sima', 'Id_sima:') !!}
    {!! Form::text('id_sima', null, ['class'=>'form-control','placeholder'=>'Ingrese el id_sima']) !!}

    @error('id_sima')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('id_continua', 'Id_continua:') !!}
    {!! Form::text('id_continua', null, ['class'=>'form-control','placeholder'=>'Ingrese el id_continua']) !!}

    @error('id_continua')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('id_sima_doc', 'Id_sima_doc:') !!}
    {!! Form::text('id_sima_doc', null, ['class'=>'form-control','placeholder'=>'Ingrese el id_sima_doc']) !!}

    @error('id_sima_doc')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('id_continua_doc', 'Id_continua_doc:') !!}
    {!! Form::text('id_continua_doc', null, ['class'=>'form-control','placeholder'=>'Ingrese el id_continua_doc']) !!}

    @error('id_continua_doc')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('id_dpto', 'Id_dpto:') !!}
    {!! Form::text('id_dpto', null, ['class'=>'form-control','placeholder'=>'Ingrese el id_dpto']) !!}

    @error('id_dpto')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('id_faculty', 'Id_facultad:') !!}
    {!! Form::text('id_faculty', null, ['class'=>'form-control','placeholder'=>'Ingrese el id_facultad']) !!}

    @error('id_faculty')
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

{{-- <div class="form-group">
    <label for="">Color</label>
    {!! Form::label('color', "Color:") !!}
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}
</div> --}}

 {{-- <select name="color" id="" class="form-control">
        <option value="red">Color Rojo</option>
        <option value="green">Color Verde</option>
        <option value="blue" selected>Color Azul</option>
    </select> --}}
