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
    public $Units01,$Units02,$Units03,$Units04,
           $Units05,$Units06,$Units07,$Units08,
           $Units09,$Units10,$Units11,$Units12,
           $Units13,$Units14,$Units15,$Units16 = [];
    public $totalUnidad = [];
    public $totalUnidadd;
    public $totalUnidaddd;
    public $acumulador;
    public $id_cursoss;
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
    public $c;

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
        /* 'totalUnidaddd;' => 'required' */


    ];


    public function mount( Course $coursee, User_course $user_course ){
        $this->currentStep = 1;
        /* $this->totalUnidaddd = $this->totalUnidadd; */
        $user_course = User_course::all();
        $coursee = Course::all();
        /* dd($coursee[1050]->unit01); */
        /* dd($user_course['0']); */
        /* dd($this->userActive->ced); */
        $coursesForUser = $this->coursesForUser;
        $coursesForUser = (object)$coursesForUser;


        /* $coursesForUser =  User_course::where('ced', $this->userActive->ced)
                            ->get(); */

        /* dd($coursesForUser); */

        /* $this->courses = $courses; */
        /* $this->courses_full = $coursee; */
        /* dd($this->courses_full); */
        $courses_ids= $coursesForUser->pluck('id')->toArray();
        /* $courses_ids= $coursee->unitTotal->pluck('id')->toArray(); */
        /* $courses_ids= $activity->courses->pluck('id_course')->toArray(); */
        /* dd($courses_ids); */

        $c= count ($courses_ids);
        $this->c= count ($courses_ids);
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

        /* dd($unitT); */
        /* dd($id_cursos); */

        $this->id_cursoss = $id_cursos;

        /* dd($this->id_cursoss); */

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
            $totalUnidad[$i] = $idd[0]->totalUnidad;
        };

        /* dd($unitT);      */
        /* dd($id_cursos); */
        /* dd($unit01); */

        $this->Units01 = array_combine($id_cursos, $unit01);
        $this->Units03 = array_combine($id_cursos, $unit03);
        $this->Units02 = array_combine($id_cursos, $unit02);
        $this->Units04 = array_combine($id_cursos, $unit04);
        $this->Units05 = array_combine($id_cursos, $unit05);
        $this->Units06 = array_combine($id_cursos, $unit06);
        $this->Units07 = array_combine($id_cursos, $unit07);
        $this->Units08 = array_combine($id_cursos, $unit08);
        $this->Units09 = array_combine($id_cursos, $unit09);
        $this->Units10 = array_combine($id_cursos, $unit10);
        $this->Units11 = array_combine($id_cursos, $unit11);
        $this->Units12 = array_combine($id_cursos, $unit12);
        $this->Units13 = array_combine($id_cursos, $unit13);
        $this->Units14 = array_combine($id_cursos, $unit14);
        $this->Units15 = array_combine($id_cursos, $unit15);
        $this->Units16 = array_combine($id_cursos, $unit16);
        $this->totalUnidad = array_combine($id_cursos, $totalUnidad);

        /* dd($this->Units01); */

        /* dd($coursee[1050]->unit01); */
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



              /* dd($this->c); */

              if ($this->c == 4) {



                /* dd($this->id_cursoss); */

                /* $count = count($this->id_cursoss); */

                /* dd($count); */

                foreach ($this->id_cursoss as $idd) {

                    /* dd($idd); */   /* REVISANDO */
                    /* $unidad01 = $this->courses_full[$idd]->unit01;
                    $unidad02 = $this->courses_full[$idd]->unit02;
                    $unidad03 = $this->courses_full[$idd]->unit03;
                    $unidad04 = $this->courses_full[$idd]->unit04; */
                    /* dd($unidad01); */



                    for ($i=1; $i < $this->c+1 ; $i++) {

                         $this->validate([
                        'Units0'.$i.'.'.$idd =>  'required|integer|between:20,30',
                        /* 'totalUnidad'        =>  'numeric|size:100', */
                        /* 'totalUnidadd'        =>  'numeric|min:100,max:101', */
                        /* 'totalUnidad'        =>  'numeric|digits:100', */
                        /* 'Unit0'.$i.'s.'.$idd =>  'min:20,max:30', */
                        /* 'unit02s.'.$idd =>  'required|integer|between:20,30',
                        'unit03s.'.$idd =>  'required|integer|between:20,30',
                        'unit04s.'.$idd =>  'required|integer|between:20,30' */

                        /* 'Unit01s.'.$idd =>  'required',
                        'unit02s.'.$idd =>  'required',
                        'unit03s.'.$idd =>  'required',
                        'unit04s.'.$idd =>  'required' */
                        ]);
                    }



                };


              };

              if ($this->c > 4) {
                $this->validate([
                    /* 'name' => 'required',
                    'body' => 'required',
                    'extract' => 'required',
                    'extract01' => 'required',
                    'extract02' => 'required' */
                  ]);
              };

              if ($this->c < 4) {
                $this->validate([
                    /* 'name' => 'required',
                    'body' => 'required',
                    'extract' => 'required',
                    'extract01' => 'required',
                    'extract02' => 'required' */
                  ]);
              };

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


        $coursesForUser = $this->coursesForUser;
        $coursesForUser = (object)$coursesForUser;

        /* dd($coursesForUser); */

        $courses_ids= $coursesForUser->pluck('id')->toArray();

        /* dd($courses_ids); */
        /* dd($courses_ids[0]); */
        /* dd($this->coursesTotal[1051]); */

        $this->c= count ($courses_ids);

        /* dd($this->Units01); */

        /* dd($this->courses_full); */

        /* dd($this->Units01[$this->courses_full[1051]]); */

        /* dd($this->Unit01s); */

        /* $this->Unit01s = array_combine($id_cursos, $unit01);
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
        $this->Unit16s = array_combine($id_cursos, $unit16); */


        /* $this->c = count($this->coursesForUser);
        dd($this->c); */


        for( $this->i=0;$this->i<$this->c;$this->i++ )
            {

                /* $coursess_id =  $courses_ids[$this->i]; */ //
                /* $unidadess = $this->coursesTotal[$courses_ids[$this->i]]; */ //

                /* for( $this->j=1;$this->j<$unidadess;$this->j++ )
                    { */

                        $unitss = Course::find($courses_ids[$this->i])
                                    ->update(['unit01' =>$this->Units01[$courses_ids[$this->i]],
                                              'unit02' =>$this->Units02[$courses_ids[$this->i]],
                                              'unit03' =>$this->Units03[$courses_ids[$this->i]],
                                              'unit04' =>$this->Units04[$courses_ids[$this->i]],
                                              'unit05' =>$this->Units05[$courses_ids[$this->i]],
                                              'unit06' =>$this->Units06[$courses_ids[$this->i]],
                                              'unit07' =>$this->Units07[$courses_ids[$this->i]],
                                              'unit08' =>$this->Units08[$courses_ids[$this->i]],
                                              'unit09' =>$this->Units09[$courses_ids[$this->i]],
                                              'unit10' =>$this->Units10[$courses_ids[$this->i]],
                                              'unit11' =>$this->Units11[$courses_ids[$this->i]],
                                              'unit12' =>$this->Units12[$courses_ids[$this->i]],
                                              'unit13' =>$this->Units13[$courses_ids[$this->i]],
                                              'unit14' =>$this->Units14[$courses_ids[$this->i]],
                                              'unit15' =>$this->Units15[$courses_ids[$this->i]],
                                              'unit16' =>$this->Units16[$courses_ids[$this->i]]
                                ]);


                   /*  } */


                /* $up_courses = Course::find($this->coursesForUser[$this->i]->id)
                                    ->update(['unitTotal' =>$this->coursesTotal[$this->coursesForUser[$this->i]->id]]); */

                /* $activity_courses = Activity_course::create([
                    'id_activity'        => $this->id_activityLast->id,
                    'id_course'          => $this->coursess[$this->i],
                ]); */
            };


        /* dd("listo"); */


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
