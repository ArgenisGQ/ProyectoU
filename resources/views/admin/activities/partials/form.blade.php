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
    {!! Form::label('faculty_id', 'Facultad') !!}
    {!! Form::select('faculty_id', $faculties,null,['class' => 'form-control']) !!}

    @error('faculty_id')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>


{{-- <div class="form-group">
    {!! Form::label('faculty_id', 'Materias') !!}
    {!! Form::select('faculty_id', $coursesForUser->code,null,['class' => 'form-control']) !!}

    @error('faculty_id')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div> --}}

{{-- <div class="form-group">
    {!! Form::label('faculty_id', 'Materias') !!}
    {!! Form::select('animal',[
    'Cats' => ['leopard' => 'Leopard'],
    'Dogs' => ['spaniel' => 'Spaniel'],
    ]); !!}

    @error('faculty_id')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div> --}}


<div class="form-group">
    <p class="font-weight-bold">Materias</p>



    @foreach ( $courses as $curso )

        @php
            $cursox = App\Models\User_course::where('code',$curso->code)->get();
        @endphp

        <dt>{{ $curso->code.' '.$curso->course }} </dt>

                @foreach ($cursox as $cursoy )
                    <dl>
                        <dd>
                            <div>
                                <label>
                                    {!! Form::checkbox('courses[]', $cursoy->id, null, ['class' => 'mr-1']) !!}
                                    {{ $cursoy->section }}
                                </label>
                            </div>
                        </dd>
                    </dl>
                @endforeach

    @endforeach




    {{-- @foreach ($coursesForUser as $courseForUser) --}}

        {{-- <dl>
            <dt>{{$courseForUser->course}}</dt>
            <dt>{{App\Models\User_course::find($courseForUser->code)->name}}</dt>
            <dd>{!! Form::checkbox('courseForUser[]', $courseForUser->id, null) !!}
                {{$courseForUser->code.' '.$courseForUser->section}}</dd>
        </dl> --}}

        {{-- <dl>
            <dt>{{$courseForUser->course}}</dt>
            <dd>{!! Form::checkbox('courseForUser[]', $courseForUser->id, null) !!}
                {{$courseForUser->code.' '.$courseForUser->section.' '.$courseForUser->course}}</dd>
        </dl> --}}

        {{-- <label class="mr-2">
            {!! Form::checkbox('courseForUser[]', $courseForUser->id, null) !!}
            {{$courseForUser->code.' '.$courseForUser->section.' '.$courseForUser->course}}
        </label> --}}

    {{-- @endforeach --}}

    {{-- @php
        $courses = $cursos;
    @endphp --}}


    {{-- @error('courses')
        <br>
        <span class="text-danger">{{$message}}</span>
    @enderror --}}

    @error('courses')
        <br>
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{-- <div class="form-group">
    <p class="font-weight-bold">Materias</p>

    @foreach ($courses as $course)

        <label class="mr-2">
            {!! Form::checkbox('courses[]', $course->id, null) !!}
            {{$course->name}}
        </label>

    @endforeach



    @error('courses')
        <br>
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
 --}}
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
{{-- <div class="mb-3 row">
    <div class="col">
        <div class="image-wrapper">
            @isset($activity->image)
                <img id="picture" src="{{Storage::url($activity->image->url)}}" >
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
</div> --}}
{{-- -------------------------------------------- --}}

<div class="form-group">
    {!! Form::label('activity_type', 'Tipo de Actividad:') !!}
    {{-- {!! Form::textarea('activity_type', null, ['class' => 'form-control']) !!} --}}
    {!! Form::text('activity_type', null, ['class'=>'form-control','placeholder'=>'Indique de manera especifica como realizar la actividad']) !!}

    @error('activity_type')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Proposito de la actividad:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

    @error('body')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('lapse', 'Lapso de entrega:') !!}

    {{-- ---pasar campo en formato de fecha para la validacion--- --}}
    {{-- @php
        $academic_start = $activity->academic_start;
        $academic_finish =  $activity->academic_finish;
    @endphp --}}


    {!! Form::hidden('academic_start', $academic_start) !!}
    {!! Form::hidden('academic_finish',$academic_finish) !!}


</div>

{{-- <div class="form-group">

    <table class="w-full my-4 border border-separate border-gray-800 table-auto">
        <thead>
            <tr>
                <th class="p-1 ">INICIO DE TRIMESTRE</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="">{!! $academic_start !!}</td>
            </tr>
        </tbody>
    </table>

    <table class="w-full my-4 border border-separate border-gray-800 table-auto">
        <thead>
            <tr>
                <th class="p-1 ">FIN DE TRIMESTRE</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="">{!! $academic_finish !!}</td>
            </tr>
        </tbody>
    </table>

</div> --}}

    {{-- --------------------------------------------------------- --}}

<div class="form-group">

    {!! Form::label('lapse', 'Fecha de apertura:') !!}


    {{-- {!! Form::textarea('lapse', null, ['class' => 'form-control']) !!} --}}

    {{-- {{Form::date ('lapse_in', $activity->lapse_in )}} --}}
    {{Form::date ('lapse_in', $activity->lapse_in )}}

    @error('lapse_in')
        <span class="text-danger">{{$message}}</span>
    @enderror


    {{-- ---- --}}
    {!! Form::label('lapse', 'Fecha de cierre:') !!}

    {{-- {{Form::date ('lapse_out', $activity->lapse_out )}} --}}
    {{Form::date ('lapse_out', $activity->lapse_out )}}

    @error('lapse_out')
        <span class="text-danger">{{$message}}</span>
    @enderror
    {{-- ---- --}}
</div>



<div class="form-group">
    {!! Form::label('extract', 'Logros de la actividad:') !!}

    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

    @error('extract')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>


{{-- <div class="form-group">
    <p class="font-weight-bold">Tipo de evaluacion:</p>

    <label>
        {!! Form::radio('type', 1, true) !!}
        Individual
    </label>

    <label>
        {!! Form::radio('type', 2) !!}
        Grupal
    </label>



    @error('type')
        <br>
        <span class="text-danger">{{$message}}</span>
    @enderror
</div> --}}

<div class="form-group">
    {!! Form::label('tupe', 'Tipo de evaluacion') !!}
    {!! Form::select('type', $evaluations,null,['class' => 'form-control']) !!}

    @error('type')
        <br>
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('extract01', 'Criterios de evaluación:') !!}
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
