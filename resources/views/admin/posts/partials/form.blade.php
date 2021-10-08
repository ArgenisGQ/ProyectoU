<div class="form-group">
    {!! Form::label('name', 'Nombre de Actividad') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la actividad']) !!}

    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Slug de la Actividad','readonly']) !!}

    @error('slug')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Facultad') !!}
    {!! Form::select('category_id', $categories,null,['class' => 'form-control']) !!}

    @error('category_id')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Materias</p>

    @foreach ($tags as $tag)

        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>

    @endforeach



    @error('tags')
        <br>
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>

    <label>
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>

    <label>
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>



    @error('status')
        <br>
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{-- IMAGEN A SUBIR EL POST --}}
<div class="mb-3 row">
    <div class="col">
        <div class="image-wrapper">
            @isset($post->image)
                <img id="picture" src="{{Storage::url($post->image->url)}}" >
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2015/09/02/12/28/pencil-918449_960_720.jpg" >
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

        @error('file')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>


        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloribus enim qui veniam nostrum fugit animi, odit aut numquam alias eaque adipisci, non necessitatibus optio esse obcaecati et iusto tempore tenetur.</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('body', 'Descripción de la actividad:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

    @error('body')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('extract', 'Proposito de la actividad:') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

    @error('extract')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('extract01', 'Criterios de evalulación:') !!}
    {!! Form::textarea('extract01', null, ['class' => 'form-control']) !!}

    @error('extract01')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>



{{-- <div class="form-group">
    <div>
        {!! Form::label('body', 'Cuerpo del post 01:') !!}
        {!! Form::textarea('body', null, ['class' => 'text-editor']) !!}
    </div>

    <div id="counter">0 characters</div>

    @error('body')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div> --}}

{{-- <div class="form-group">
    <div class="text-editor">
        <p>Input box 1</p>
        <input name="body" type="hidden">
    <div id="body"></div>
        <div id="counter">0 characters</div>

    @error('body')
        <span class="text-danger">{{$message}}</span>
    @enderror


</div> --}}

{{-- <form>
    <div class="text-editor">
        <p>Input box 1</p>
        <input name="box" type="hidden">
    <div id="editor-container"></div>
        <div id="counter">0 characters</div>
    <div class="btn01">
                <button class="btn-primary01" type="submit">Save</button>
    </div>
</form> --}}
