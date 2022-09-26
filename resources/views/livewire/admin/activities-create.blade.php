

<div>

    <form wire:submit.prevent="register">

        {{-- STEP 1 --}}

        @if ($currentStep == 1)

        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 1/4 - Seleccionar Materias</div>
                <div class="card-body">

                                @php
                                    $coursesFull = App\Models\course::all();

                                    /* dd($coursesFull); */
                                @endphp
                                {{-- <p>UNIDADES:{{$coursesFull[1051]->unitTotal}}</p> --}}

                    <div class="w-screen flex-col align-items-left mt-2">

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
                                        {{ $cursoy['section'] }}
                                        {{-- <input type="checkbox" id="{{ $cursoy['id']}}" value="{{ $cursoy['id'] }}" wire:click="<button wire:click="$emitUp('courses')"> --}}
                                        <input type="checkbox" id="{{ $cursoy['id']}}" value="{{ $cursoy['id'] }}"  wire:model="coursess">
                                        </label>
                                @endforeach
                            </div>
                        @endforeach

                    </div>

                    <span class="text-danger">@error('coursess'){{ $message }}@enderror</span>
                </div>
            </div>
        </div>


        @endif

        {{-- STEP 2 --}}

        @if ($currentStep == 2)


        <div class="step-two">
            <div class="card">

                {{-- @php
                    dd($this->coursess);
                @endphp --}}


            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 2/4 - Datos</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de Actividad</label>
                                <input type="text" class="form-control " placeholder="Ingrese el nombre de la actividad" wire:model.defer="name">
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Factultad de la materia:</label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group w-full">
                            <label for="">Nombre del Profesor: {{ $userActiveName }}</label>

                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header bg-secondary text-white">Proposito de la Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="body" class="p-r-mute">   </label>
                        <textarea id="body" wire:model="body" class="form-control w-full text-editor editor-container" placeholder="Indique de manera especifica el proposito de la actividad" rows="6" required></textarea>
                    </div>
                    {{-- <div class="frameworks d-flex flex-column align-items-left mt-2">
                        <label for="laravel">
                            <input type="checkbox" id="laravel" value="laravel" wire:model="frameworks"> Laravel
                        </label>
                        <label for="codeigniter">
                           <input type="checkbox" id="codeigniter" value="codeigniter" wire:model="frameworks"> Codeigniter
                       </label>
                       <label for="vuejs">
                           <input type="checkbox" id="vuejs" value="vuejs" wire:model="frameworks"> Vue Js
                       </label>
                       <label for="cakePHP">
                           <input type="checkbox" id="cakePHP" value="cakePHP" wire:model="frameworks"> CakePHP
                       </label>
                    </div> --}}
                    <span class="text-danger">@error('body'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Competencia de la Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="extract" class="p-r-mute">   </label>
                        <textarea id="extract" wire:model="extract" class="form-control" placeholder="Indique de manera especifica la competencia de la actividad" rows="6" required></textarea>
                    </div>


                    <span class="text-danger">@error('extract'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Criterios de la Evaluacion</div>
                <div class="card-body" >
                    {{-- <div class = "form-group my-4"  wire:ignore>
                        <label for="" class="p-r-mute">   </label>
                        <textarea id="" wire:model="" class="form-control" placeholder="Indique de manera especifica los criterios de evaluacion de la actividad" rows="6" required></textarea>
                    </div> --}}



                    <div class = "form-group my-4" >
                        <button type="button" class="btn btn-md btn-secondary" wire:click="increaseCritery()">+</button>
                        <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseCritery()">-</button>
                    </div>
                    {{-- <div class = "form-group my-4">
                        <p>{{$currentCritery}}</p>
                    </div> --}}
                    {{-- <div class="col-md-8 grid grid-cols-4 gap-4">
                        <div class="col-md-8">
                            <label for="">Nombre del Criterio</label>
                            <input type="text" class="form-control" placeholder="Ingrese el nombre del criterio" wire:model.defer="">
                            <span class="text-danger">@error(''){{ $message }}@enderror</span>


                        </div>

                        <div class="col-md-3">
                            <label for="">Puntos</label>
                            <input type="text" class="form-control" placeholder="Porcentual" wire:model.defer="">
                            <span class="text-danger">@error(''){{ $message }}@enderror</span>
                        </div>
                    </div> --}}

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
                            @for ($ii = 0 ; $ii < $currentCritery ; $ii++)

                                <tr>
                                    <td class="col-md-12" wire:ignore>
                                        {{-- <label for="">Nombre del Criterio</label> --}}
                                        <input type="text" class="form-control" placeholder="Ingrese el nombre del criterio" wire:model="criteries.{{$ii}}">
                                        {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                                    </td>
                                    <td class="col-md-6" wire:ignore>
                                        {{-- <label for="">Puntos</label> --}}
                                        <input type="number" step="1" min="0" max="30" required="required"
                                                class="form-control" placeholder="%" wire:model="criteries.nota.{{$ii}}">
                                        {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                                    </td>
                                </tr>

                            @endfor



                        </tbody>

                    </table>

                    {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Extrategia(s) de la Evaluacion</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="extract01" class="p-r-mute">   </label>
                        <textarea id="extract01" wire:model="extract01" class="form-control" placeholder="Indique de manera especifica las estrategias de evaluacion de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract01'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Tecnica(s) de la Evaluacion</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="extract02" class="p-r-mute">   </label>
                        <textarea id="extract02" wire:model="extract02" class="form-control" placeholder="Indique de manera especifica las tecnicas de evaluacion de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract02'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Herramienta(s) Digitales de la Evaluacion</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="extract03" class="p-r-mute">   </label>
                        <textarea id="extract03" wire:model="extract03" class="form-control" placeholder="Indique de manera especifica herramientas digitales de evaluacion de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract03'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Recursos Digitales de la Evaluacion</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="extract04" class="p-r-mute">   </label>
                        <textarea id="extract04" wire:model="extract04" class="form-control" placeholder="Indique de manera especifica los recursos digitales de evaluacion de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract04'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Referencias bibliograficas</div>
                <div class="card-body">
                    {{-- <div class = "form-group my-4"  wire:ignore>
                        <label for="" class="p-r-mute">   </label>
                        <textarea id="" wire:model="" class="form-control" placeholder="Indique de manera especifica las referencias bibliograficas de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}

                    <div class = "form-group my-4" >
                        <button type="button" class="btn btn-md btn-secondary" wire:click="increaseBiblio()">+</button>
                        <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseBiblio()">-</button>
                    </div>


                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th>
                                    <label for="" class="col-md-5">Titulo</label>
                                </th>
                                <th>
                                    <label for="" class="col-md-4">Autor</label>
                                </th>
                                <th>
                                    <label for="" class="col-md-4">Año</label>
                                </th>
                            </tr>

                        </thead>
                        <tbody>
                            @for ($jj = 0 ; $jj < $currentBiblio ; $jj++)

                                <tr>
                                    <td class="col-md-5" wire:ignore>
                                        {{-- <label for="">Nombre del Criterio</label> --}}
                                        <input type="text" class="form-control" placeholder="Titulo" wire:model="biblio.{{$jj}}">
                                        {{-- <span class="text-danger">@error(''){{ $message }}@enderror</span> --}}
                                    </td>
                                    <td class="col-md-3" wire:ignore>
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

                            @endfor



                        </tbody>

                    </table>



                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Instrucciones de la Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="instruction" class="p-r-mute">   </label>
                        <textarea id="instruction" wire:model="instruction" class="form-control" placeholder="Indique de manera especifica las instrucciones de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('instruction'){{ $message }}@enderror</span>
                </div>
            </div>

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

                    .create( document.querySelector( '#body' ), {
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
                        } )

                    .then(editor => {
                        /* editor.ui.view.editable.element.style.height = '500px', */    //work but fast
                        editor.model.document.on('change:data', () => {
                            editor.model.document.on('change:data', () => {
                                @this.set('body', editor.getData());
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
                                @this.set('extract', editor.getData());
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
                                @this.set('extract01', editor.getData());
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
                                @this.set('extract02', editor.getData());
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
                                @this.set('extract03', editor.getData());
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
                                @this.set('extract04', editor.getData());
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
                                @this.set('instruction', editor.getData());
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
                            /* dd($coursesFull); */

                           /*  dd($this->coursess); */


                            /* dd($this->criteries); */
                        @endphp
                            {{-- @foreach ($this->coursess as $cur)

                                <p>UNIDADES de {{$cur}}:{{$coursesFull[$cur]->unitTotal}}</p>

                            @endforeach --}}


                        <div class="row">

                            <div class="col-md-6">
                                <h4>Tipo de Evaluacion</h4>
                                <div class="form-group">
                                @if(count($evaluations) > 0)
                                    <label for="evaluation"></label>
                                        <select names="evaluation" wire:model="evaluation"
                                        class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                            <option value="" selected>Seleccione tipo de Evaluacion</option>
                                            @foreach ($evaluations as $evaluation)
                                                <option value="{{ $evaluation['id'] }}">{{ $evaluation['name'] }}</option>
                                                {{-- <option value="{{ $evaluation->id }}">{{ $evaluation->name }}</option> --}}
                                                {{-- <option value="Bangladesh">Bangladesh</option> --}}
                                            @endforeach
                                        </select>
                                    @endif

                                    {{-- <p>{{$this->evaluation}}</p> --}}

                                    {{-- <span class="text-danger">@error('country'){{ $message }}@enderror</span> --}}
                                </div>
                            </div>

                            @php
                                $desabilitado = "";
                                if ($this->evaluation == 1 || $this->evaluation == 2) {
                                    $desabilitado = "disabled";
                                    $this->eval = 0;
                                }
                            @endphp

                            <div class="col-md-6">
                                <h4>Ponderacion</h4>
                                <div class="form-group">
                                    <label for="unit"></label>

                                    <input type="number" id="tentacles" name="tentacles" {{$desabilitado}} disabled
                                        placeholder="0.00" step="0.01" min="0" max="100" wire:model="eval">
                                        {{-- <select names="unit" wire:model="unit"
                                        class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                            <option value="" selected>Seleccione la Unidad</option>
                                                <option value="1"> Unidad I</option>
                                                <option value="2"> Unidad II</option>
                                                <option value="3"> Unidad III</option>
                                                <option value="4"> Unidad IV</option>
                                        </select> --}}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h4>Unidad</h4>
                                <div class="form-group">


                                    @foreach ($this->coursess as $cur)

                                        {{-- <p>UNIDADES de {{$cur}}:{{$coursesFull[$cur]->unitTotal}}</p> --}}

                                        @if ($coursesFull[$cur]->unitTotal != 4)
                                            <p>ADVERTENCIA: el curso {{$cur}} tiene {{$coursesFull[$cur]->unitTotal}} de unidades.</p>
                                        @endif


                                    @endforeach

                                    @php
                                        foreach ($this->coursess as $cur){
                                            $unidadess[] = $coursesFull[$cur]->unitTotal;
                                        }
                                        /* dd($unidadess); */
                                        $maximo = max($unidadess);
                                        /* dd($maximo); */
                                    @endphp


                                {{-- @if(count($evaluations) > 0) --}}
                                    <label for="unit"></label>
                                        <select names="unit" wire:model="unit"
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
                                        <select names="type" wire:model="type"
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
                        </div>
                        <div>
                            <h4>Periodo de la Actividad</h4>
                            <div class="dates-wrapper group">

                                <div class="field clearfix date-range- rt date-wrapper">
                                    <div class="label">
                                    <label for="lapse_in">Inicio de actividad:</label>
                                    </div>
                                    <div class="input">
                                        <input type="text" name="lapse_in" id="datepickerInP" class="input-text"
                                        placeholder="{{date('d-m-Y', strtotime($academic_start))}}"
                                        wire:model="lapse_in">
                                    </div>
                                    {{-- <a href="#" class="calendar-btn calendar-start hide-text">View calendar</a>--}}
                                    {{-- <p>{{date('d-m-Y', strtotime($academic_start))}}</p> --}}
                                </div>

                                <div class="field clearfix date-range-start date-wrapper">
                                    <div class="label">
                                    <label for="lapse_out">Final de actividad:</label>
                                    </div>
                                    <div class="input">
                                        <input type="text" name="lapse_out" id="datepickerOutP" class="input-text"
                                        placeholder="{{date('d-m-Y', strtotime($academic_finish))}}"
                                        wire:model="lapse_out">
                                    </div>
                                    {{-- <a href="#" class="calendar-btn hide-text">View calendar</a> --}}
                                    {{-- <p>{{date('d-m-Y', strtotime($academic_finish))}}</p> --}}

                                </div>


                                <script>
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

                                            /* day = `${(startDate .getDate())}`.padStart(2,'0');
                                            month = `${(startDate .getMonth()+1)}`.padStart(2,'0');
                                            year = startDate .getFullYear();

                                            allDay = `${day}-${month}-${year}`, */

                                            updateStartDate();
                                            /* @this.set('lapse_in', startDate); */
                                            @this.set('lapse_in', this.toString());
                                            /* @this.set('lapse_in', startDate.toLocaleString()); */
                                            /* console.log(this.getMoment().format('Do MMMM YYYY')); */
                                            /* @this.set('lapse_in', startDate); */
                                            /* console.log(lapse_in); */
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
                                            /* @this.set('lapse_out', endDate); */
                                            @this.set('lapse_out', this.toString());

                                        }
                                    }),
                                    _startDate = startPicker.getDate(),
                                    _endDate = endPicker.getDate();
                                </script>

                                {{-- @php
                                    dd($lapse_in);
                                @endphp --}}

                            </div>
                        </div>


                        <div>
                            <input wire:model="status" name="status" type="radio" value="1" /> Borrador
                            {{-- <input wire:model="status" name="status" type="radio" value="3" /> Revision --}}
                            <input wire:model="status" name="status" type="radio" value="2" /> Publicado
                        </div>
                        {{-- @php
                            dd($nota_curso);
                        @endphp --}}
                        {{-- @foreach ($nota_curso as $notaCurso)
                            <p>nota: {{$notaCurso}}</p>
                        @endforeach --}}
                        {{-- <p>nota: {{$nota_curso->name}} {{$nota_curso->code}} {{$nota_curso->section}}</p> --}}

                    </div>
                </div>
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

                            <div class="col-md-6">
                                <h4>-----------------------------------------------</h4>
                                <div class="form-group">

                                    {{-- <p>{{$this->nota_mensaje}}</p> --}}


                                    @if ($this->nota_mensaje == 1)
                                        <P>SOBRE PASA EL TOTAL DE NOTAS POR UNIDAD LAS SIQUIENTES MATERIAS</P>
                                        @for ( $this->i = 0 ;$this->i < $this->cc ; $this->i++)
                                            <p>El curso: {{$nota_curso[$this->i]->name}} {{$nota_curso[$this->i]->code}} {{$nota_curso[$this->i]->section}} le queda solo {{$this->notax[$this->i]}} puntos en la unidad seleccionada</p>
                                        @endfor
                                        {{-- @php
                                            $nota_curso = null;
                                        @endphp --}}
                                    @else
                                        @for ($this->i = 0;$this->i < $this->ccx ; $this->i++)
                                            <p>El curso: {{$nota_cursox[$this->i]->name}} {{$nota_cursox[$this->i]->code}} {{$nota_cursox[$this->i]->section}} le queda {{$this->datos_curso[$this->i]}} puntos en la unidad seleccionada</p>
                                            {{-- <p>abc {{$this->datos_curso}}</p> --}}

                                        @endfor

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

           @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
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

           @if ($currentStep == 4  && $nota_mensaje == 0)
                <button type="submit" class="btn btn-md btn-primary">Crear</button>
           @endif


        </div>

    </form>


</div>
