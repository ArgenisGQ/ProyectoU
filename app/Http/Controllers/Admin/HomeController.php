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

        /* $activities = Activity::where('status',2)
                        ->where('user_id', auth()->user()->id)
                        ->latest()
                        ->paginate(8); */
        $activities = Activity::where('user_id', auth()->user()->id)
                        /* ->where('status',2) */                        
                        ->latest()
                        ->paginate(8);

        $activityCourse = Activity_course::all();

        $coursesForActivity =  User_course::where('ced', $userActive)
                        /* ->where('academic_finish', '<', $today) */
                        /* ->latest() */
                        ->get();

        /* ejemplos para contadores de registros */
        $activityCount = Activity::count(); //contador total de registros en actividades        
        $coursesForUserCount =  User_course::where('ced', $userActive)
                        /* ->where('academic_finish', '<', $today) */
                        /* ->latest() */
                        ->get()
                        ->count();
        /* -------------------------- */
        $coursesCount = $coursesForUser->unique('code')->count();//materias en total por usuario
        $activitiesCount = Activity::where('user_id', auth()->user()->id)
                        ->get()
                        ->count(); //activaides en total creadas
        $activitiesCountPdf = Activity::where('user_id', auth()->user()->id)
                        ->where('status',2)
                        ->get()
                        ->count(); //actividades terminadas (Para pdf)
        


        /* return $coursesForUserCount; */

        /* return $activity_course; */
        /* return $activities; */
        /* return $courses;*/
        /* return $coursesForUser; */
        /* $activities = Activity::where('status',2)->latest()->paginate(8); */


        return view('admin.index', compact('courses', 'activities', 'coursesForUser', 'activityCourse', 'userActive',
                                            'coursesCount', 'activitiesCount', 'activitiesCountPdf'));
    }
}
