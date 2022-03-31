<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <form wire:submit.prevent="updateb">

        {{-- STEP 1 --}}

        @if ($currentStep == 1)




        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 1/3 - Seleccionar Materias</div>
                <div class="card-body">

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
                                        {{ $cursoy['section'] }}
                                        {{-- <input type="checkbox" id="{{ $cursoy['id']}}" value="{{ $cursoy['id'] }}" wire:click="<button wire:click="$emitUp('courses')"> --}}
                                        <input type="checkbox" id="{{ $cursoy['id']}}" value="{{ $cursoy['id'] }}"  wire:model="coursess"> {{--  --}}
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


            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 2/3 - Datos</div>
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
                </div>
            </div>


            <div class="card">
                <div class="card-header bg-secondary text-white">Descripcion de Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4">
                        <label for="body" class="p-r-mute">   </label>
                        <textarea id="body" wire:model="activity.body" placeholder="Indique de manera especifica como realizar la actividad" class="form-control w-full" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('body'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Proposito de la Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4">
                        <label for="extract" class="p-r-mute">   </label>
                        <textarea id="extract" wire:model="activity.extract" class="form-control" placeholder="Indique de manera especifica el proposito de la actividad" rows="6" required></textarea>
                    </div>


                    <span class="text-danger">@error('extract'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Criterios de la Evaluacion</div>
                <div class="card-body">
                    <div class = "form-group my-4">
                        <label for="extract01" class="p-r-mute">   </label>
                        <textarea id="extract01" wire:model="activity.extract01" class="form-control" placeholder="Indique de manera especifica los criterios de evaluacion de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract01'){{ $message }}@enderror</span>
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

                                        <select names="evaluation" wire:model="activity.evaluation"
                                        class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                            <option value="{{ $activity->type }}" selected>{{ $activity->type }}</option>
                                            {{-- @foreach ($evaluations as $evaluation)
                                                <option value="{{ $evaluation['id'] }}">{{ $evaluation['name'] }}</option>
                                            @endforeach --}}
                                        </select>
                                @endif
                                <p>{{$activity->type}}</p>
                                {{-- <span class="text-danger">@error('evaluation'){{ $message }}@enderror</span> --}}
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4>Periodo de la Actividad</h4>
                        <div class="dates-wrapper group">

                            <div class="field clearfix date-range-start date-wrapper">
                                <div class="label">
                                <label for="lapse_in">Inicio de actividad:</label>
                                </div>
                                <div class="input">
                                    <input type="date" name="lapse_in" id="datapicker" class="input-text"
                                    placeholder="{{date('d-m-Y', strtotime($academic_start))}}"
                                    wire:model="activity.lapse_in">
                                </div>
                                {{-- <a href="#" class="calendar-btn calendar-start hide-text">View calendar</a>--}}
                                {{-- <p>{{date('d-m-Y', strtotime($academic_start))}}</p> --}}
                            </div>

                            <div class="field clearfix date-range-start date-wrapper">
                                <div class="label">
                                <label for="lapse_out">Final de actividad:</label>
                                </div>
                                <div class="input">
                                    <input type="date" name="lapse_out" id="datapicker" class="input-text"
                                    placeholder="{{date('d-m-Y', strtotime($academic_finish))}}"
                                    wire:model="activity.lapse_out">
                                </div>
                                {{-- <a href="#" class="calendar-btn hide-text">View calendar</a> --}}
                                {{-- <p>{{date('d-m-Y', strtotime($academic_finish))}}</p> --}}

                            </div>

                        </div>
                    </div>

                    <div>
                        <input wire:model="activity.status" name="status" type="radio" value="1" /> Borrador
                        <input wire:model="activity.status" name="status" type="radio" value="3" /> Revision
                        <input wire:model="activity.status" name="status" type="radio" value="2" /> Publicado
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

           @if ($currentStep == 2 || $currentStep == 3 )
               <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Devolver</button>
           @endif

           {{-- @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5)
               <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>

           @endif --}}

           {{-- @if ($currentStep == 6)

           @endif --}}

           @if ($currentStep == 1 || $currentStep == 2)
               <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Siguiente</button>
           @endif

           @if ($currentStep == 3)
                <button type="submit" class="btn btn-md btn-primary">Editar</button>
           @endif


        </div>

    </form>

</div>
