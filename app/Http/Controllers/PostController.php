<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Psy\Command\WhereamiCommand;
use App\Models\User;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    public function index(){

        /* Aleatorio */
        $posts = Post::where('status',2)
                ->inRandomOrder()
                ->limit(4)
                ->paginate(4)
                /* ->get() */
                ;
        $categoria = Category::all();

        
        /* dd($posts); */
        /* return $posts; */
        /* return $categoria; */

        /* En orden decendente */
        /* $posts = Post::where('status',2)->latest()->paginate(4); */

        /* ---control de fechas--- */
        $today = today();

        return view('posts.index', compact('posts', 'today','categoria'));

    }

    public function show(Post $post){

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

        /* ---control de fechas--- */
        $today = today();

        /* return $post; */

        $created = Carbon::parse($post->created_at)->format('d  M  Y');
        $updated = Carbon::parse($post->updated_at)->format('d  M  Y');

        $ago_days = $today->diffInDays($post->created_at);
        $ago_weeks = $today->diffInWeeks($post->created_at);
        $ago_months = $today->diffInMonths($post->created_at);
        $ago_years = $today->diffInYears($post->created_at);


        /* return $ago_days.'  '.$ago_weeks.'  '.$ago_months.'  '.$ago_years; */

        return view('posts.show', compact('post', 'similares', 'categoria',
                                            'today','created', 'updated'));






        /* return $category_post; */
        /* return $post; */


    }

    public function category(Category $category){
        $posts = Post::where('category_id', $category->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(6);

        return view('posts.category', compact('posts', 'category'));

        /* return $category; */
    }

    public function tag(Tag $tag){
        $posts = $tag->posts()->where('status', 2)
                        ->latest('id')
                        ->paginate(4);
        return view('posts.tag', compact('posts', 'tag'));
    }

}
