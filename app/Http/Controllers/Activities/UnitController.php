<?php

namespace App\Http\Controllers\Activities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Period;
use App\Models\User_course;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /* return "index"; */
        /* return view('admin.units.create'); */
        return view('admin.activities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /* return "create"; */



        /* --------------relacion de usuarios con materias---------------- */
        /* $user_courses = User_course::all(); */
        $userActiveName = auth()->user()->name;

        $author = auth()->user();
        $userActiveId = auth()->user()->id;
        $userActiveCed = auth()->user()->ced;
        /* return $userActiveCed; */
        /* return $author; */

        $userActive = auth()->user();
        $coursesForUser =  User_course::where('ced', $userActive->ced)
                            ->get();
        $courses = $coursesForUser->unique('code')->toArray();

        /* return $courses; */
        /* return $coursesForUser; */

        $cursox = User_course::where('ced',$userActiveCed)
                                        ->where('code', 'TIF-0374')
                                        ->get();
        /* return $cursox; */

        /* ----- */

        $courses_full = Course::all();

        /* return $courses_full; */

        /* $courses_fullId= Course::where('code', 'TIF-0374' )
                                ->where('section', 'ED01D1V' )
                                ->get(); */

        $courses_fullId= Course::whereCodeAndSection('TIF-0374', 'ED01D1V' )
                                ->get();

        /* return $courses_fullId; */

        return view('admin.units.create', compact('courses_full','courses','userActiveName','courses_full','coursesForUser','userActive'));

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
        return "store";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unitstotal()
    {
        //
        /* return "unidades"; */

         /* --------------relacion de usuarios con materias---------------- */
        /* $user_courses = User_course::all(); */
        $userActiveName = auth()->user()->name;//cambiar para usuario a buscar las materias

        $author = auth()->user();
        $userActiveId = auth()->user()->id;
        $userActiveCed = auth()->user()->ced;
        /* return $userActiveCed; */
        /* return $author; */

        $userActive = auth()->user();
        $coursesForUserx =  User_course::where('ced', $userActive->ced)  //ABC
                            ->get();
        $courses = $coursesForUserx->unique('code')->toArray();

        /* return $courses; */
        /* return $coursesForUser; */

        $cursox = User_course::where('ced',$userActiveCed)
                                        ->where('code', 'TIF-0374')
                                        ->get();
        /* return $cursox; */

        /* ----- */

        $courses_full = Course::all();

        /* return $courses_full; */

        /* $courses_fullId= Course::where('code', 'TIF-0374' )
                                ->where('section', 'ED01D1V' )
                                ->get(); */

        $courses_fullId= Course::whereCodeAndSection('TIF-0374', 'ED01D1V' )
                                ->get();

        /* return $courses_fullId; */

        return view('admin.units.edit', compact('courses_full','courses','userActiveName','courses_full','coursesForUserx','userActive'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //
        return "editar";

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "destroy";
    }
}
