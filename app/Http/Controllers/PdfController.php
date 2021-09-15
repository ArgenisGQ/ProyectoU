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

        return view('posts.pdf.showPdf', compact('post', 'similares', 'categoria'));

        /* return $post;*/

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

        $pdf = app('dompdf.wrapper');

        $pdf = \PDF::loadView('posts.pdf.downPdf', compact('post', 'similares', 'categoria'));

        return $pdf -> download('reporte.pdf');

        /* return view('posts.showPdf', compact('post', 'similares', 'categoria')); */

        /* return $post;*/

    }
}
