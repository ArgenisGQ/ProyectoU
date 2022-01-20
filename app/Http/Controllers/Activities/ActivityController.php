<?php

namespace App\Http\Controllers\Activities;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Course;
use App\Models\Faculty;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ActivityController extends Controller
{
    public function index(){

        $activities = Activity::where('status',2)->latest()->paginate(8);
        return view('activities.index', compact('activities'));

    }

    public function show(Activity $activity){

        $this->authorize('published', $activity);

        /* $users = User::orderBy('id','ASC'); */



        $similares = Activity::where('faculty_id', $activity->faculty_id)
                            ->where('status', 2)
                            ->where('id', '!=', $activity->id)
                            ->latest('id')
                            ->take(4)
                            ->get();

        $facultad = Faculty::where('id', $activity->faculty_id)

                            ->get();

        /* control de fechas */

        /* $academic_start = Activity::where('id', $activity->id)

                            ->get($activity->academic_start); */

        $academic_start = Carbon::parse('2021-06-01');
        $academic_finish = Carbon::parse('2021-09-25');;

        $today = now();

        $lapse_in = $activity->lapse_in->format('d/m/Y');

        $lapse_out = $activity->lapse_out->format('d/m/Y');

        /* return $academic_start; */


        return view('activities.show', compact('activity',
                                    'similares', 'facultad',
                                    'today', 'lapse_in', 'lapse_out',
                                    'academic_start', 'academic_finish'));

        /* return $activity; */

        /* return $category_post; */
        /* return $post; */


    }

    public function faculty(Faculty $faculty){
        $activities = Activity::where('faculty_id', $faculty->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(6);

        return view('activities.faculty', compact('activities', 'faculty'));

        /* return $category; */
    }

    public function course(Course $course){
        $activities = $course->activities()->where('status', 2)
                        ->latest('id')
                        ->paginate(4);
        return view('activities.course', compact('activities', 'course'));
    }

}
