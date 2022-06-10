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

class UnitsEdit extends Component
{
    use WithFileUploads;


    /* public $courses_full = []; */
    public $courses = [];
    public $userActiveName, $userActiveCed;
    public $unitTotalS = [];
    public $coursess = [];
    public $coursee = []; //
    public $courses_full = [];
    public $coursesForUser = [];
    public $userActive = [];
    public $cour = [];
    public $coursesTotal = [];
    public $Unit01s,$Unit02s,$Unit03s,$Unit04s,
           $Unit05s,$Unit06s,$Unit07s,$Unit08s,
           $Unit09s,$Unit10s,$Unit11s,$Unit12s,
           $Unit13s,$Unit14s,$Unit15s,$Unit16s = [];
    /* public $coursesForUser = [];
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

    protected $rules = [
        /* 'coursee.unitTotal' => 'required', */
       /*  'activity.name' => 'required',
        'activity.extract' => 'required',
        'activity.extract01' => 'required',
        'activity.extract02' => 'required',
        'activity.body' => 'required',
        'activity.lapse_in' => 'required',
        'activity.lapse_out' => 'required',
        'activity.type' => 'required',
        'activity.unit' => 'required',
        'activity.activity_type' => 'required', */
        /* 'activity.evaluation' => 'required', */
        /* 'activity.status' => 'required', */
        /* 'activity.courses' => 'required', */
        /* 'cours' => 'required|array', */


    ];


    public function mount( Course $coursee, User_course $user_course ){
        $this->currentStep = 1;
        $user_course = User_course::all();
        /* dd($user_course['0']); */
        /* dd($this->userActive->ced); */
        /* $coursesForUser = $this->coursesForUser; */
        /* $coursesForUser = (object)$coursesForUser; */


        /* $coursesForUser =  User_course::where('ced', $this->userActive->ced)
                            ->get(); */

        /* dd($coursesForUser['3']); */

        /* $this->courses = $courses; */
        /* $this->courses_full = $coursee; */
        /* dd($this->courses_full); */
        $courses_ids= $this->coursesForUser->pluck('id')->toArray();
        /* $courses_ids= $coursee->unitTotal->pluck('id')->toArray(); */
        /* $courses_ids= $activity->courses->pluck('id_course')->toArray(); */
        /* dd($courses_ids); */

        $c= count ($courses_ids);
        /* dd($c);  */
        /* $cursos = []; */

        for( $i=0;$i<$c;$i++ )
        {
            $idd = Course::where ('id',$courses_ids[$i] )
                            ->get();
            /* dd($idd[$i]->id); */
            /* $this->cour = array_fill_keys($idd[$i]->id, $idd[$i]->unitTotal); */
            /* $this->cour = array_fill_keys($idd[$i]->id, true); */
            /* $ids = array($idd[$i]->id); */
            /* $cursos = []; */
            /* array_push($cursos, $idd[$i]->id ); */
            /* array_push($cursos, $i ); */
            $id_cursos[$i] = $idd[0]->id;
            $unitT[$i] = $idd[0]->unitTotal;


        };

        /* dd($unitT);      */
        /* dd($id_cursos); */

        $this->coursesTotal = array_combine($id_cursos, $unitT);
        /* dd($this->coursesTotal); */

        /* -----------para las unidades------------- */

        /* $c = count ($courses_ids); */
        /* $u = 16; */ //unidades maxima por asignatura
        /* dd($c);  */
        /* $cursos = []; */
        /* $unit = ['unit01','unit02','unit03','unit014',
                'unit05','unit0','unit07','unit08',
                'unit09','unit10','unit11','unit12',
                'unit13','unit14','unit15','unit16']; */


        for( $i=0;$i<$c;$i++ )
        {
            $idd = Course::where ('id', $courses_ids[$i] )
                            ->get();
            $id_cursos[$i] = $idd[0]->id;

            $unit01[$i] = $idd[0]->unit01;
            $unit02[$i] = $idd[0]->unit02;
            $unit03[$i] = $idd[0]->unit03;
            $unit04[$i] = $idd[0]->unit04;
            $unit05[$i] = $idd[0]->unit05;
            $unit06[$i] = $idd[0]->unit06;
            $unit07[$i] = $idd[0]->unit07;
            $unit08[$i] = $idd[0]->unit08;
            $unit09[$i] = $idd[0]->unit09;
            $unit10[$i] = $idd[0]->unit10;
            $unit11[$i] = $idd[0]->unit11;
            $unit12[$i] = $idd[0]->unit12;
            $unit13[$i] = $idd[0]->unit13;
            $unit14[$i] = $idd[0]->unit14;
            $unit15[$i] = $idd[0]->unit15;
            $unit16[$i] = $idd[0]->unit16;

        };

        /* dd($unitT);      */
        /* dd($id_cursos); */

        $this->Unit01s = array_combine($id_cursos, $unit01);
        $this->Unit02s = array_combine($id_cursos, $unit02);
        $this->Unit03s = array_combine($id_cursos, $unit03);
        $this->Unit04s = array_combine($id_cursos, $unit04);
        $this->Unit05s = array_combine($id_cursos, $unit05);
        $this->Unit06s = array_combine($id_cursos, $unit06);
        $this->Unit07s = array_combine($id_cursos, $unit07);
        $this->Unit08s = array_combine($id_cursos, $unit08);
        $this->Unit09s = array_combine($id_cursos, $unit09);
        $this->Unit10s = array_combine($id_cursos, $unit10);
        $this->Unit11s = array_combine($id_cursos, $unit11);
        $this->Unit12s = array_combine($id_cursos, $unit12);
        $this->Unit13s = array_combine($id_cursos, $unit13);
        $this->Unit14s = array_combine($id_cursos, $unit14);
        $this->Unit15s = array_combine($id_cursos, $unit15);
        $this->Unit16s = array_combine($id_cursos, $unit16);

        /* dd($this->Unit16s); */

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
        $courses = $coursesForUser->unique('code'); */
        /* ------------------------------------------------------------------ */

        /* return view('livewire.admin.activities-create'); */
        return view('livewire.admin.units-edit');
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
            /* $this->validate([ */

                /* 'coursess' => 'required', */
            /* ]); */

            /* $this->c = count($this->courses);
            dd($this->c); */


            /* $courses_ids= $this->coursesForUser->pluck('id')->toArray();
            $c= count ($courses_ids);

            for( $i=0;$i<$c;$i++ )
                {
                    $idd = Course::where ('id',$courses_ids[$i] )
                                    ->get();

                    $id_cursos[$i] = $idd[0]->id;
                    $unitT[$i] = $idd[0]->unitTotal;
                };
            $this->coursesTotal = array_combine($id_cursos, $unitT); */

            /* dd($this->coursesTotal['1052']); */

        }
        elseif($this->currentStep == 2){
              /* $this->validate([ */
                /* 'name' => 'required',
                'body' => 'required',
                'extract' => 'required',
                'extract01' => 'required',
                'extract02' => 'required' */
              /* ]); */

        }
        elseif($this->currentStep == 3){
              /* $this->validate([ */
                /* 'activity_type' => 'required',
                'type' => 'required',
                'status' => 'required',
                'eval' => 'required',
                'lapse_in' => 'date|after_or_equal:academic_start',
                'lapse_out' => 'date|before_or_equal:academic_finish' */
              /* ]); */
        }
    }





    public function register(){
        $this->resetErrorBag();

        /* ------------------------ */

        /* dd($this->coursess); */
        /* dd($this->unitTotalS); */




        /* ------------------------ */

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



}
