<?php

namespace App\Http\Controllers\Activities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Faculty;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ActivityRequest;

class ActivityAdminController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('can:admin.activities.index')->only('index');
        $this->middleware('can:admin.activities.create')->only('create', 'store');
        $this->middleware('can:admin.activities.edit')->only('edit', 'update');
        $this->middleware('can:admin.activities.destroy')->only('destroy');
        $this->middleware('can:admin.activities.show')->only('show'); */
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
        $faculties = Faculty::pluck('name', 'id');

        $courses = Course::all();

        return view('admin.activities.create', compact('faculties', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        /* return Storage::put('posts', $request->file('file')); */
        /* return $request->all(); */

        $activity = Activity::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));

            $activity->image()->create([
                'url' => $url
            ]);
        }

        if($request->courses){
            $activity->courses()->attach($request->courses);
        }

        return redirect()->route('admin.activities.edit', $activity);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $post)
    {
        return view('admin.activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $this->authorize('author', $activity);

        $faculties = Faculty::pluck('name', 'id');

        $courses = Course::all();


        return view('admin.activities.edit', compact('activity', 'faculties', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, Activity $activity)
    {
        $this->authorize('author', $activity);

        $activity->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));

            if ($activity->image) {
                Storage::delete($activity->image->url);

                $activity->image->update([
                    'url' => $url
                ]);
            }else{
                $activity->image()->create([
                    'url' => $url
                ]);
            }



        }

        if ($request->courses) {
                $activity->courses()->sync($request->courses);
        }


        return redirect()->route('admin.activities.edit', $activity)->with('info', 'La actividad se actualizo con exito');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $this->authorize('author', $activity);

        $activity->delete();

        return redirect()->route('admin.activities.index', $activity)->with('info', 'La actividad se elimino con exito');
    }

}
