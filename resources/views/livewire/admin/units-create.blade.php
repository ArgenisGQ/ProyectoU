

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
                <div class="card-header bg-secondary text-white">Paso 2/3 - Valor de las unidades</div>

                <div class="card-body">

                    <div class="w-screen flex-col align-items-left mt-2">


                        @php
                            $this->acumulador = 0;
                        @endphp

                        @foreach ( $courses as $curso )

                            @php

                                    $cursox = App\Models\User_course::where('name',$userActiveName)
                                                                    ->where('code',$curso['code'])
                                                                    ->get();



                                    /* $actividades_curso = App\Models\Activity_course::where([
                                                                    ['id_course', $curso['id'] ],
                                                                    ['unit', 1],
                                                                    ])
                                                                    ->get();

                                    $cuantas = count($actividades_curso);


                                    $actividadesx =  App\Models\Activity::where([
                                                                    ['id', $actividades_curso[0]->id_activity],
                                                                    ['status', 3],
                                                                    ])
                                                                    ->get(); */



                                    /* $actividadesx =  App\Models\Activity::all(); */

                                    /* $actividades_curso = App\Models\Activity_course::all(); */

                                    /* dd($actividades_curso[0]->id_activity); */

                                    /* dd($actividades_curso); */

                                    /* if (isset($actividadesx[0])) {
                                        dd("--existe!--");
                                    }

                                    dd('stop'); */

                                    /* dd($actividadesx[0]->unit); */

                                    /* dd($cursox[0]->id); */

                                    /* dd($curso['id']); */

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

                                                    {{-- <<<<<<< HEAD --}}

                                                    {{-- <input type="number" id="{{ $courses_full['id']}}" name="{{ $courses_full['id'] }}"
                                                        step="0.1" min="0" max="30" required="required" pattern="^[0-9]+"
                                                        wire:model="Unit0{{ $i }}s.{{ $courses_full['id'] }}"> --}}
                                                    {{-- <p>{{$Unit01s[$courses_full['id']]}}</p> --}}
                                                    {{-- <p>"Unit0{{ $i }}s.{{ $courses_full['id'] }}"</p> --}}

                                                    {{-- ======= >>>>>>> b5a5fb027cf8bc0babb9e88e24a498975430656f --}}
                                                    @php
                                                        /* dd( $courses_full); */

                                                        /* dd($curso['id']); */

                                                        $actividades_curso = App\Models\Activity_course::where([
                                                                    ['id_course', $cursoy['id'] ],
                                                                    ['unit', $i],
                                                                    ])
                                                                    ->get();

                                                        /* dd($actividades_curso); */

                                                        $cuantasy = 0;
                                                        $acum = 0;

                                                        if (isset($actividades_curso)) {
                                                            $cuantas = count($actividades_curso);
                                                            /* $cuantas = 0; */
                                                            /* $acum = 0; */
                                                            for ($jk=0; $jk < $cuantas; $jk++) {

                                                                /* $actividadesx =  App\Models\Activity::all();

                                                                dd($actividadesx); */

                                                                $actividadesx[$jk] =  App\Models\Activity::where([
                                                                    ['id', $actividades_curso[$jk]->id_activity],
                                                                    ['status', 2],
                                                                    ['unit', $i],
                                                                    ])
                                                                    ->get();

                                                                /* dd($actividadesx); */

                                                                $acumm = count($actividadesx[$jk]);

                                                                /* dd($acumm); */

                                                                if ($acumm > 0) {
                                                                    $acum = $acum + 1;
                                                                }

                                                            }

                                                        }

                                                        /* dd($acum); */

                                                        $cuantasy = count($actividadesx);
                                                        /* $cuantasy = $i; */

                                                        /* $cuantas = 1; */

                                                        /* dd($cuantas); */

                                                        /* if ($cuantas == 0) {
                                                            $cuantas = 1;
                                                        } */



                                                        /* dd($actividadesx); */

                                                        /* dd(count($actividadesx)); */

                                                        $cuantasx = 0;
                                                        if (isset($actividadesx)) {
                                                            $cuantasx = count($actividadesx);
                                                            $desabilitado = "disabled";
                                                            $actividadesy = $actividadesx;
                                                        } else {
                                                            $cuantasx = 0;
                                                            $desabilitado = "";
                                                            $actividadesy = 0;
                                                        }

                                                        if ($acum > 0) {
                                                            $desabilitado = "disabled";
                                                        } else {
                                                            $desabilitado = "";
                                                        }

                                                    @endphp


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


                                                    {{-- <p>{{$acum}}</p> --}}
                                                    <input type="number" id="{{ $courses_full['id']}}" name="{{ $courses_full['id'] }}"
                                                        {{-- class="text-danger"  --}}class = {{$clase}}
                                                        {{-- placeholder="0" --}} step="0.1" min="0" max="45" required="required"
                                                        {{-- pattern="^[0-9]+" --}} {{$desabilitado}}
                                                        wire:model="Units0{{ $i }}.{{ $courses_full['id'] }}">

                                                    {{-- <p>{{$Unit01s[$courses_full['id']]}}</p> --}}
                                                    {{-- <p>Units0{{ $i }}.{{ $courses_full['id'] }}</p> --}}


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
                                                    $totalUnidadd = 0;
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
                                                            $totalUnidadd = $totalUnidadd + $unittss[$i];
                                                            }
                                                        };

                                                    /* $totalUnidad[$courses_full['id']] = 0; */

                                                    /* $this->totalUnidad = $totalUnidad; */

                                                    /* $total02 = $totalUnidad[$courses_full['id']]; */

                                                    /* dd($totalUnidad[$courses_full['id']]); */



                                                    /* $totalUnidad = $Units01[$courses_full['id']]+$Units02[$courses_full['id']]+
                                                                   $Units03[$courses_full['id']]+$Units04[$courses_full['id']]+
                                                                   $Units05[$courses_full['id']]+$Units06[$courses_full['id']]+
                                                                   $Units07[$courses_full['id']]+$Units08[$courses_full['id']]+
                                                                   $Units09[$courses_full['id']]+$Units10[$courses_full['id']]+
                                                                   $Units11[$courses_full['id']]+$Units12[$courses_full['id']]+
                                                                   $Units13[$courses_full['id']]+$Units14[$courses_full['id']]+
                                                                   $Units15[$courses_full['id']]+$Units16[$courses_full['id']]; */

                                                    /* dd($this->Unit01S); */


                                                    $alerta = '';
                                                    if ($totalUnidadd != 100) {
                                                        $alerta = 'Ajustar los puntos evaluados por unidad';
                                                        $this->acumulador++;
                                                    }
                                                @endphp

                                                <p>TOTAL %: {{$totalUnidadd}}</p>
                                                <p class="text-danger">{{$alerta}}</p>

                                                {{-- <p>
                                                    TOTAL %:
                                                    <input  type="number" id="totalUnidadd" name="totalUnidadd"
                                                            type="hidden"
                                                            placeholder={{$totalUnidadd}}
                                                            disabled
                                                            wire:model="upTotalUnidad({{$totalUnidadd}})">
                                                </p> --}}

                                                {{-- @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $message)
                                                                <li>{{ $message }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif --}}

                                                {{-- @error ($totalUnidad)
                                                        @php
                                                            $nofull = "NO";
                                                            dd($nofull);
                                                        @endphp
                                                        <P>{{$nofull}}</P>
                                                @enderror --}}

                                        </li>

                                @endforeach





                            </div>

                            </ul>
                        @endforeach

                        {{-- <p>ACUMULADOR: {{$this->acumulador}}</p> --}}

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


        </div>





        @endif


        {{-- STEP 3 --}}

        @if ($currentStep == 3)

        <div class="step-three">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 3/3 - Infomacion Final</div>
                <div class="card-body">

                    <div class="row">

                        @foreach ($unitssy as $unitssyy )

                            @php
                                /* dd($id_actividades01[1051]) */
                                $acumuladores = 0;
                            @endphp
                            @if (isset($id_actividades01[$unitssyy->id]) || isset($id_actividades02[$unitssyy->id]) || isset($id_actividades03[$unitssyy->id]) || isset($id_actividades04[$unitssyy->id]) ||
                                 isset($id_actividades05[$unitssyy->id]) || isset($id_actividades06[$unitssyy->id]) || isset($id_actividades07[$unitssyy->id]) || isset($id_actividades08[$unitssyy->id]) ||
                                 isset($id_actividades09[$unitssyy->id]) || isset($id_actividades10[$unitssyy->id]) || isset($id_actividades11[$unitssyy->id]) || isset($id_actividades12[$unitssyy->id]) ||
                                 isset($id_actividades13[$unitssyy->id]) || isset($id_actividades14[$unitssyy->id]) || isset($id_actividades15[$unitssyy->id]) || isset($id_actividades16[$unitssyy->id]))

                                <div class="col-md-12">
                                    <h4>El curso {{$unitssyy->name}} {{$unitssyy->code}} {{$unitssyy->section}}</h4>
                                        <div class="form-group">
                                            @if (isset($id_actividades01[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades01[$unitssyy->id]);
                                                    $acumuladores = $cantidad + $acumuladores;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 1.</p>
                                                @endif
                                            @endif
                                            @if (isset($id_actividades02[$unitssyy->id]))
                                                @php
                                                    /* dd(); */
                                                    $cantidad = count($id_actividades02[$unitssyy->id]);
                                                    /* dd($cantidad); */
                                                    $acumuladores = $acumuladores + $cantidad;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 2.</p>
                                                @endif
                                            @endif
                                            @if (isset($id_actividades03[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades03[$unitssyy->id]);
                                                    $acumuladores = $acumuladores + $cantidad;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 3.</p>
                                                @endif
                                            @endif
                                            @if (isset($id_actividades04[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades04[$unitssyy->id]);
                                                    $acumuladores = $acumuladores + $cantidad;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 4.</p>
                                                @endif
                                            @endif

                                            @if (isset($id_actividades05[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades05[$unitssyy->id]);
                                                    $acumuladores = $cantidad + $acumuladores;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 5.</p>
                                                @endif
                                            @endif
                                            @if (isset($id_actividades06[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades06[$unitssyy->id]);
                                                    $acumuladores = $acumuladores + $cantidad;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 6.</p>
                                                @endif
                                            @endif
                                            @if (isset($id_actividades07[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades07[$unitssyy->id]);
                                                    $acumuladores = $acumuladores + $cantidad;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 7.</p>
                                                @endif
                                            @endif
                                            @if (isset($id_actividades08[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades08[$unitssyy->id]);
                                                    $acumuladores = $acumuladores + $cantidad;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 8.</p>
                                                @endif
                                            @endif

                                            @if (isset($id_actividades09[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades09[$unitssyy->id]);
                                                    $acumuladores = $cantidad + $acumuladores;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 9.</p>
                                                @endif
                                            @endif
                                            @if (isset($id_actividades10[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades10[$unitssyy->id]);
                                                    $acumuladores = $acumuladores + $cantidad;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 10.</p>
                                                @endif
                                            @endif
                                            @if (isset($id_actividades11[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades11[$unitssyy->id]);
                                                    $acumuladores = $acumuladores + $cantidad;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad11.</p>
                                                @endif
                                            @endif
                                            @if (isset($id_actividades12[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades12[$unitssyy->id]);
                                                    $acumuladores = $acumuladores + $cantidad;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 12.</p>
                                                @endif
                                            @endif

                                            @if (isset($id_actividades13[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades13[$unitssyy->id]);
                                                    $acumuladores = $cantidad + $acumuladores;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad13.</p>
                                                @endif
                                            @endif
                                            @if (isset($id_actividades14[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades14[$unitssyy->id]);
                                                    $acumuladores = $acumuladores + $cantidad;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 14.</p>
                                                @endif
                                            @endif
                                            @if (isset($id_actividades15[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades15[$unitssyy->id]);
                                                    $acumuladores = $acumuladores + $cantidad;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 15.</p>
                                                @endif
                                            @endif
                                            @if (isset($id_actividades16[$unitssyy->id]))
                                                @php
                                                    $cantidad = count($id_actividades16[$unitssyy->id]);
                                                    $acumuladores = $acumuladores + $cantidad;
                                                @endphp
                                                @if ($cantidad != 0 )
                                                    <p>Afectara {{$cantidad}} actividades de la Unidad 16.</p>
                                                @endif
                                            @endif

                                            @if ($acumuladores == 0)
                                                    <p>Sin cambios</p>
                                            @endif
                                        </div>
                                </div>

                            @endif

                        @endforeach

                        {{-- ----------------------------------------------------------------------------------------------- --}}

                        @if ($acumulador == 0)

                            <div class="col-md-6">
                                <h4>Listo!</h4>
                                <div class="form-group">
                                    <p>El proceso de ajustar puntacion es adecuado,
                                        pulse "Guardar".</p>
                                </div>
                            </div>

                        @else

                            <div class="col-md-6">
                                <h4>Revisar!</h4>
                                <div class="form-group">
                                    <p>Las notas no estan ajustadas al 100%,
                                        regresar para ajustar,
                                         pulse "Atras".</p>
                                </div>
                            </div>

                        @endif

                        </ul>

                    </div>

                </div>
            </div>
        </div>

        {{-- <div class="step-one"> --}}
            {{-- <p>TERCERA PARTE</p> --}}
            {{-- <p>ACUMULADOR: {{$this->acumulador}}</p> --}}
        {{-- </div> --}}

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

           @if ($currentStep == 3 && $acumulador == 0)
                <button type="submit" class="btn btn-md btn-primary">Crear</button>
           @endif

        </div>

    </form>


</div>

