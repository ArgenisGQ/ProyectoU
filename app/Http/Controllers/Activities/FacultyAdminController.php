<?php

namespace App\Http\Controllers\Activities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.faculties.index')->only('index');
        $this->middleware('can:admin.faculties.create')->only('create', 'store');
        $this->middleware('can:admin.faculties.edit')->only('edit', 'update');
        $this->middleware('can:admin.faculties.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all();

        return view('admin.faculties.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculties.create');
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
            'name' => 'required',
            'slug' => 'required|unique:faculties'
        ]);
        $faculty =  Faculty::create($request->all());

        return redirect()->route('admin.faculties.edit', $faculty)->with('info', 'La falcultad se creo con exito');
        /* return $request->all(); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        return view('admin.faculties.show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        return view('admin.faculties.edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:faculties,slug,$faculty->id"
        ]);

        $faculty->update($request->all());

        return redirect()->route('admin.faculties.edit', $faculty)->with('info', 'La facultad de actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return redirect()->route('admin.faculties.index')->with('info', 'La facultad se elemino con exito');
    }
}
