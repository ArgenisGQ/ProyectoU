<?php

namespace App\Http\Controllers\Activities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Faculty;
use App\Models\Course;

class ActivityAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.activities.index')->only('index');
        $this->middleware('can:admin.activities.create')->only('create', 'store');
        $this->middleware('can:admin.activities.edit')->only('edit', 'update');
        $this->middleware('can:admin.activities.destroy')->only('destroy');
        $this->middleware('can:admin.activities.show')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.activities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Faculty::pluck('name', 'id');

        $tags = Course::all();

        return view('admin.activities.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        /* return Storage::put('posts', $request->file('file')); */
        /* return $request->all(); */

        $post = Post::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));

            $post->image()->create([
                'url' => $url
            ]);
        }

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.activities.edit', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $post)
    {
        return view('admin.activities.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('author', $post);

        $categories = Category::pluck('name', 'id');

        $tags = Tag::all();


        return view('admin.activities.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);

        $post->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));

            if ($post->image) {
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url
                ]);
            }else{
                $post->image()->create([
                    'url' => $url
                ]);
            }



        }

        if ($request->tags) {
                $post->tags()->sync($request->tags);
        }


        return redirect()->route('admin.activities.edit', $post)->with('info', 'El post se actualizo con exito');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $post)
    {
        $this->authorize('author', $post);

        $post->delete();

        return redirect()->route('admin.activities.index', $post)->with('info', 'El post se elimino con exito');
    }
}
