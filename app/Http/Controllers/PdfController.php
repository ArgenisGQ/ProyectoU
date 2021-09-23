<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Barryvdh\DomPDF\PDF;
class PdfController extends Controller
{
    public function showPdf(Post $post){

        $this->authorize('published', $post);

        /* $users = User::orderBy('id','ASC'); */



        $similares = Post::where('category_id', $post->category_id)
                            ->where('status', 2)
                            ->where('id', '!=', $post->id)
                            ->latest('id')
                            ->take(4)
                            ->get();

        $categoria = Category::where('id', $post->category_id)

                            ->get();

        /* $css_data = '<style>
        '.file_get_contents("./css/bootstrap.min.css").'
        </style>'; */

        $css_data = file_get_contents("./css/bootstrap.min.css");
        $logo = "data:image/png;base64," . base64_encode(file_get_contents("./img/uny_vector_sm.png"));



        return view('posts.pdf.showPdf', compact('post', 'similares', 'categoria', 'css_data', 'logo'));

        /* return $css_data; */

    }

    public function downPdf(Post $post){

        $this->authorize('published', $post);

        /* $users = User::orderBy('id','ASC'); */



        $similares = Post::where('category_id', $post->category_id)
                            ->where('status', 2)
                            ->where('id', '!=', $post->id)
                            ->latest('id')
                            ->take(4)
                            ->get();

        $categoria = Category::where('id', $post->category_id)

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

        return \PDF::loadView('posts.pdf.downPdf', compact('post', 'similares', 'categoria','css_data', 'logo'))
                    ->stream('archivo.pdf', ["Attachment" => false]);

        /* return $css_data; */
    }
}
