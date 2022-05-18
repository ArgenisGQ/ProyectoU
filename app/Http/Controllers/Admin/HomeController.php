<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User_course;
use App\Models\Activity;
use App\Models\Activity_course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        //INDEX DE DASBOARD

        /* --------------relacion de usuarios con materias---------------- */
        /* $user_courses = User_course::all(); */
        $userActive = auth()->user()->ced;
        $coursesForUser =  User_course::where('ced', $userActive)
                        /* ->where('academic_finish', '<', $today) */
                        /* ->latest() */
                        ->get();
        $courses = $coursesForUser->unique('code');

        $activities = Activity::where('status',2)
                        ->where('user_id', auth()->user()->id)
                        ->latest()
                        ->paginate(8);

        $activity_course = Activity_course::all();

        /* return $activity_course; */
        /* return $activities; */
        /* return $courses;*/
        /* $activities = Activity::where('status',2)->latest()->paginate(8); */


        return view('admin.index', compact('courses', 'activities'));
    }
}
