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


        /* return $periods; */
        /* return $acad; */

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
        /* $last_period = $period->max('academic_finish'); */
        /* $last_period = $period->id(1)->academic_finish; */
        /* $last_period= Period::all('academic_finish')->max('academic_finish'); */
        /* $last_period = Carbon::parse($last_period)->format('d/m/Y'); */
        /* $last_period = Period::select('academic_finish')->where($last_period,'like','%'.$row['cliente'].'%')->last(); */

        /* $last_period = Period::latest()->first(); */

        /* el 0 para periodo terminado y el 1 para periodo activo */
        $last_period = Period::where('status', '0')
                       ->latest()
                       ->first();

        $last_period = (object)$last_period;


        $start_acad = $last_period->academic_start->addMonths(4);
        $finish_acad = $last_period->academic_finish->addMonths(4);

        /* $start_acad = $start_acad->addMonths(4); */
        /* $finish_acad = $finish_acad->addMonths(4); */


        /* $start_acad = Carbon::parse($start_acad)->format('d/m/Y'); */
        /* $finish_acad = Carbon::parse($finish_acad)->format('d/m/Y'); */


        /* return $last_period; */
        /* return $start_acad.' ----- '. $finish_acad.' ----- '.$today; */

        /* return $last_period.'                          '.$today; */
        return view ('admin.periods.create', compact('period','today',
                                            'finish_acad', 'start_acad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* return $request->all();//para control de entrada de datos a STORE */
        //


        /* $request->academic_start = Carbon::parse($request->academic_start); */
        /* $request->academic_finish = Carbon::parse($request->academic_finish); */

        $academic_start = Carbon::parse($request->academic_start);
        $academic_finish = Carbon::parse($request->academic_finish);

        /* $request->academic_start = (object)$academic_start; */
        /* $request->academic_finish = (object)$academic_finish; */

       /*  $request->academic_start = now(); */
       /*  $request->academic_finish = now(); */

       $request->merge(['academic_start' => $academic_start,
                        'academic_finish' => $academic_finish]);

        /* return $request->academic_start.'     '.$request->academic_finish; */

       /*  return $academic_start .'     '.$academic_finish ; */



        /* return $request->all(); */

        $request->validate([
            'name' => 'required|unique:Periods',
            'academic_start' => 'date|after_or_equal:start_acad',
            'academic_finish' => 'date|before_or_equal:finish_acad'

        ]);

        /* return $request; */

        $period =  Period::create($request->all());



        /* return $period->all(); */   //para control de entrada de datos a STORE

        return redirect()
                    /* ->route('admin.periods.edit', $period) */
                    ->route('admin.periods.index', $period)
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

        /* $this->authorize('status', 1); */

        /* $period = Period::all(); */

        /* return $period->all(); */

        /* $period = Period::all(); */

        $today = now();  //fecha actual del sistema
         /* el 0 para periodo terminado y el 1 para periodo activo */
        $last_period = Period::where('status', '1')
                       ->latest()
                       ->first();

        /* $last_period = (object)$last_period; */

        /* return $last_period->all(); */

        $start_acad = $last_period->academic_start;
        $finish_acad = $last_period->academic_finish;
        $name = $last_period->name;


        /* return $start_acad .'----'.$finish_acad .'----'.$name; */


        return view('admin.periods.edit', compact('period','today',
                                            'finish_acad', 'start_acad','name'));

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
        /* $request->validate([
            'name' => 'required',

        ]);
 */

        /* return $period->all(); */

        /* return $request->all(); */

        $academic_start = Carbon::parse($request->academic_start);
        $academic_finish = Carbon::parse($request->academic_finish);

        $request->merge(['academic_start' => $academic_start,
                        'academic_finish' => $academic_finish]);

        $request->validate([
            /* 'name' => 'required|unique:Periods', */
            'academic_start' => 'date|after_or_equal:start_acad',
            'academic_finish' => 'date|before_or_equal:finish_acad'

        ]);

        /* return $request->all(); */

        $period->update($request->all());

        return redirect()->route('admin.periods.index', $period)->with('info', 'El periodo se actualizo con exito');

        /* return view ('admin.periods.edit'); */
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
                    ->route('admin.periods.index')
                    ->with('info', 'El periodo se elemino con exito');
    }
}
