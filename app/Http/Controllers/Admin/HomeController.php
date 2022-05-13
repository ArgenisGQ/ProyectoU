<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User_course;
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


        return view('admin.index');
    }
}
