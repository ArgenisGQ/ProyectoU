<?php

namespace App\Http\Controllers\Activities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ActivityRequest;
use App\Http\Requests\SelectCreateRequest;
use Carbon\Carbon;
use App\Models\Period;
use App\Models\User_course;

/* use Illuminate\Support\Collection; */

class ActivityAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.activities.index')->only('index');
        $this->middleware('can:admin.activities.create')->only('create', 'store');
        $this->middleware('can:admin.activities.edit')->only('edit', 'update');
        $this->middleware('can:admin.activities.destroy')->only('destroy');
        $this->middleware('can:admin.activities.show')->only('show');
        $this->middleware('can:admin.activities.selectcourse')->only('selectcourse');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.activities.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectCourse()
    {
         /* --------------relacion de usuarios con materias---------------- */
        /* $user_courses = User_course::all(); */
        $userActive = auth()->user()->ced;
        $coursesForUser =  User_course::where('ced', $userActive)
                        /* ->where('academic_finish', '<', $today) */
                        /* ->latest() */
                        ->get();
        $courses = $coursesForUser->unique('code');


        /* $sectionForCourseX =  User_course::where('ced', $userActive)
                        ->where('code', $cursos)

                        ->get(); */

        /* return $courses; */
        /* return $sectionForCourseX; */
        /* return $userActive; */
        /* return $coursesForUser; */
        /* --------------------------------------------------------------- */


        return view('admin.activities.selectcourse', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $faculties = Faculty::pluck('name', 'id');

        /* $courses = Course::all(); */

        $activity = Activity::all();

        $evaluations = Evaluation::pluck('name', 'id');

       /*  $activity->academic_start= Carbon::parse('2022-06-02');
        $activity->academic_finish = Carbon::parse('2022-09-27'); */


        /* --------CONTROL DE FECHAS DEL PERIODO------------ */
        $today = today();

        $period_status = Period::where('status', '1')
                        /* ->where('academic_finish', '<', $today) */
                        /* ->latest() */
                        ->first();

        /* $last_period = Period::where('status', '1')
                        ->latest()
                        ->first(); */

        /* return $period_status; */

        $activity->academic_start = $period_status->academic_start;
        $activity->academic_finish = $period_status->academic_finish;

        /* ------------------------------------------------- */

        /* $activity->academic_start= Carbon::parse('2022-06-02');
        $activity->academic_finish = Carbon::parse('2022-09-27'); */

        $activity->lapse_in = $activity->academic_start;
        $activity->lapse_out = $activity->academic_finish;

        /* $academic_start = Carbon::parse('2022-06-02');
        $academic_finish = Carbon::parse('2022-09-27'); */

        $academic_start = $period_status->academic_start;
        $academic_finish = $period_status->academic_finish;

        /* return $activity->academic_finish; */

        /* $academic_start = now()->format('d/m/Y'); */




        /* --------------relacion de usuarios con materias---------------- */
        /* $user_courses = User_course::all(); */



        $userActive = auth()->user()->ced;
        $coursesForUser =  User_course::where('ced', $userActive)
                            ->get();
        $courses = $coursesForUser->unique('code');



        /* $sectionForCourseX =  User_course::where('ced', $userActive)
                        ->where('code', $cursos)

                        ->get(); */

        /* return $request; */
        /* return $sectionForCourseX; */
        /* return $userActive; */
        /* return $coursesForUser; */
        /* --------------------------------------------------------------- */


        return view('admin.activities.create', compact('faculties', 'courses', 
                                                        'activity', 'evaluations',
                                                    'academic_start', 'academic_finish',
                                                    'coursesForUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        /* return Storage::put('posts', $request->file('file')); */
        /* return $request->all(); */

        $activity = Activity::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));

            $activity->image()->create([
                'url' => $url
            ]);
        }

        if($request->courses){
            $activity->courses()->attach($request->courses);
        }

        /* control de fechas */

        /* $activity->cademic_start = $request->academic_start;
        $activity->academic_finish = $request->academic_finish; */

        $activity->lapse_in = $request->lapse_in;
        $activity->lapse_out = $request->lapse_in;

        return redirect()->route('admin.activities.edit', $activity)->with('info', 'La actividad se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        /* return $activity->all(); */






        return view('admin.activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $this->authorize('author', $activity);

        $faculties = Faculty::pluck('name', 'id');

        $courses = Course::all();

        $evaluations = Evaluation::pluck('name', 'id');

        /* --------CONTROL DE FECHAS DEL PERIODO------------ */
        $today = today();

        $period_status = Period::where('status', '1')
                        /* ->where('academic_finish', '<', $today) */
                        /* ->latest() */
                        ->first();

        /* $last_period = Period::where('status', '1')
                        ->latest()
                        ->first(); */

        /* return $period_status; */

        $academic_start = $period_status->academic_start;
        $academic_finish = $period_status->academic_finish;

        /* ------------------------------------------------- */


        /* $activity->academic_start= Carbon::parse('2022-06-02'); */
        /* $activity->academic_finish = Carbon::parse('2022-09-27'); */

        /* $activity = Activity::all(); */

        /* return $activity->lapse_in; */

        return view('admin.activities.edit', compact('activity', 'faculties', /* 'courses', */
                                            'evaluations',
                                            'academic_start', 'academic_finish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, Activity $activity)
    {
        $this->authorize('author', $activity);

        $activity->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));

            if ($activity->image) {
                Storage::delete($activity->image->url);

                $activity->image->update([
                    'url' => $url
                ]);
            }else{
                $activity->image()->create([
                    'url' => $url
                ]);
            }



        }

        if ($request->courses) {
                $activity->courses()->sync($request->courses);
        }


        return redirect()->route('admin.activities.edit', $activity)->with('info', 'La actividad se actualizo con exito');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $this->authorize('author', $activity);

        $activity->delete();

        return redirect()->route('admin.activities.index', $activity)->with('info', 'La actividad se elimino con exito');
    }

}
