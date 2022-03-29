

<div>

    <form wire:submit.prevent="register">

        {{-- STEP 1 --}}

        @if ($currentStep == 1)


        {{-- <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 1/4 - Personal Details</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">First name</label>
                                <input type="text" class="form-control" placeholder="Enter first name" wire:model="first_name">
                               <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="">Last name</label>
                               <input type="text" class="form-control" placeholder="Enter last name" wire:model="last_name">
                               <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                           </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gender</label>
                                <select  class="form-control" wire:model="gender">
                                       <option value="" selected>Choose gender</option>
                                       <option value="male">Male</option>
                                       <option value="female">Female</option>
                                </select>
                                <span class="text-danger">@error('gender'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" class="form-control" placeholder="Enter your age" wire:model="age">
                                <span class="text-danger">@error('age'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" cols="2" rows="2" wire:model="description"></textarea>
                        <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>
        </div> --}}


        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 1/3 - Seleccionar Materias</div>
                <div class="card-body">

                    <div class="d-flex flex-column align-items-left mt-2">

                        @foreach ( $courses as $curso )
                            @php
                                $cursox = App\Models\User_course::where('code',$curso['code'])->get();
                            @endphp
                            <h4> {{ $curso['code'].' '.$curso['course'] }} </h4>
                            <div class="content-start">
                                @foreach ($cursox as $cursoy )
                                        <label for="{{ $cursoy['id'] }}">
                                        {{ $cursoy['section'] }}
                                        {{-- <input type="checkbox" id="{{ $cursoy['id']}}" value="{{ $cursoy['id'] }}" wire:click="<button wire:click="$emitUp('courses')"> --}}
                                        <input type="checkbox" id="{{ $cursoy['id']}}" value="{{ $cursoy['id'] }}"  wire:model="coursess"> {{-- revisar --}}
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
                {{-- <div class="card-header bg-secondary text-white">Paso 2/4 - Datos</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input type="text" class="form-control" placeholder="Enter email address" wire:model="email">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="">Phone</label>
                               <input type="text" class="form-control" placeholder="Enter phone number" wire:model="phone">
                               <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                           </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Country of residence</label>
                                <select class="form-control" wire:model="country">
                                    <option value="" selected>Select country</option>
                                    <option value="United States">United States</option>
                                    <option value="India">India</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Phillipines">Phillipines</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                </select>
                                <span class="text-danger">@error('country'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text" class="form-control" placeholder="Enter city" wire:model="city">
                                <span class="text-danger">@error('city'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 2/3 - Datos</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de Actividad</label>
                                <input type="text" class="form-control" placeholder="Ingrese el nombre de la actividad" wire:model.defer="name">
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
                            <label for="">Nombre del Profesor: {{ $userActiveName }}</label>

                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header bg-secondary text-white">Descripcion de Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4">
                        <label for="body" class="p-r-mute">   </label>
                        <textarea id="body" wire:model="body" class="form-control w-full" placeholder="Indique de manera especifica como realizar la actividad" rows="6" required></textarea>
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
                <div class="card-header bg-secondary text-white">Proposito de la Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4">
                        <label for="extract" class="p-r-mute">   </label>
                        <textarea id="extract" wire:model="extract" class="form-control" placeholder="Indique de manera especifica el proposito de la actividad" rows="6" required></textarea>
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
                    <span class="text-danger">@error('extract'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Criterios de la Evaluacion</div>
                <div class="card-body">
                    <div class = "form-group my-4">
                        <label for="extract01" class="p-r-mute">   </label>
                        <textarea id="extract01" wire:model="extract01" class="form-control" placeholder="Indique de manera especifica los criterios de evaluacion de la actividad" rows="6" required></textarea>
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
                    <span class="text-danger">@error('extract01'){{ $message }}@enderror</span>
                </div>
            </div>


        </div>


        @endif
        {{-- STEP 3 --}}

        {{-- @if ($currentStep == 3)


        <div class="step-three">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 3/4 - Frameworks experience</div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur explicabo, impedit maxime possimus excepturi veniam ut error sit, molestias aliquam repellat eos porro? Sit ex voluptates nemo veritatis delectus quia?
                    <div class="frameworks d-flex flex-column align-items-left mt-2">
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
                    </div>
                    <span class="text-danger">@error('frameworks'){{ $message }}@enderror</span>
                </div>
            </div>
        </div>
        @endif --}}

        {{-- STEP 3 --}}

        @if ($currentStep == 3)


        <div class="step-three">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 3/3 - Infomacion Final</div>
                <div class="card-body">

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

                    {{-- <span class="text-danger">@error('frameworks'){{ $message }}@enderror</span> --}}

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
                                {{-- <span class="text-danger">@error('country'){{ $message }}@enderror</span> --}}
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
                                    <input type="date" name="lapse_out" id="datapicker" class="input-text"
                                    placeholder="{{date('d-m-Y', strtotime($academic_finish))}}"
                                    wire:model="lapse_out">
                                </div>
                                {{-- <a href="#" class="calendar-btn hide-text">View calendar</a> --}}
                                {{-- <p>{{date('d-m-Y', strtotime($academic_finish))}}</p> --}}

                            </div>

                        </div>
                    </div>

                    <div>
                        <input wire:model="status" name="status" type="radio" value="1" /> Borrador
                        <input wire:model="status" name="status" type="radio" value="3" /> Revision
                        <input wire:model="status" name="status" type="radio" value="2" /> Publicado
                    </div>




                </div>
            </div>
        </div>
        @endif


        {{-- STEP 4 --}}

        {{-- @if ($currentStep == 4)

        <div class="step-four">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 4/6 - Proposito de la Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4">
                        <label for="comment" class="p-r-mute">   </label>
                        <textarea id="comment" wire:model="input" class="form-control" placeholder="Indique de manera especifica el proposito de la actividad" rows="6" required></textarea>
                    </div>


                    <span class="text-danger">@error('frameworks'){{ $message }}@enderror</span>
                </div>
            </div>
        </div>
        @endif --}}


        {{-- STEP 5 --}}

        {{-- @if ($currentStep == 5)

        <div class="step-five">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 5/6 - Criterios de la Evaluacion</div>
                <div class="card-body">
                    <div class = "form-group my-4">
                        <label for="comment" class="p-r-mute">   </label>
                        <textarea id="comment" wire:model="input" class="form-control" placeholder="Indique de manera especifica los criterios de evaluacion de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('frameworks'){{ $message }}@enderror</span>
                </div>
            </div>
        </div>
        @endif --}}



        {{-- STEP 4 --}}
      {{--  @if ($currentStep == 4)


        <div class="step-four">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 4/4 - Attachments</div>
                <div class="card-body">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque delectus officia inventore id facere at aspernatur ad corrupti asperiores placeat, fugiat tempora soluta optio recusandae eligendi impedit ipsam ullam amet!
                    <div class="form-group">
                        <label for="cv">CV</label>
                        <input type="file" class="form-control" wire:model="cv">
                        <span class="text-danger">@error('cv'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="terms" class="d-block">
                            <input type="checkbox"  id="terms" wire:model="terms"> You must agree with our <a href="#">Terms and Conditions</a>
                        </label>
                        <span class="text-danger">@error('terms'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>
        </div>

        @endif --}}

        {{-- @if ($currentStep == 6)


        <div class="step-sit">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 6/6 - Asignaciones Finales</div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
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
                    </div>

                    <div class = "mb-4">
                        <label for="name" class="block font-medium text-sm text-gray-700"></label>
                        <input wire:model.lazy = "date" type="text"
                                id = "date"
                                class = "mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg boder border-gray-400 w-full"
                                requered
                                placeholder="DD/MM/YYYY">

                    </div>


                </div>
            </div>
        </div>

        @endif --}}

        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

           @if ($currentStep == 1)
               <div></div>
           @endif

           {{-- @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5 || $currentStep == 6)
               <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
           @endif --}}

           @if ($currentStep == 2 || $currentStep == 3 )
               <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
           @endif

           {{-- @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5)
               <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>

           @endif --}}

           {{-- @if ($currentStep == 6)

           @endif --}}

           @if ($currentStep == 1 || $currentStep == 2)
               <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
           @endif

           @if ($currentStep == 3)
                <button type="submit" class="btn btn-md btn-primary">Submit</button>
           @endif


        </div>

    </form>


</div>
