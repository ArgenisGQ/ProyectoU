<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Psy\Command\WhereamiCommand;
use App\Models\User;

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

        /* $posts = Post::whereHas('status', function ($query) {
                $query->where('status', '=', '2');})
                ->orderByRaw("RAND()")
                ->limit(4);
 */
        /* dd($posts); */
        /* return $posts; */

        /* En orden decendente */
        /* $posts = Post::where('status',2)->latest()->paginate(4); */

        return view('posts.index', compact('posts'));

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

        return view('posts.show', compact('post', 'similares', 'categoria'));






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
