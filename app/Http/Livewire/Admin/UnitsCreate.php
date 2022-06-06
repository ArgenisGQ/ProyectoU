<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User_course;
use App\Models\Activity;
use App\Models\Course;
use App\Models\Evaluation;
use App\Models\Period;
use Carbon\Carbon;
use App\Models\Activity_course;

class UnitsCreate extends Component
{
    use WithFileUploads;


    public $courses_full = [];
    /* public $courses = [];
    public $coursesForUser = [];
    public $coursess = [];
    public $faculties = [];
    public $evaluations = [];
    public $academic_start, $academic_finish;
    public $userActiveName, $userActiveCed;
    public $userActiveId;
    public $userActive = [];
    public $unit01,$unit02,$unit03,$unit04;
    public $name;
    public $body, $extract, $extract01, $extract02;
    public $status, $evaluation, $type, $eval, $unit;
    public $lapse_in, $lapse_out;
    public $id_activityLast; */

    /* public $activity; */

    public $totalSteps = 3;
    public $currentStep = 1;


    public function mount(){
        $this->currentStep = 1;
        /* $this->courses = $courses; */

    }


    /* public function render()
    {
        return view('livewire.multi-step-form');
    } */

    public function render()
    {
        /* --------------relacion de usuarios con materias---------------- */
        /* $userActive = auth()->user()->ced;
        $coursesForUser =  User_course::where('ced', $userActive)
                            ->get();
        $courses = $coursesForUser->unique('code') */;
        /* ------------------------------------------------------------------ */

        /* return view('livewire.admin.activities-create'); */
        return view('livewire.admin.units-create');
    }

    public function increaseStep(){
        $this->resetErrorBag();

        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
             $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function courses()
    {
        /* $this->emitUp('courses');//nose */
    }


    public function validateData(){

        /* $activity = $this->route()->parameter('activity'); // caso NULL

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:activities',
            'status' => 'required|in:1,2',
            'file' => 'image',
            'lapse_in' => 'date|after_or_equal:academic_start',
            'lapse_out' => 'date|before_or_equal:academic_finish'
        ];

        if($activity){
            $rules['slug'] = 'required|unique:activities,slug,' . $activity->id;
        }

        if($this->status == 2){
            $rules = array_merge($rules,[
            'faculty_id' => 'required',
            'courses' => 'required',
            'activity_type' => 'required',
            'extract01' => 'required',
            'extract' => 'required',
            'body' => 'required'
            ]);
        }

        return $rules; */

        /* ---------------- */

        if($this->currentStep == 1){
            $this->validate([

                /* 'coursess' => 'required', */
            ]);
        }
        elseif($this->currentStep == 2){
              $this->validate([
                /* 'name' => 'required',
                'body' => 'required',
                'extract' => 'required',
                'extract01' => 'required',
                'extract02' => 'required' */
              ]);
        }
        elseif($this->currentStep == 3){
              $this->validate([
                /* 'activity_type' => 'required',
                'type' => 'required',
                'status' => 'required',
                'eval' => 'required',
                'lapse_in' => 'date|after_or_equal:academic_start',
                'lapse_out' => 'date|before_or_equal:academic_finish' */
              ]);
        }
    }





    public function register(){
          $this->resetErrorBag();






            /* $cours = User_course::where('ced',$userActiveName)->get(); */



            /* $period = Period::all();
            $periodName = $period->name; */

            /* $this->lapse_in = Carbon::parse($this->lapse_in)->format('d/m/Y'); */
            /* $this->lapse_in =Carbon::createFromFormat('Y-m-d', $this->lapse_in);
            $this->lapse_out =Carbon::createFromFormat('Y-m-d', $this->lapse_out); */



            /* $this->lapse_in = Carbon::parse($this->lapse_in);
            $this->lapse_out = Carbon::parse($this->lapse_out); */



            /* $this->lapse_out =Carbon::createFromFormat('Y-m-d', $this->lapse_out)->toDateTimeString(); */
            /* dd($this->lapse_in); */
            /* dd($this->coursess); */

            $data = [
                /* 'courses'           => $this->coursess, */
                /* 'name'              => $this->name, */
                /* 'slug'              => $this->name, */
                /* 'body'              => $this->body, */
                /* 'extract'           => $this->extract, */
                /* 'extract01'         => $this->extract01, */
                /* 'lapse_in'          => $this->lapse_in, */
                /* 'lapse_in'          => $this->lapse_in, */
                /* 'lapse_out'         => $this->lapse_out, */
                /* 'status'            => $this->status, */
                /* 'activity_type'     => $this->evaluation, */
                /* 'user_id'           => $this->userActiveId, */
            ];

            /* if($data){
                            $data['slug'] = 'required|unique:activities,slug,' . $activity->id;
            } */

            /* $acti = Activity::all(); */

            /* dd($data); */


            /* dd($data); */


/*
            $course = Course::create([

                'unit01'              => $this->unit01,
                'unit02'              => $this->unit02,
                'unit03'              => $this->unit03,
                'unit04'              => $this->unit04,


            ]); */



            /* $this->id_activityLast = Activity::where('user_id', $this->userActiveId)
                                    ->latest('id')
                                    ->first('id'); */
            /* dd($this->id_activityLast->id); */
            /* dd($this->coursess[0]); */
            /* dd($this->coursess); */



            /* $this->c = count($this->coursess);

            for( $this->i=0;$this->i<$this->c;$this->i++ )
            {
                $activity_courses = Activity_course::create([
                    'id_activity'        => $this->id_activityLast->id,
                    'id_course'          => $this->coursess[$this->i],
                ]);
            }; */



            /* $activity_courses = Activity_course::create([
                'id_activity'        => $this->id_activityLast,
                'id_course'          => $this->coursess,
            ]); */


            /* $activity = Activity::create($data->all());
            $activity->courses()->attach($courses); */

            /* Student::insert($values);
            //   $this->reset();
            //   $this->currentStep = 1;
            $data = ['name'=>$this->first_name.' '.$this->last_name,'email'=>$this->email]; */
            /* dd($data); */
            /* return redirect()->route('admin.activities.index')->with('info', 'La actividad se creo con exito'); */
            return redirect()->route('admin.units.index');
}
