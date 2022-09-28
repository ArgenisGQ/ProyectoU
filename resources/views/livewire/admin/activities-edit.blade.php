<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <form wire:submit.prevent="updateb">

        {{-- STEP 1 --}}

        @if ($currentStep == 1)

        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 1/4 - Seleccionar Materias</div>
                <div class="card-body">

                    {{-- @php
                        dd($activity);
                    @endphp --}}

                    <div class="d-flex flex-column align-items-left mt-2">
                        {{-- {{$id_activity}} --}}

                        {{-- @foreach ( $coursesForUser as $curso ) --}}
                        @foreach ( $courses as $curso )
                            @php
                                    /* $cursox = App\Models\User_course::where('ced',$userActiveCed)
                                                                    ->where('code',$curso['code'])
                                                                    ->get(); */

                                    $cursox = App\Models\User_course::where('name',$userActiveName)
                                                                    ->where('code',$curso['code'])
                                                                    ->get();

                            @endphp
                            <h4> {{ $curso['code'].' '.$curso['course'] }} </h4>
                            <div class="content-start">
                                @foreach ($cursox as $cursoy )

                                        <label for="{{ $cursoy['id'] }}">
                                        {{ $cursoy['id'].' '.$cursoy['section'] }}
                                        {{-- <input type="checkbox" id="{{ $cursoy['id']}}" value="{{ $cursoy['id'] }}"  wire:model="activity.courses"  > --}}
                                        <input type="checkbox" id="{{ $cursoy['id']}}" value="{{ $cursoy['id'] }}"  wire:model="cour.{{ $cursoy['id'] }}"  >
                                        </label>
                                @endforeach
                            </div>
                        @endforeach

                        {{-- <p>---------------------------------------------------------------</p>

                        @foreach ( $activity->courses as $key=>$curso )

                            <h4> {{ $curso->id_course }} </h4>
                            <div class="content-start">
                                <p>{{$key}}</p>
                                <label for="{{$curso->course->id }}">
                                    {{ $curso->course->code.' '.$curso->course->course.' '.$curso->course->section.' '.$curso->course->id }}
                                    <input type="checkbox" id="{{ $curso->course->id}}" value="{{ $curso->course->id }}"  wire:model="activity.courses.{{$key}}">
                                </label>
                            </div>
                        @endforeach --}}

                        {{-- <p>---------------------------------------------------------------</p>

                        @foreach($coursessz as $course)
                            <div class="content-start">
                                <label for="{{$course->id }}">
                                    {{ $course->id.' '. $course->course->code.' '.$course->course->course.' '.$course->course->section.' '.$course->course->id }}
                                    <input type="checkbox" id="{{ $course->id}}" value="{{ $course->id }}"  wire:model="cour.{{ $course->course->id }}">
                                </label>
                            </div>
                        @endforeach --}}

                        {{-- @foreach ($course as $cour)

                            <p>{{$cour['id']}}</p>

                        @endforeach--}}

                       {{--  @foreach ($activity->courses as $course) --}}

                        {{-- <p>{{$course->course->code.' '.$course->course->section}}</p> --}}

                            {{-- <label for="{{$course->course->id }}">
                            {{ $course->course->section }} --}}
                            {{-- <input type="checkbox" id="{{ $cursoy['id']}}" value="{{ $cursoy['id'] }}" wire:click="<button wire:click="$emitUp('courses')"> --}}
                            {{-- <input type="checkbox" id="{{ $course->course->id}}" value="{{ $course->course->id }}"  wire:model="coursess"> --}}

                            {{-- <input type="checkbox" wire:model="PermissionCheckbox.{{ $key }}" {{ in_array($pms->id , $PermissionCheckbox)? "checked":"" }} /> --}}
                           {{--  </label> --}}
                       {{--  @endforeach --}}

                    </div>
                    <span class="text-danger">@error('cour'){{ $message }}@enderror</span>
                </div>
            </div>
        </div>



        @endif

        {{-- STEP 2 --}}

        @if ($currentStep == 2)


        <div class="step-two">



            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 2/4 - Datos</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de Actividad</label>
                                {{-- <input type="text" class="form-control" placeholder="Ingrese el nombre de la actividad" wire:model.defer="name"> --}}
                                <input type="text" class="form-control"  wire:model="activity.name" placeholder="Ingrese el nombre de la actividad">
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        {{-- <div class="col-md-6">
                           <div class="form-group">
                               <label for="">Facultad</label>
                               <input type="text" class="form-control" placeholder="Enter phone number" wire:model="phone">
                               <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                           </div>
                       </div> --}}
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Factultad de la materia:</label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group w-full">
                            <label for="">Nombre del Profesor: </label>
                            <p>{{ $userActiveName }}</p>
                        </div>
                    </div>

                    {{-- <div class="col-md-6">
                        <h4>Tipo de Participacion</h4>
                        <div class="form-group">

                            <label for="type"></label>
                                <select names="type" wire:model="activity.type"
                                class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                    <option value="" selected>Seleccione tipo de Participacion</option>

                                        <option value="1">Individual</option>
                                        <option value="2">Grupal</option>
                                        <option value="3">Combinada</option>

                                </select>

                        </div>
                    </div> --}}

                    {{-- <div class="col-md-6">
                        <h4>Unidad</h4>
                        <div   div class="form-group">

                            <label for="unit"></label>
                                <select names="unit" wire:model="activity.unit"
                                class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                    <option value="" selected>Seleccione la Unidad</option>

                                        <option value="1"> Unidad I</option>
                                        <option value="2"> Unidad II</option>
                                        <option value="3"> Unidad III</option>
                                        <option value="4"> Unidad IV</option>

                                </select>

                        </div>
                    </div> --}}

                </div>
            </div>


            <div class="card">
                <div class="card-header bg-secondary text-white">Proposito de la Actividad</div>
                <div class="card-body">
                    {{-- {!! $activity->body!!} --}}
                    <div class = "form-group my-4" wire:ignore>
                        <label for="body" class="p-r-mute">   </label>
                        <textarea id="bodyy" wire:model="activity.body" placeholder="Indique de manera especifica el proposito de la actividad" class="form-control w-full" rows="6" required></textarea>
                    </div>
                    <span class="text-danger">@error('bodyy'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Competencia de la Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4" wire:ignore>
                        <label for="extract" class="p-r-mute">   </label>
                        <textarea id="extract" wire:model="activity.extract"
                        class="form-control"
                        placeholder="Indique de manera especifica la competencia de la actividad" rows="6" required></textarea>
                    </div>


                    <span class="text-danger">@error('extract'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Criterios de la Evaluacion</div>
                <div class="card-body">
                    {{-- <div class = "form-group my-4"  wire:ignore>
                        <label for="" class="p-r-mute">   </label>
                        <textarea id="" wire:model="" class="form-control" placeholder="Indique de manera especifica los criterios de evaluacion de la actividad" rows="6" required></textarea>
                    </div>
                    <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                    <div class = "form-group my-4" >
                        <button type="button" class="btn btn-md btn-secondary" wire:click="increaseCritery()">+</button>
                        <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseCritery()">-</button>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="col-md-12">
                                    <label for="">Nombre del Criterio</label>
                                </th>
                                <th class="col-md-6">
                                    <label for="">Puntuacion %</label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                /* dd($this->activityCriteries[0]['id'] ); */
                                /* dd($this->activityCriteries[0]['evaluation']); */
                                /* $currentCritery = $currentCritery + $this->cx - 1; */
                                /* dd($this->criteries); */
                            @endphp
                            @for ($ii = 0 ; $ii < $currentCritery ; $ii++)
                                {{-- @php
                                    if (!isset($activityCriteries[$ii]['critery'])) {
                                        $activityCriteries[$ii]['critery'] = '--';
                                        $activityCriteries[$ii]['evaluation'] = 0;
                                    }
                                @endphp --}}
                                @if (isset($activityCriteries[$ii]['critery']))  {{-- Campos originales de la base de datos --}}
                                    <tr>
                                        <td class="col-md-12" wire:ignore>
                                            {{-- <label for="">Nombre del Criterio</label> --}}
                                            <input type="text" class="form-control" placeholder="Ingrese el nombre del criterio" wire:model="activityCriteries.{{$ii}}.critery">
                                            {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                                            {{-- <p>{{$activityCriteries[$ii]['critery']}}</p> --}}
                                        </td>
                                        <td class="col-md-6" wire:ignore>
                                            {{-- <label for="">Puntos</label> --}}
                                            <input type="number" step="1" min="0" max="30" required="required"
                                                    class="form-control" placeholder="%" wire:model="activityCriteries.{{$ii}}.evaluation">
                                            {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                                            {{-- <p>{{$activityCriteries[$ii]['evaluation']}}</p> --}}
                                        </td>
                                    </tr>
                                @else  {{-- Campos nuevos creados cuando se editan --}}
                                    <tr>
                                        <td class="col-md-12" wire:ignore>
                                            {{-- <label for="">Nombre del Criterio</label> --}}
                                            <input type="text" class="form-control" placeholder="Ingrese el nombre del criterio" wire:model="criteries.{{$ii}}">
                                            {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                                            {{-- <p>{{$activityCriteries[$ii]['critery']}}</p> --}}
                                        </td>
                                        <td class="col-md-6" wire:ignore>
                                            {{-- <label for="">Puntos</label> --}}
                                            <input type="number" step="1" min="0" max="30" required="required"
                                                    class="form-control" placeholder="%" wire:model="criteries.nota.{{$ii}}">
                                            {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                                            {{-- <p>{{$activityCriteries[$ii]['evaluation']}}</p> --}}
                                        </td>
                                    </tr>
                                @endif
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Extrategia(s) de la Evaluacion</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="extract01" class="p-r-mute">   </label>
                        <textarea id="extract01" wire:model="activity.extract01" class="form-control" placeholder="Indique de manera especifica las extrategias de evaluacion de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract01'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Tecnica(s) de la Evaluacion</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="extract02" class="p-r-mute">   </label>
                        <textarea id="extract02" wire:model="activity.extract02" class="form-control" placeholder="Indique de manera especifica las tecnicas de evaluacion de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract02'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Herramienta(s) Digitales de la Evaluacion</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="extract03" class="p-r-mute">   </label>
                        <textarea id="extract03" wire:model="activity.extract03" class="form-control" placeholder="Indique de manera especifica las herramientas digitales de evaluacion de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract03'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Recursos Digitales de la Evaluacion</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="extract04" class="p-r-mute">   </label>
                        <textarea id="extract04" wire:model="activity.extract04" class="form-control" placeholder="Indique de manera especifica los recursos digitales de evaluacion de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract04'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Referencias bibliograficas</div>
                {{-- <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="" class="p-r-mute">   </label>
                        <textarea id="" wire:model="" class="form-control" placeholder="Indique de manera especifica las referencias bibliograficas de la actividad" rows="6" required></textarea>
                    </div>
                    <span class="text-danger">@error(''){{ $message }}@enderror</span>
                </div> --}}
                <div class = "form-group my-4" >
                    <button type="button" class="btn btn-md btn-secondary" wire:click="increaseBiblio()">+</button>
                    <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseBiblio()">-</button>
                </div>
                {{-- @php
                    dd($references);
                @endphp --}}
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th>
                                <label for="" class="col-md-12">Titulo</label>
                            </th>
                            <th>
                                <label for="" class="col-md-3">Autor</label>
                            </th>
                            <th>
                                <label for="" class="col-md-3">Año</label>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($jj = 0 ; $jj < $currentBiblio ; $jj++)
                            @if (isset($references[$jj]['title']))
                                <tr>
                                    <td class="col-md-5" wire:ignore>
                                        {{-- <label for="">Nombre del Criterio</label> --}}
                                        <input type="text" class="form-control" placeholder="Titulo" wire:model="references.{{$jj}}.title">
                                        {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                                    </td>
                                    <td class="col-md-4" wire:ignore>
                                        {{-- <label for="">Puntos</label> --}}
                                        <input type="text" class="form-control" placeholder="Autor" wire:model="references.{{$jj}}.autor">
                                        {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                                    </td>
                                    <td class="col-md-3" wire:ignore>
                                        {{-- <label for="">Puntos</label> --}}
                                        <input type="number" step="1" min="0" max="2999" required="required"
                                            class="form-control" placeholder="Año de publicacion" wire:model="references.{{$jj}}.year">
                                        {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="col-md-6" wire:ignore>
                                        {{-- <label for="">Nombre del Criterio</label> --}}
                                        <input type="text" class="form-control" placeholder="Titulo" wire:model="biblio.{{$jj}}">
                                        {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                                    </td>
                                    <td class="col-md-6" wire:ignore>
                                        {{-- <label for="">Puntos</label> --}}
                                        <input type="text" class="form-control" placeholder="Autor" wire:model="biblio.autor.{{$jj}}">
                                        {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                                    </td>
                                    <td class="col-md-2" wire:ignore>
                                        {{-- <label for="">Puntos</label> --}}
                                        <input type="number" step="1" min="0" max="2999" required="required"
                                            class="form-control" placeholder="Año de publicacion" wire:model="biblio.anno.{{$jj}}">
                                        {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                                    </td>
                                </tr>
                            @endif
                        @endfor
                    </tbody>
                </table>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Instrucciones de la Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="instruction" class="p-r-mute">   </label>
                        <textarea id="instruction" wire:model="activity.instruction" class="form-control" placeholder="Indique de manera especifica las instrucciones de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('instruction'){{ $message }}@enderror</span>
                </div>
            </div>








           {{--  <div class="card">
                <div class="card-header bg-secondary text-white">Criterios de la Evaluacion</div>
                <div class="card-body">
                    <div class = "form-group my-4" wire:ignore>
                        <label for="extract01" class="p-r-mute">   </label>
                        <textarea id="extract01" wire:model="activity.extract01" class="form-control" placeholder="Indique de manera especifica los criterios de evaluacion de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract01'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Instrucciones de la Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4" wire:ignore>
                        <label for="extract02" class="p-r-mute">   </label>
                        <textarea id="extract02" wire:model="activity.extract02" class="form-control" placeholder="Indique de manera especifica las instrucciones de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract01'){{ $message }}@enderror</span>
                </div>
            </div> --}}

            {{-- @push('js')
                <script>
                    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

                    CKEDITOR.replace( 'body' );
                    CKEDITOR.replace( 'extract' );
                    CKEDITOR.replace( 'extract01' );

                </script>
            @endpush --}}

            {{-- @stack('js') --}}

            <script>
                /* CKEDITOR01
                        .create( document.querySelector('body'))
                        .catch(error => {
                            console.error (error);
                        }); */





                        /* .then(function(editor){
                            editor.model.document.on('change:data',() => {
                                @this.set('body', editor.getData());
                            })
                        )}; */

                function MinHeightPlugin(editor) {
                            this.editor = editor;
                            }

                            MinHeightPlugin.prototype.init = function() {
                            this.editor.ui.view.editable.extendTemplate({
                                attributes: {
                                style: {
                                    minHeight: '300px'
                                }
                                }
                            });
                            };

                ClassicEditor.builtinPlugins.push(MinHeightPlugin);

                ClassicEditor
                    .create( document.querySelector( '#bodyy' ), {
                            removeButtons: 'PasteFromWord', //dont working
                            toolbar: {
                                    items: [
                                        'heading', '|',
                                        'fontfamily', 'fontsize', '|',
                                        'alignment', '|',
                                        'fontColor', 'fontBackgroundColor', '|',
                                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                                        'link', '|',
                                        'outdent', 'indent', '|',
                                        'bulletedList', 'numberedList', 'todoList', '|',
                                        'code', 'codeBlock', '|',
                                        'insertTable', '|',
                                        /* 'uploadImage', 'blockQuote', '|', */
                                        'undo', 'redo'
                                    ],
                                    shouldNotGroupWhenFull: true}
                        }  )

                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            editor.model.document.on('change:data', () => {
                                @this.set('activity.body', editor.getData());
                            })
                            /* console.log(editor.getData()) */
                            /* document.querySelector("#bodyy").value = editor.getData() */
                        });
                    })
                    .catch( error => {
                        console.error( error )
                } );

                ClassicEditor
                    .create( document.querySelector( '#extract' ), {
                            removeButtons: 'PasteFromWord', //dont working
                            toolbar: {
                                    items: [
                                        'heading', '|',
                                        'fontfamily', 'fontsize', '|',
                                        'alignment', '|',
                                        'fontColor', 'fontBackgroundColor', '|',
                                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                                        'link', '|',
                                        'outdent', 'indent', '|',
                                        'bulletedList', 'numberedList', 'todoList', '|',
                                        'code', 'codeBlock', '|',
                                        'insertTable', '|',
                                        /* 'uploadImage', 'blockQuote', '|', */
                                        'undo', 'redo'
                                    ],
                                    shouldNotGroupWhenFull: true}
                        }  )

                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            editor.model.document.on('change:data', () => {
                                @this.set('activity.extract', editor.getData());
                            })
                            /* console.log(editor.getData()) */
                            /* document.querySelector("#bodyy").value = editor.getData() */
                        });
                    })
                    .catch( error => {
                        console.error( error )
                } );

                ClassicEditor
                    .create( document.querySelector( '#extract01' ), {
                            removeButtons: 'PasteFromWord', //dont working
                            toolbar: {
                                    items: [
                                        'heading', '|',
                                        'fontfamily', 'fontsize', '|',
                                        'alignment', '|',
                                        'fontColor', 'fontBackgroundColor', '|',
                                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                                        'link', '|',
                                        'outdent', 'indent', '|',
                                        'bulletedList', 'numberedList', 'todoList', '|',
                                        'code', 'codeBlock', '|',
                                        'insertTable', '|',
                                        /* 'uploadImage', 'blockQuote', '|', */
                                        'undo', 'redo'
                                    ],
                                    shouldNotGroupWhenFull: true}
                        }  )

                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            editor.model.document.on('change:data', () => {
                                @this.set('activity.extract01', editor.getData());
                            })
                            /* console.log(editor.getData()) */
                            /* document.querySelector("#bodyy").value = editor.getData() */
                        });
                    })
                    .catch( error => {
                        console.error( error )
                } );

                ClassicEditor
                    .create( document.querySelector( '#extract02' ), {
                            removeButtons: 'PasteFromWord', //dont working
                            toolbar: {
                                    items: [
                                        'heading', '|',
                                        'fontfamily', 'fontsize', '|',
                                        'alignment', '|',
                                        'fontColor', 'fontBackgroundColor', '|',
                                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                                        'link', '|',
                                        'outdent', 'indent', '|',
                                        'bulletedList', 'numberedList', 'todoList', '|',
                                        'code', 'codeBlock', '|',
                                        'insertTable', '|',
                                        /* 'uploadImage', 'blockQuote', '|', */
                                        'undo', 'redo'
                                    ],
                                    shouldNotGroupWhenFull: true}
                        }  )

                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            editor.model.document.on('change:data', () => {
                                @this.set('activity.extract02', editor.getData());
                            })
                            /* console.log(editor.getData()) */
                            /* document.querySelector("#bodyy").value = editor.getData() */
                        });
                    })
                    .catch( error => {
                        console.error( error )
                } );

                ClassicEditor
                    .create( document.querySelector( '#extract03' ), {
                            removeButtons: 'PasteFromWord', //dont working
                            toolbar: {
                                    items: [
                                        'heading', '|',
                                        'fontfamily', 'fontsize', '|',
                                        'alignment', '|',
                                        'fontColor', 'fontBackgroundColor', '|',
                                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                                        'link', '|',
                                        'outdent', 'indent', '|',
                                        'bulletedList', 'numberedList', 'todoList', '|',
                                        'code', 'codeBlock', '|',
                                        'insertTable', '|',
                                        /* 'uploadImage', 'blockQuote', '|', */
                                        'undo', 'redo'
                                    ],
                                    shouldNotGroupWhenFull: true}
                        }  )

                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            editor.model.document.on('change:data', () => {
                                @this.set('activity.extract03', editor.getData());
                            })
                            /* console.log(editor.getData()) */
                            /* document.querySelector("#bodyy").value = editor.getData() */
                        });
                    })
                    .catch( error => {
                        console.error( error )
                } );

                ClassicEditor
                    .create( document.querySelector( '#extract04' ), {
                            removeButtons: 'PasteFromWord', //dont working
                            toolbar: {
                                    items: [
                                        'heading', '|',
                                        'fontfamily', 'fontsize', '|',
                                        'alignment', '|',
                                        'fontColor', 'fontBackgroundColor', '|',
                                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                                        'link', '|',
                                        'outdent', 'indent', '|',
                                        'bulletedList', 'numberedList', 'todoList', '|',
                                        'code', 'codeBlock', '|',
                                        'insertTable', '|',
                                        /* 'uploadImage', 'blockQuote', '|', */
                                        'undo', 'redo'
                                    ],
                                    shouldNotGroupWhenFull: true}
                        }  )

                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            editor.model.document.on('change:data', () => {
                                @this.set('activity.extract04', editor.getData());
                            })
                            /* console.log(editor.getData()) */
                            /* document.querySelector("#bodyy").value = editor.getData() */
                        });
                    })
                    .catch( error => {
                        console.error( error )
                } );

                ClassicEditor
                    .create( document.querySelector( '#instruction' ), {
                            removeButtons: 'PasteFromWord', //dont working
                            toolbar: {
                                    items: [
                                        'heading', '|',
                                        'fontfamily', 'fontsize', '|',
                                        'alignment', '|',
                                        'fontColor', 'fontBackgroundColor', '|',
                                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                                        'link', '|',
                                        'outdent', 'indent', '|',
                                        'bulletedList', 'numberedList', 'todoList', '|',
                                        'code', 'codeBlock', '|',
                                        'insertTable', '|',
                                        /* 'uploadImage', 'blockQuote', '|', */
                                        'undo', 'redo'
                                    ],
                                    shouldNotGroupWhenFull: true}
                        }  )

                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            editor.model.document.on('change:data', () => {
                                @this.set('activity.instruction', editor.getData());
                            })
                            /* console.log(editor.getData()) */
                            /* document.querySelector("#bodyy").value = editor.getData() */
                        });
                    })
                    .catch( error => {
                        console.error( error )
                } );



                /* new Pikaday({ field: $extract.input, 'format': 'MM/DD/YYYY', firstDay: 1, minDate: new Date(), }); */

                /* CKEDITOR.replace( 'body' );
                CKEDITOR.replace( 'extract' );
                CKEDITOR.replace( 'extract01' ); */

            </script>

        </div>


        @endif


        {{-- STEP 3 --}}

        @if ($currentStep == 3)


        <div class="step-three">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 3/4 - Infomacion Final</div>
                <div class="card-body">

                    @php
                        $coursesFull = App\Models\course::all();
                    @endphp


                    <div class="row">

                        <div class="col-md-6">
                            <h4>Tipo de Evaluacion</h4>
                            <div class="form-group">
                                @if(count($evaluations) > 0)
                                    <label for="evaluation"></label>
                                        {{-- <select names="evaluation" wire:model="activity.evaluation"
                                        class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                            <option value="" selected>Seleccione tipo de Evaluacion</option>
                                            @foreach ($evaluations as $evaluation)
                                                <option value="{{ $evaluation['id'] }}">{{ $evaluation['name'] }}</option>
                                            @endforeach
                                        </select> --}}

                                        <select names="evaluation" wire:model="activity.activity_type"
                                        class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                            <option value="{{-- {{ $activity->type }} --}}" selected>Seleccione tipo de Evaluacion</option>
                                            @foreach ($evaluations as $evaluation)
                                                {{-- <option value="{{ $evaluation['id'] }}">{{ $evaluation['name'] }}</option> --}}
                                                <option value="{{ $evaluation->id }}">{{ $evaluation->name }}</option>
                                            @endforeach
                                        </select>
                                @endif
                                {{-- <p>{{$activity->type}}</p> --}}
                                {{-- <span class="text-danger">@error('evaluation'){{ $message }}@enderror</span> --}}


                                {{-- @if(count($evaluations) > 0)
                                    <label for="evaluation"></label>
                                        <select names="evaluation" wire:model="evaluation"
                                        class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                            <option value="" selected>Seleccione tipo de Evaluacion</option>
                                            @foreach ($evaluations as $evaluation)
                                                <option value="{{ $evaluation['id'] }}">{{ $evaluation['name'] }}</option>

                                            @endforeach
                                        </select>
                                @endif --}}
                            </div>
                        </div>
                    </div>

                            @php
                                $desabilitado = "";
                                if ($activity->activity_type == 1 || $activity->activity_type == 2) {
                                    $desabilitado = "disabled";
                                    $activity->evaluation = 0;
                                }
                            @endphp

                    <div class="col-md-6">
                        <h4>Ponderacion</h4>
                        <div class="form-group">
                            <label for="unit"></label>

                            {{-- {{$this->activity}}; --}}

                            <input type="number" id="tentacles" name="tentacles" {{$desabilitado}} disabled
                                placeholder="0.00" step="0.01" min="0" max="100" wire:model="activity.evaluation">
                                {{-- <select names="unit" wire:model="unit"
                                class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                    <option value="" selected>Seleccione la Unidad</option>
                                        <option value="1"> Unidad I</option>
                                        <option value="2"> Unidad II</option>
                                        <option value="3"> Unidad III</option>
                                        <option value="4"> Unidad IV</option>
                                </select> --}}
                            {{-- <p>{{$this->activity->evaluation}}</p> --}}
                        </div>
                    </div>


                    <div class="col-md-6">
                        <h4>Unidad</h4>
                        <div class="form-group">

                            @php
                                /* dd($this->cour); */
                                $courx[] = array_keys($this->cour);
                                /* foreach ($this->cour as $courz){
                                    $courx[] = key($courz);
                                } */
                                /* foreach ($courx as $cur){
                                    $unidadess[] = $coursesFull[$cur]->unitTotal;
                                }; */
                                /* dd($courx); */
                                /* dd($unidadess); */
                            @endphp

                            @foreach (array_keys($this->cour) as $cur)

                                @if ($coursesFull[$cur]->unitTotal != 4)
                                    <p>ADVERTENCIA: el curso {{$cur}} tiene {{$coursesFull[$cur]->unitTotal}} de unidades.</p>
                                @endif

                            @endforeach

                            @php
                                foreach (array_keys($this->cour) as $cur){
                                    $unidadess[] = $coursesFull[$cur]->unitTotal;
                                }
                                /* dd($unidadess); */
                                $maximo = max($unidadess);
                                /* dd($maximo); */
                                /* $maximo = 4; */
                            @endphp


                           {{-- @if(count($evaluations) > 0) --}}
                            <label for="unit"></label>
                                <select names="unit" wire:model="activity.unit"
                                class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                    <option value="" selected>Seleccione la Unidad</option>
                                    {{-- @foreach ($evaluations as $evaluation) --}}
                                        {{-- <option value="1"> Unidad I</option>
                                        <option value="2"> Unidad II</option>
                                        <option value="3"> Unidad III</option>
                                        <option value="4"> Unidad IV</option> --}}
                                        {{-- <option value="{{ $evaluation->id }}">{{ $evaluation->name }}</option> --}}
                                        {{-- <option value="Bangladesh">Bangladesh</option> --}}
                                    {{-- @endforeach --}}

                                    @for ($a = 1; $a <= $maximo; $a++)
                                        <option value = {{$a}}> Unidad {{$a}}</option>
                                    @endfor
                                </select>
                            {{-- @endif --}}
                            {{-- <span class="text-danger">@error('country'){{ $message }}@enderror</span> --}}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h4>Tipo de Participacion</h4>
                        <div class="form-group">
                        {{-- @if(count($evaluations) > 0) --}}
                            <label for="type"></label>
                                <select names="type" wire:model="activity.type"
                                class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                    <option value="" selected>Seleccione tipo de Participacion</option>
                                {{--  @foreach ($evaluations as $evaluation) --}}
                                        <option value="1">Individual</option>
                                        <option value="2">Grupal</option>
                                        <option value="3">Combinada</option>
                                        {{-- <option value="{{ $evaluation->id }}">{{ $evaluation->name }}</option> --}}
                                        {{-- <option value="Bangladesh">Bangladesh</option> --}}
                                    {{-- @endforeach --}}
                                </select>
                            {{-- @endif --}}
                            {{-- <span class="text-danger">@error('country'){{ $message }}@enderror</span> --}}
                        </div>
                    </div>


                    {{-- </div> --}}
                    <div>
                        <h4>Periodo de la Actividad</h4>
                        <div class="dates-wrapper group form-inline">

                            {{-- <div class="field clearfix date-range-start date-wrapper" >
                                <div class="label">
                                <label for="lapse_in">Inicio de actividad:</label>
                                </div>
                                <div class="input" wire:ignore >
                                    <input type="text" name="lapse_in" id="datepickerInPP" class="form-control datepicker date "
                                    wire:model="lapse_in">
                                </div>
                            </div> --}}

                            {{-- <div class="field clearfix date-range-start date-wrapper" >
                                <div class="label">
                                <label for="lapse_out">Final de actividad:</label>
                                </div>
                                <div class="input" wire:ignore >
                                    <input type="text" name="lapse_out" id="datepickerOutPP" class="form-control datepicker date "
                                    wire:model="lapse_out">

                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div> --}}






                            <div style="display: inline-block">
                                <label for="start">Inicio de actividad:</label>
                               {{--  <br> --}}
                                <input type="text" id="datepickerInP"
                                wire:model="lapse_in">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>

                            <div style="display: inline-block">
                                <label for="end">Final de actividad:</label>
                                {{-- <br> --}}
                                <input type="text" id="datepickerOutP"
                                wire:model="lapse_out">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>

                        </div>

                    </div>

                    <div>
                        <input wire:model="activity.status" name="status" type="radio" value="1" /> Borrador
                        {{-- <input wire:model="activity.status" name="status" type="radio" value="3" /> Revision --}}
                        <input wire:model="activity.status" name="status" type="radio" value="2" /> Publicado
                    </div>




                </div>
            </div>
            <script>

                /* $(function () {
                    $('#datetimepicker').datetimepicker();
                }); */

                /* $('.datepicker').datepicker({
                    format: "dd/mm/yyyy",
                    language: "es",
                    autoclose: true
                }); */

                $(function () {
                    $('#datepickerIn').datepicker({
                        format: "dd-mm-yyyy",
                        language: "es",
                        autoclose: true,
                        todayHighlight: true,
                        orientation: "auto",
                        weekStart: 0,
                        calendarWeeks: false,
                    });
                    $('#datepickerOut').datepicker({
                        useCurrent: false, //Important! See issue #1075
                        format: "dd-mm-yyyy",
                        language: "es",
                        autoclose: true,
                        todayHighlight: true,
                        orientation: "auto",
                        weekStart: 0,
                        calendarWeeks: false,
                    });
                    $('#datepickerIn').on("dp.change", function (e) {
                        console.log(e.date);
                        console.log('IN');
                        $('#datepickerOut').data("DateTimePicker").minDate(e.date);
                    });
                    $('#datepickerOut').on("dp.change", function (e) {
                        console.log(e.date);
                        console.log('OUT');
                        $('#datepickerIn').data("DateTimePicker").maxDate(e.date);
                    });
                    console.log('lapse_in');
                });



                /* var lapse_in = document.getElementById('datepicker'); */
                var picker = new Pikaday({
                    field: document.getElementById('datepickerInY'),
                    i18n: {
                        previousMonth : 'Anterior',
                        nextMonth     : 'Siguiente',
                        months        : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                        weekdays      : ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
                        weekdaysShort : ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb']
                    },
                    format: 'DD-MM-YYYY',
                    onSelect: function() {
                        /* console.log(this.getMoment().format('Do MMMM YYYY')); */
                        @this.set('lapse_in', this.toString());
                    }
                });

                var picker = new Pikaday({
                    field: document.getElementById('datepickerOutY'),
                    i18n: {
                        previousMonth : 'Anterior',
                        nextMonth     : 'Siguiente',
                        months        : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                        weekdays      : ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
                        weekdaysShort : ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb']
                    },
                    format: 'DD-MM-YYYY',
                    onSelect: function() {
                        @this.set('lapse_out', this.toString());
                       /*  console.log(this.getMoment().format('Do MMMM YYYY')); */
                    }
                });

               /*  $(function () { */
                    var startDate,endDate,
                    updateStartDate = function() {
                        startPicker.setStartRange(startDate);
                        endPicker.setStartRange(startDate);
                        endPicker.setMinDate(startDate);
                    },
                    updateEndDate = function() {
                        startPicker.setEndRange(endDate);
                        startPicker.setMaxDate(endDate);
                        endPicker.setEndRange(endDate);
                    },
                    startPicker = new Pikaday({
                        field: document.getElementById('datepickerInP'),
                        i18n: {
                            previousMonth : 'Anterior',
                            nextMonth     : 'Siguiente',
                            months        : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                            weekdays      : ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
                            weekdaysShort : ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb']
                        },
                        format: 'DD-MM-YYYY',
                        minDate: new Date(),
                        maxDate: new Date(2022, 12, 31),
                        onSelect: function() {
                            startDate = this.getDate();
                            updateStartDate();
                            @this.set('lapse_in', this.toString());
                        }
                    }),
                    endPicker = new Pikaday({
                        field: document.getElementById('datepickerOutP'),
                        i18n: {
                            previousMonth : 'Anterior',
                            nextMonth     : 'Siguiente',
                            months        : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                            weekdays      : ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
                            weekdaysShort : ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb']
                        },
                        format: 'DD-MM-YYYY',
                        minDate: new Date(),
                        maxDate: new Date(2022, 12, 31),
                        onSelect: function() {
                            endDate = this.getDate();
                            updateEndDate();
                            @this.set('lapse_out', this.toString());
                        }
                    }),
                    _startDate = startPicker.getDate(),
                    _endDate = endPicker.getDate();

                    /* if (_startDate) {
                        startDate = _startDate;
                        updateStartDate();
                    };

                    if (_endDate) {
                        endDate = _endDate;
                        updateEndDate();
                    }; */
                /* }; */






               /* $('#datepickerIn').datepicker({
                    format: 'dd-mm-yyyy',
                    step: 5,
                    minDate:0,
                    onChangeDateTime: function (dp,$input) {
                        console.log("A new date: " + $input.val()),
                        console.log($input.getData()),
                        @this.set('lapse_in', $input.val());
                    },
                });


                $('#datepickerOut').datepicker({
                    format: 'dd/mm/yyyy',
                    step: 5,
                    onChangeDateTime: function (dp,$input) {
                        @this.set('lapse_out', $input.val());
                    },
                }); */


                /* $('.datetimepicker').datepicker({
                        format: "mm/dd/yy",
                        multidate: true,
                        weekStart: 0,
                        calendarWeeks: fakse,
                        language: "es",
                        autoclose: true,
                        todayHighlight: true,
                        orientation: "auto"
                }); */


            </script>
        </div>
        @endif

        {{-- STEP 4 --}}

        @if ($currentStep == 4)

            <div class="step-four">
                <div class="card">
                    <div class="card-header bg-secondary text-white">Paso 4/4 - Infomacion Final</div>
                    <div class="card-body">

                        @php
                            /* $coursesFull = App\Models\course::all(); */

                        @endphp



                        <div class="row">

                            {{-- <div class="col-md-6">
                                <h4>-----------------------------------------------</h4>
                                <div class="form-group">

                                    @if ($nota_mensaje == 1)
                                        <P>SOBRE PASA EL TOTAL DE NOTAS POR UNIDAD LAS SIQUIENTES MATERIAS</P>
                                        @for ( $this->i = 0 ;$this->i < $this->c ; $this->i++)
                                            <p>nota: {{$nota_curso[$this->i]->name}} {{$nota_curso[$this->i]->code}} {{$nota_curso[$this->i]->section}}</p>
                                        @endfor
                                    @else
                                        <p>LISTO PARA CREAR LA ACTIVIDAD</p>
                                    @endif



                                </div>
                            </div> --}}

                            <div class="col-md-6">
                                <h4>-----------------------------------------------</h4>
                                <div class="form-group">
                                    {{-- <p>{{$this->nota_mensaje}}</p> --}}
                                    @if ($this->nota_mensaje == 1)
                                        <P>SOBRE PASA EL TOTAL DE NOTAS POR UNIDAD LAS SIQUIENTES MATERIAS</P>
                                        @for ( $this->i = 0 ;$this->i < $this->cc ; $this->i++)
                                            <p>El curso: {{$nota_curso[$this->i]->name}} {{$nota_curso[$this->i]->code}} {{$nota_curso[$this->i]->section}} le queda solo {{$this->notax[$this->i]}} puntos</p>
                                        @endfor
                                        {{-- @php
                                            $nota_curso = null;
                                        @endphp --}}
                                    @else
                                        {{-- @for ($this->i = 0;$this->i < $this->ccx ; $this->i++)
                                            <p>El curso: {{$nota_cursox[$this->i]->name}} {{$nota_cursox[$this->i]->code}} {{$nota_cursox[$this->i]->section}} le queda {{$this->datos_curso[$this->i]}} puntos</p>


                                        @endfor --}}

                                        {{-- <p>abc {{$this->ccx}}</p> --}}
                                        <p>LISTO PARA CREAR LA ACTIVIDAD</p>
                                    @endif
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        @endif


        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

           @if ($currentStep == 1)
               <div></div>
           @endif

           {{-- @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5 || $currentStep == 6)
               <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
           @endif --}}

           @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 )
               <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Atras</button>
           @endif

           {{-- @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5)
               <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>

           @endif --}}

           {{-- @if ($currentStep == 6)

           @endif --}}

           @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
               <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Siguiente</button>
           @endif

           @if ($currentStep == 4 && $nota_mensaje == 0)
                <button type="submit" class="btn btn-md btn-primary">Editar</button>
           @endif


        </div>




    </form>

        {{-- <script>
            CKEDITOR.replace( 'body' );
            CKEDITOR.replace( 'extract' );
            CKEDITOR.replace( 'extract01' );

            var picker = new Pikaday({
                        field: document.getElementById('#datetimepicker'),
                        format: 'DD MM YYYY'

                    })
        </script> --}}


</div>
