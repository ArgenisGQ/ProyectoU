

<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <form wire:submit.prevent="register">

        {{-- STEP 1 --}}

        @if ($currentStep == 1)

        {{-- <div class="step-one">
            <p>PRIMERA PARTE</p>
        </div> --}}

        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 1/3 - Cantidad de Unidades</div>
                <div class="card-body">

                    <div class="w-screen flex-col align-items-left mt-2">



                        @foreach ( $courses as $curso )

                            @php


                                    $cursox = App\Models\User_course::where('name',$userActiveName)
                                                                    ->where('code',$curso['code'])
                                                                    ->get();

                                    /* dd($cursox); */

                                    /* $cursox = App\Models\Course::where('name',$userActiveName)
                                                                    ->where('code',$curso['code'])
                                                                    ->get(); */

                                    /* $courses_full = App\Models\Course::where('code',$cursox->code)
                                                                    ->where('section',$cursox['section'])
                                                                    ->get(); */

                                    /* $courses_full = App\Models\Course::find($cursox['id']); */

                                    /* $courses_full = App\Models\Course::all(); */

                                    /* dd($courses_full); */
                                    /* coursesForUser */


                            @endphp

                            <h4> {{ $curso['code'].' '.$curso['course'] }} </h4>
                            <div class="content-start">
                                @foreach ($cursox as $cursoy)
                                        <label for="{{ $cursoy['id'] }}">

                                        @php
                                        $courses_full = App\Models\Course::find($cursoy['id']);
                                        /* dd($courses_full); */
                                        @endphp



                                        {{ $courses_full['section'] }}

                                        {{-- <input type="checkbox" id="{{ $cursoy['id']}}" value="{{ $cursoy['id'] }}"  wire:model="coursess">
                                        </label> --}}

                                        {{-- <label for="unit"></label>
                                        <select names="unit" wire:model="unitTotalS"
                                        class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                            <option value="" selected>Unidades</option>

                                            <option value="4"> 4</option>
                                            <option value="5"> 5</option>
                                            <option value="6"> 6</option>
                                            <option value="7"> 7</option>
                                            <option value="8"> 8</option>
                                            </select> --}}


                                            <input type="number" id="{{ $courses_full['id']}}" name="{{ $courses_full['id'] }}"
                                                placeholder="4" step="1" min="4" max="8" {{-- readonly --}} disabled
                                                wire:model="coursesTotal.{{ $courses_full['id'] }}">
                                            </label>

                                            {{-- @php
                                                dd($unitTotalS);
                                            @endphp --}}


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


            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 2/3 - Valor de las unidades</div>

                <div class="card-body">

                    <div class="w-screen flex-col align-items-left mt-2">



                        @foreach ( $courses as $curso )

                            @php


                                    $cursox = App\Models\User_course::where('name',$userActiveName)
                                                                    ->where('code',$curso['code'])
                                                                    ->get();

                                    /* dd($cursox); */

                                    /* $cursox = App\Models\Course::where('name',$userActiveName)
                                                                    ->where('code',$curso['code'])
                                                                    ->get(); */

                                    /* $courses_full = App\Models\Course::where('code',$cursox->code)
                                                                    ->where('section',$cursox['section'])
                                                                    ->get(); */

                                    /* $courses_full = App\Models\Course::find($cursox['id']); */

                                    /* $courses_full = App\Models\Course::all(); */

                                    /* dd($courses_full); */
                                    /* coursesForUser */


                            @endphp
                            <ul>
                            <h4> {{ $curso['code'].' '.$curso['course'] }} </h4>

                            <div class="content-start">
                                @foreach ($cursox as $cursoy)
                                        <label for="{{ $cursoy['id'] }}">
                                        <li>
                                            @php
                                                $courses_full = App\Models\Course::find($cursoy['id']);
                                                /* dd($courses_full['unitTotal']); */
                                            @endphp

                                            {{ $courses_full['section'] }}

                                                {{-- <input type="number" id="{{ $courses_full['id']}}" name="{{ $courses_full['id'] }}"
                                                    placeholder="4" step="1" min="4" max="8"
                                                    wire:model="Unit01s.{{ $courses_full['id'] }}">

                                                </label>

                                                <input type="number" id="{{ $courses_full['id']}}" name="{{ $courses_full['id'] }}"
                                                    placeholder="4" step="1" min="4" max="8"
                                                    wire:model="Unit02s.{{ $courses_full['id'] }}">

                                                </label>

                                                <input type="number" id="{{ $courses_full['id']}}" name="{{ $courses_full['id'] }}"
                                                    placeholder="4" step="1" min="4" max="8"
                                                    wire:model="Unit03s.{{ $courses_full['id'] }}">

                                                </label>

                                                <input type="number" id="{{ $courses_full['id']}}" name="{{ $courses_full['id'] }}"
                                                    placeholder="4" step="1" min="4" max="8"
                                                    wire:model="Unit04s.{{ $courses_full['id'] }}">

                                                </label> --}}

                                                {{-- <p>{{$coursesTotal[$cursoy['id']]}}</p> --}}

                                                @php
                                                    $unidades = $coursesTotal[$cursoy['id']];
                                                @endphp

                                                {{-- <p>{{$unidades}}</p> --}}


                                                {{-- @for ($i = 1; $i <= $unidades; $i++)

                                                    <input type="number" id="{{ $courses_full['id']}}" name="{{ $courses_full['id'] }}"
                                                        placeholder="0" step="0.1" min="0" max="30"
                                                        wire:model="Unit0{{ $i }}s.{{ $courses_full['id'] }}">

                                                @endfor --}}

                                                @for ($i = 1; $i <= $unidades; $i++)

                                                    {{-- <p>{{ $courses_full['id'] }}</p> --}}

                                                    @php
                                                        $cf = $courses_full['id'];
                                                        $Unidadd = "Units0$i.$cf";
                                                       /*  dd($Unidadd); */
                                                       $clase = "";
                                                    @endphp

                                                    @error ($Unidadd)
                                                        @php
                                                            $clase = "text-danger"
                                                        @endphp
                                                    @enderror



                                                    <input type="number" id="{{ $courses_full['id']}}" name="{{ $courses_full['id'] }}"
                                                        {{-- class="text-danger" --}} class = {{$clase}}
                                                        {{-- placeholder="0" --}} step="0.1" min="0" max="45" required="required" {{-- pattern="^[0-9]+" --}}
                                                        wire:model="Units0{{ $i }}.{{ $courses_full['id'] }}">
                                                    {{-- <p>{{$Unit01s[$courses_full['id']]}}</p> --}}

                                                    {{-- @php
                                                        $cf = $courses_full['id'];
                                                        $Unidadd = "Units0$i.$cf";
                                                       /*  dd($Unidadd); */
                                                    @endphp --}}

                                                    {{-- <span class="text-danger">@error( '"Units0".{{ $i }}".".{{ $courses_full["id"] }}' ) {{ $message }} @enderror</span> --}}
                                                    {{-- <span class="text-danger">@error ('Units0{{ $i }}.{{ $cf }}') {{ $message }} @enderror</span> --}}
                                                    {{-- <span class="text-danger">
                                                        @error ($Unidadd) ERROR @enderror
                                                    </span> --}}



                                                    {{-- <span class="text-danger">@error('name'){{ $message }}@enderror</span> --}}

                                                @endfor

                                                @php
                                                    /* $totalUnidad = $Unit01s[$courses_full['id']]+ */
                                                    $totalUnidad = 0;
                                                    /* $unidades01  = 10;
                                                    $unidades11  = 10; */
                                                    /* $nofull = "si"; */
                                                    $unittss =  [$Units01[$courses_full['id']],$Units02[$courses_full['id']]
                                                                ,$Units03[$courses_full['id']],$Units04[$courses_full['id']]
                                                                ,$Units05[$courses_full['id']],$Units06[$courses_full['id']]
                                                                ,$Units07[$courses_full['id']],$Units08[$courses_full['id']]
                                                                ,$Units09[$courses_full['id']],$Units10[$courses_full['id']]
                                                                ,$Units11[$courses_full['id']],$Units12[$courses_full['id']]
                                                                ,$Units13[$courses_full['id']],$Units14[$courses_full['id']]
                                                                ,$Units15[$courses_full['id']],$Units16[$courses_full['id']]];

                                                    /* dd($unidades); */


                                                    for ($i=0; $i < $unidades+1 ; $i++) {
                                                        if ($unittss[$i]) {
                                                            $totalUnidad = $totalUnidad + $unittss[$i];
                                                            }
                                                        };

                                                    /* $this->totalUnidad = $totalUnidad; */

                                                    /* dd($totalUnidad); */



                                                    /* $totalUnidad = $Units01[$courses_full['id']]+$Units02[$courses_full['id']]+
                                                                   $Units03[$courses_full['id']]+$Units04[$courses_full['id']]+
                                                                   $Units05[$courses_full['id']]+$Units06[$courses_full['id']]+
                                                                   $Units07[$courses_full['id']]+$Units08[$courses_full['id']]+
                                                                   $Units09[$courses_full['id']]+$Units10[$courses_full['id']]+
                                                                   $Units11[$courses_full['id']]+$Units12[$courses_full['id']]+
                                                                   $Units13[$courses_full['id']]+$Units14[$courses_full['id']]+
                                                                   $Units15[$courses_full['id']]+$Units16[$courses_full['id']]; */


                                                    /* dd($this->Unit01S); */
                                                @endphp

                                                {{-- @if ($errors->any())

                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif --}}

                                                <p>TOTAL %: {{$totalUnidad}} </p>

                                                @error ($totalUnidad)
                                                        @php
                                                            $nofull = "NO";
                                                            /* dd($nofull); */
                                                        @endphp
                                                        <P>{{$nofull}}</P>
                                                @enderror

                                        </li>

                                @endforeach



                            </div>

                            </ul>
                        @endforeach

                    </div>




                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de Actividad</label>
                                <input type="text" class="form-control" placeholder="Ingrese el nombre de la actividad" wire:model.defer="name">
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
                    </div> --}}
                </div>
            </div>


            {{-- <div class="card">
                <div class="card-header bg-secondary text-white">Proposito de la Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="body" class="p-r-mute">   </label>
                        <textarea id="body" wire:model="body" class="form-control w-full" placeholder="Indique de manera especifica el proposito de la actividad" rows="6" required></textarea>
                    </div>

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
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="extract01" class="p-r-mute">   </label>
                        <textarea id="extract01" wire:model="extract01" class="form-control" placeholder="Indique de manera especifica los criterios de evaluacion de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract01'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Instrucciones de la Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4"  wire:ignore>
                        <label for="extract02" class="p-r-mute">   </label>
                        <textarea id="extract02" wire:model="extract02" class="form-control" placeholder="Indique de manera especifica las instrucciones de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract02'){{ $message }}@enderror</span>
                </div>
            </div> --}}

            {{-- <script>



                ClassicEditor
                    .create( document.querySelector( '#body' ) )

                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            editor.model.document.on('change:data', () => {
                                @this.set('body', editor.getData());
                            })

                        });
                    })
                    .catch( error => {
                        console.error( error )
                } );

                ClassicEditor
                    .create( document.querySelector( '#extract' ) )

                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            editor.model.document.on('change:data', () => {
                                @this.set('extract', editor.getData());
                            })

                        });
                    })
                    .catch( error => {
                        console.error( error )
                } );

                ClassicEditor
                    .create( document.querySelector( '#extract01' ) )

                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            editor.model.document.on('change:data', () => {
                                @this.set('extract01', editor.getData());
                            })

                        });
                    })
                    .catch( error => {
                        console.error( error )
                } );

                ClassicEditor
                    .create( document.querySelector( '#extract02' ) )

                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            editor.model.document.on('change:data', () => {
                                @this.set('extract02', editor.getData());
                            })

                        });
                    })
                    .catch( error => {
                        console.error( error )
                } );





            </script> --}}


        </div>



        @endif


        {{-- STEP 3 --}}

        @if ($currentStep == 3)


        {{-- <div class="step-three">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 3/3 - Infomacion Final</div>
                <div class="card-body">



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
                                        @endforeach
                                    </select>
                                @endif

                            </div>
                        </div>

                        <div class="col-md-6">
                            <h4>Ponderacion</h4>
                            <div class="form-group">
                                <label for="unit"></label>

                                <input type="number" id="tentacles" name="tentacles"
                                    placeholder="0.00" step="0.01" min="0" max="100" wire:model="eval">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <h4>Unidad</h4>
                            <div class="form-group">

                                <label for="unit"></label>
                                    <select names="unit" wire:model="unit"
                                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                        <option value="" selected>Seleccione la Unidad</option>

                                            <option value="1"> Unidad I</option>
                                            <option value="2"> Unidad II</option>
                                            <option value="3"> Unidad III</option>
                                            <option value="4"> Unidad IV</option>

                                    </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Tipo de Participacion</h4>
                            <div class="form-group">

                                <label for="type"></label>
                                    <select names="type" wire:model="type"
                                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                        <option value="" selected>Seleccione tipo de Participacion</option>

                                            <option value="1">Individual</option>
                                            <option value="2">Grupal</option>
                                            <option value="3">Combinada</option>

                                    </select>

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
                            </script>



                        </div>
                    </div>


                    <div>
                        <input wire:model="status" name="status" type="radio" value="1" /> Borrador

                        <input wire:model="status" name="status" type="radio" value="2" /> Publicado
                    </div>




                </div>
            </div>
        </div> --}}

        <div class="step-one">
            <p>TERCERA PARTE</p>
        </div>

        @endif


        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

           @if ($currentStep == 1)
               <div></div>
           @endif



           @if ($currentStep == 2 || $currentStep == 3 )
               <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Atras</button>
           @endif



           @if ($currentStep == 1 || $currentStep == 2)
               <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Siguiente</button>
           @endif

           @if ($currentStep == 3)
                <button type="submit" class="btn btn-md btn-primary">Crear</button>
           @endif


        </div>

    </form>


</div>

