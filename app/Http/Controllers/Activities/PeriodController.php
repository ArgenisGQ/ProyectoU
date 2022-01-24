<?php

namespace App\Http\Controllers\Activities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Period;
use Carbon\Carbon;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $periods = Period::all();

        return $periods;

        return view ('admin.periods.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $period = Period::all();
        $today = now();  //fecha actual del sistema
        $last_period = $period->max('academic_finish');

        return $last_period;
        return view ('admin.periods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'academic_start' => 'date|after_or_equal:academic_start',
            'academic_finish' => 'date|before_or_equal:academic_finish'
            /* 'slug' => 'required|unique:faculties' */
        ]);
        $period =  Period::create($request->all());

        return redirect()
                    ->route('admin.faculties.edit', $period)
                    ->with('info', 'El periodo se creo con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        //
        return view ('admin.periods.show', compact('period'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        //
        return view('admin.periods.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        //
        $request->validate([
            'name' => 'required',
            /* 'slug' => "required|unique:faculties,slug,$faculty->id" */
        ]);

        $period->update($request->all());

        return redirect()->route('admin.periods.edit', $period)->with('info', 'El periodo se actualizo con exito');

        return view ('admin.periods.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        //
        $period->delete();

        return redirect()
                    ->route('admin.faculties.index')
                    ->with('info', 'El periodo se elemino con exito');
    }
}
