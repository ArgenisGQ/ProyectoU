<?php

namespace App\Http\Controllers\Activities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.courses.index')->only('index');
        $this->middleware('can:admin.courses.create')->only('create', 'store');
        $this->middleware('can:admin.courses.edit')->only('edit', 'update');
        $this->middleware('can:admin.courses.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarillo',
            'green' => 'Color verde',
            'blue' => 'Color azul',
            'indigo' => 'Color indigo',
            'purple' => 'Color morado',
            'ping' => 'Color rosado'
        ];

        return view('admin.courses.create',compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:courses,name',


            'code' => 'required|unique:courses,code',
            'section' => 'required|unique:courses,section',
            'turma' => $request->code.' '.$request->section,
            /* 'id_continua' => 'required|unique:courses,id_continua', */
            /* 'id_sima_doc' => 'required|unique:courses,id_sima_doc', */
            /* 'id_continua_doc' => 'required|unique:courses,id_continua_doc', */
            /* 'id_dpto' => 'required|unique:courses,id_dpto', */
            /* 'id_faculty' => 'required|unique:courses,id_faculty', */

            'slug' => 'required|unique:courses,slug',
            /* 'color' => 'required' */
        ]);

        $course = Course::create($request->all());

        $courses = Course::all();

        /* return redirect()->route('admin.courses.edit', compact('course'))->with('info', 'La materia se creo con exito'); */
        return view('admin.courses.index', compact('courses'));
        /* return redirect()->route('admin.courses.index', compact('courses'))->with('info', 'La materia se creo con exito'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarillo',
            'green' => 'Color verde',
            'blue' => 'Color azul',
            'indigo' => 'Color indigo',
            'purple' => 'Color morado',
            'ping' => 'Color rosado'
        ];

        /* return "edit"; */

        return view('admin.courses.edit', compact('course', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Course $course)
    {
        /* return "update"; */

        $request->validate([
            'name' => 'required|unique:courses,name',


            'code' => 'required',
            'section' => 'required',
            'turma' => $request->code.' '.$request->section,
            /* 'id_sima' => 'required|unique:courses,id_sima',
            'id_continua' => 'required|unique:courses,id_continua',
            'id_sima_doc' => 'required|unique:courses,id_sima_doc',
            'id_continua_doc' => 'required|unique:courses,id_continua_doc',
            'id_dpto' => 'required|unique:courses,id_dpto',
            'id_faculty' => 'required|unique:courses,id_faculty', */

            /* 'slug' => "required|unique:courses,slug,$course->id", */
            'slug' => "required|unique:courses,slug",
            'color' => 'required',
        ]);

        /* return "update nivel"; */

        $course->update($request->all());

        $courses = Course::all();

        /* return redirect()->route('admin.courses.edit', $course)->with('info','La materia se actualizo con exito'); */
        return view('admin.courses.index', compact('courses'));
        /* return redirect()->route('admin.courses.index', compact('courses'))->with('info', 'La materia se edito con exito'); */
    }

    /**
     * Remove the specified resource from storage.
     *Course   * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index')->with('info', 'La materia se elimino con exito');
    }
}
