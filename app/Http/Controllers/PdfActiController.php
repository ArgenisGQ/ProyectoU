<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use App\Models\Activity;
use App\Models\Faculty;

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

        /* $css_data = '<style>
        '.file_get_contents("./css/bootstrap.min.css").'
        </style>'; */

        $css_data = file_get_contents("./css/bootstrap.min.css");
        $logo = "data:image/png;base64," . base64_encode(file_get_contents("./img/uny_vector_sm.png"));



        return view('activities.pdf.showPdf', compact('activity', 'similares', 'facultad', 'css_data', 'logo'));

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

        /* ------  Para crear el CSS en el pdf ------------ */

        /* $css = 'health/css/bootstrap.min.css';
        $data_type = pathinfo($css, PATHINFO_EXTENSION);
        $css_data = file_get_contents($css); */

        /* $css_data = '<style>
                    '.file_get_contents("./css/bootstrap.min.css").'
                      </style>'; */

        $css_data = file_get_contents("./css/bootstrap.min.css");
        $logo = "data:image/png;base64," . base64_encode(file_get_contents("./img/uny_vector_sm.png"));

        /* ------  Para bajar el archivo pdf ------------ */

        /* $pdf = app('dompdf.wrapper'); */


        /* $pdf = \PDF::loadView('posts.pdf.downPdf', compact('post', 'similares', 'categoria'));

        return $pdf -> download('reporte.pdf'); */




        /* return view('posts.showPdf', compact('post', 'similares', 'categoria','css_data', 'logo')); */

        /* return $post;*/

        /* -------- Para mostrar el archivo en otra ventana de PDF  -------- */

        return \PDF::loadView('activities.pdf.downPdf', compact('activity', 'similares', 'facultad','css_data', 'logo'))
                    ->stream('archivo.pdf', ["Attachment" => false]);

        /* return $css_data; */
    }
}
