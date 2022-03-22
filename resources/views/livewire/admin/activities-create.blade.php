<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
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

        @error('couses')
            <br>
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
