<?php

namespace App\Http\Controllers\Activities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:activities.index')->only('index');
        /* $this->middleware('can:activities.create')->only('create', 'store');
        $this->middleware('can:activities.edit')->only('edit', 'update');
        $this->middleware('can:activities.destroy')->only('destroy');
        $this->middleware('can:activities.show')->only('show'); */
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('activities.index');
    }
}
