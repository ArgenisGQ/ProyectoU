<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use App\Models\Activity;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\Evaluation;
use App\Models\Activity_course;
use App\Models\User_course;

class PdfActiController extends Controller
{
    public function showPdf(Activity $activity){

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

        $evaluacion = Evaluation::where('id', $activity->type)

                            ->get();

        $activity_courses = Activity_course::all();

        $coursesThisActivity = Activity_course::where('id_activity', $activity->id)
                            ->get();
                            
        
        $User_courses = User_course::all();
        
        

        
        /* return $User_courses; */
        /* return $coursesThisActivity; */

        /* $css_data = '<style>
        '.file_get_contents("./css/bootstrap.min.css").'
        </style>'; */

        $css_data = file_get_contents("./css/bootstrap.min.css");
        $logo = "data:image/png;base64," . base64_encode(file_get_contents("./img/uny_vector_sm.png"));

        /* control de fechas */

        $today = now();

        $lapse_in = $activity->lapse_in->format('d/m/Y');

        $lapse_out = $activity->lapse_out->format('d/m/Y');

        return view('activities.pdf.showPdf', compact('activity', 'similares', 'evaluacion',
                                                      'facultad', 'css_data', 'logo',
                                                      'today', 'lapse_in', 'lapse_out',
                                                       'coursesThisActivity', 'User_courses'));

        /* return $activity; */

    }

    public function downPdf(Activity $activity){

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

        $curso = $activity->courses()
                           ->latest('id')
                           ->take(1)
                           ->get();

        $evaluacion = Evaluation::where('id', $activity->type)

                           ->get();

        $activity_courses = Activity_course::all();

        $coursesThisActivity = Activity_course::where('id_activity', $activity->id)
                            ->get();
                                               
                           
        $User_courses = User_course::all();



        /* return $curso->first()->code; */

       /*  $activities = $course->activities()->where('status', 2)
                        ->latest('id')
                        ->paginate(4); */

        /* ------  Para crear el CSS en el pdf ------------ */

        /* $css = 'health/css/bootstrap.min.css';
        $data_type = pathinfo($css, PATHINFO_EXTENSION);
        $css_data = file_get_contents($css); */

        /* $css_data = '<style>
                    '.file_get_contents("./css/bootstrap.min.css").'
                      </style>'; */

        $css_data = file_get_contents("./css/bootstrap.min.css");
        $logo = "data:image/png;base64," . base64_encode(file_get_contents("./img/uny_vector_sm.png"));

        /* control de fechas */

        $today = now();

        $lapse_in = $activity->lapse_in->format('d/m/Y');

        $lapse_out = $activity->lapse_out->format('d/m/Y');

        /* ------  Para bajar el archivo pdf ------------ */

        /* $pdf = app('dompdf.wrapper'); */


        /* $pdf = \PDF::loadView('posts.pdf.downPdf', compact('post', 'similares', 'categoria'));

        return $pdf -> download('reporte.pdf'); */




        /* return view('posts.showPdf', compact('post', 'similares', 'categoria','css_data', 'logo')); */

        /* return $post;*/

        $coursesThisActivityX = Activity_course::where('id_activity', $activity->id)
                            ->first()
                            ->get();
        /* return  $coursesThisActivityX; */

        $curso = User_course::where('id', $coursesThisActivityX->first()->id_course)
                            ->get();
        /* return $curso; */

        $code = $curso->first()->code;
        $section = $curso->first()->section;
        $date = $today->format('dmY');

        /* $file_name = "act-$code-$section-$date.pdf"; */
        $file_name = "ACT $code $section $date.pdf";

        /* return $file_name;
 */

        /* -------- Para mostrar el archivo en otra ventana de PDF  -------- */

        return \PDF::loadView('activities.pdf.downPdf', compact('activity', 'similares',
                    'facultad','css_data', 'logo', 'evaluacion',
                    'today', 'lapse_in', 'lapse_out', 'coursesThisActivity', 'User_courses'))
                    ->stream($file_name, ["Attachment" => false]);

        /* return $css_data; */
    }
}
