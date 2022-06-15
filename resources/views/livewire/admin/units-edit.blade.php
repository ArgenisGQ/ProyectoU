<div>
    {{-- Do your work, then step back. --}}

    <form wire:submit.prevent="register">

        {{-- STEP 1 --}}

        @if ($currentStep == 1)

        {{-- <div class="step-one">
            <p>PRIMERA PARTE</p>
        </div> --}}

        <div class="step-one">



            <div class="card">
                <div class="card-header">
                    <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o el email del usuario">
                </div>

                @if ($users->count())
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    {{-- <th>Apellido</th> --}}
                                    <th>Documento</th>
                                    {{-- <th>Email</th> --}}
                                    {{-- <th>Id_sima</th> --}}
                                    {{-- <th>Id_continua</th> --}}
                                    {{-- <th>Rol</th> --}}
                                    <th>Seleccion</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        {{-- <td>{{$user->name}}</td> --}}
                                        {{-- <td><a href="{{route('profile.show', $user)}}">
                                            {{$user->name}}
                                        </a></td> --}}
                                        <td><a href="{{route('admin.users.show', $user)}}">
                                            {{$user->userName}}
                                        </a></td>
                                        <td>{{$user->name}}</td>
                                        {{-- <td>{{$user->lastName}}</td> --}}
                                        <td>{{$user->ced}}</td>
                                        {{-- <td>{{$user->email}}</td> --}}
                                        {{-- <td>{{$user->id_sima}}</td> --}}
                                        {{-- <td>{{$user->id_continua}}</td> --}}
                                        {{-- <td>
                                            @if(!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $rolName )
                                                <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                                @endforeach
                                            @endif
                                        </td> --}}
                                        {{-- <td width="10px">
                                            <a href="{{route('admin.users.edit', $user)}}" class="btn btn-primary  btn-sm">Editar</a>
                                        </td> --}}
                                        {{-- <td class="10px">
                                            <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td> --}}
                                        <td>
                                           <input wire:model="usuario" name="usuario" type="radio" value="{{$user->name}}" />
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        {{$users->links()}}
                    </div>
                @else
                    <div class="card-body">
                        <strong>No hay registros</strong>
                    </div>
                @endif

            </div>



            {{-- <div class="card">
                <div class="card-header bg-secondary text-white">Paso 1/3 - Seleccionar Usuario</div>
                <div class="card-body">

                    <div class="w-screen flex-col align-items-left mt-2">



                        @foreach ( $courses as $curso )

                            @php


                                    $cursox = App\Models\User_course::where('name',$userActiveName)
                                                                    ->where('code',$curso['code'])
                                                                    ->get();




                            @endphp

                            <h4> {{ $curso['code'].' '.$curso['course'] }} </h4>
                            <div class="content-start">
                                @foreach ($cursox as $cursoy)
                                        <label for="{{ $cursoy['id'] }}">

                                        @php
                                        $courses_full = App\Models\Course::find($cursoy['id']);

                                        @endphp



                                        {{ $courses_full['section'] }}




                                            <input type="number" id="{{ $courses_full['id']}}" name="{{ $courses_full['id'] }}"
                                                placeholder="4" step="1" min="4" max="8"
                                                wire:model="coursesTotal.{{ $courses_full['id'] }}">
                                            </label>



                                @endforeach
                            </div>
                        @endforeach

                    </div>




                    <span class="text-danger">@error('coursess'){{ $message }}@enderror</span>
                </div>
            </div> --}}
        </div>




        @endif

        {{-- STEP 2 --}}

        @if ($currentStep == 2)


        <div class="step-two">
            {{-- <div class="card">


            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 2/3 - Valor de las unidades</div>

                <div class="card-body">

                    <div class="w-screen flex-col align-items-left mt-2">



                        @foreach ( $courses as $curso )

                            @php


                                    $cursox = App\Models\User_course::where('name',$userActiveName)
                                                                    ->where('code',$curso['code'])
                                                                    ->get();




                            @endphp
                            <ul>
                            <h4> {{ $curso['code'].' '.$curso['course'] }} </h4>

                            <div class="content-start">
                                @foreach ($cursox as $cursoy)
                                        <label for="{{ $cursoy['id'] }}">
                                        <li>
                                        @php
                                            $courses_full = App\Models\Course::find($cursoy['id']);

                                        @endphp

                                        {{ $courses_full['section'] }}



                                            @php
                                                $unidades = $coursesTotal[$cursoy['id']];
                                            @endphp




                                            @for ($i = 1; $i <= $unidades; $i++)

                                                <input type="number" id="{{ $courses_full['id']}}" name="{{ $courses_full['id'] }}"
                                                    placeholder="4" step="1" min="4" max="8"
                                                    wire:model="Unit0{{ $i }}s.{{ $courses_full['id'] }}">

                                            @endfor





                                        </li>

                                @endforeach
                            </div>

                            </ul>
                        @endforeach

                    </div>


                </div>


            </div> --}}

            {{-- <p>{{$user->userName}}</p> --}}
            <p>{{$this->usuario}}</p>
            {{-- <p>{{$userActiveName}}</p> --}}


            <div class="card-header bg-secondary text-white">Paso 2/3 - Seleccion de cantidad de unidades</div>
                <div class="card-body">

                    <div class="w-screen flex-col align-items-left mt-2">

                        @php
                            $coursesForUser =  App\Models\User_course::where('name', $this->usuario)
                                                            ->get();
                            $coursesx = $coursesForUser->unique('code')->toArray();

                            /* dd($coursesForUser); */

                            $this->usuariox = $this->usuario;

                        @endphp



                        @foreach ( $coursesx as $curso )

                            @php


                                    $cursox = App\Models\User_course::where('name',$this->usuario)
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
                                                placeholder="2" step="1" min="1" max="8"
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
            {{-- <p>{{$coursesForUser}}</p> --}}
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
