@extends('adminlte::page')

@section('title', 'Proyecto U')

@section('content_header')
    {{-- <a href="{{route('admin.activities.create')}}" class="float-right btn btn-secondary btn-sm">Nueva Actividad</a> --}}

    <h1>UNIDADES</h1>
@stop

@section('content')

        @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
        @endif

        <div class="card">

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Unidad</th>
                            <th>Nombre</th>
                            <th>Ponderacion</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>

                            <tr>
                                <td>I</td>
                                <td>UNIDAD I</td>
                                <td>20 AL 30</td>
                                <td width="10px">
                                    --
                                   {{--  @can('admin.roles.edit') --}}
                                       {{--  <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary btn-sm">Editar</a> --}}
                                    {{-- @endcan --}}

                                </td>
                                <td width="10px">
                                    --
                                    {{-- @can('admin.roles.destroy') --}}
                                        {{-- <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form> --}}
                                    {{-- @endcan --}}
                                </td>
                            </tr>

                            <tr>
                                <td>II</td>
                                <td>UNIDAD II</td>
                                <td>20 AL 30</td>
                                <td width="10px">
                                    --
                                   {{--  @can('admin.roles.edit') --}}
                                       {{--  <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary btn-sm">Editar</a> --}}
                                    {{-- @endcan --}}

                                </td>
                                <td width="10px">
                                    --
                                    {{-- @can('admin.roles.destroy') --}}
                                        {{-- <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form> --}}
                                    {{-- @endcan --}}
                                </td>
                            </tr>

                            <tr>
                                <td>III</td>
                                <td>
                                    <input type="text" name="fuel" class="form-control"/>

                                    <span class="text-danger">@error('extract01'){{ $message }}@enderror</span></td>
                                <td>
                                    <input type="number" step="any"  name="fuel" class="form-control"/>
                                </td>
                                <td width="10px">
                                    --
                                   {{--  @can('admin.roles.edit') --}}
                                       {{--  <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary btn-sm">Editar</a> --}}
                                    {{-- @endcan --}}

                                </td>
                                <td width="10px">
                                    --
                                    {{-- @can('admin.roles.destroy') --}}
                                        {{-- <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form> --}}
                                    {{-- @endcan --}}
                                </td>
                            </tr>

                            <tr>
                                <td>IV</td>
                                <td>
                                    <div class="form-group">
                                        {{-- {!! Form::label('name', 'Nombre') !!} --}}
                                        {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la Unidad']) !!}

                                        @error('name')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        {{-- {!! Form::label('name', 'Nombre') !!} --}}
                                        {!! Form::number('name', null, ['class'=>'form-control','placeholder'=>'del 20% al 30%','step'=>'any']) !!}

                                        @error('name')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </td>
                                <td width="10px">
                                    --
                                   {{--  @can('admin.roles.edit') --}}
                                       {{--  <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary btn-sm">Editar</a> --}}
                                    {{-- @endcan --}}

                                </td>
                                <td width="10px">
                                    --
                                    {{-- @can('admin.roles.destroy') --}}
                                        {{-- <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form> --}}
                                    {{-- @endcan --}}
                                </td>
                            </tr>

                    </tbody>
                </table>

                <div class="form-group">
                    <p class="font-weight-bold">Materias</p>


                    @foreach ( $courses as $curso )

                        @php
                            $cursoo = (object) $curso;

                            $cursox = App\Models\User_course::where('code',$cursoo->code)->get();


                        @endphp

                        <dt>{{ $cursoo->code.' '.$cursoo->course }} </dt>

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


                    @error('courses')
                        <br>
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del Usuario']) !!}

            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
