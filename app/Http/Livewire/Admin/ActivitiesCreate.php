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
use App\Models\Critery;
use App\Models\Reference;


class ActivitiesCreate extends Component
{


    use WithFileUploads;


    public $courses = [];
    /* public $coursesFull = []; */
    public $coursesForUser = [];
    public $coursess = [];
    public $faculties = [];
    public $evaluations = [];
    public $academic_start, $academic_finish;
    public $userActiveName, $userActiveCed;
    public $userActiveId;
    public $userActive = [];
    public $name;
    public $body, $extract, $extract01, $extract02;
    public $status, $evaluation, $type, $eval, $unit;
    public $lapse_in, $lapse_out;
    public $id_activityLast;
    public $nota_curso, $nota_cursox, $datos_curso = [];
    public $notax = [];
    public $nota_mensaje, $totalPoints;
    public $extract03, $extract04, $instruction;
    public $criteries, $biblio = [];


    /* public $activity; */

    public $totalSteps = 4;
    public $currentStep = 1;
    public $currentCritery = 1;
    public $totalCritery = 20;
    public $currentBiblio = 1;
    public $totalBiblio = 20;



    /* protected $rules = [
        'name' => 'required',
        'extract' => 'required',
        'extract01' => 'required',
        'extract02' => 'required',
        'extract03' => 'required',
        'extract04' => 'required',
        'instruction' => 'required',
        'body' => 'required',
        'lapse_in' => 'required',
        'lapse_out' => 'required',
        'type' => 'required',
        'unit' => 'required',
        'activity_type' => 'required',
        'evaluation' => 'required',
        'status' => 'required',

        'cours' => 'required|array',
        'activityCriteries.*.critery' => 'required',
        'activityCriteries.*.evaluation' => 'required',
        'references.*.title' => 'required',
        'references.*.autor' => 'required',
        'references.*.year' => 'required',
    ]; */



    public function mount(){
        /* $this->currentStep = 1; */
        /* $this->currentCritery = 1; */
        /* $this->courses = $courses; */
        /* $coursesFull = Course::all(); */
        /* dd($coursesFull); */

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
        $courses = $coursesForUser->unique('code') */
        /* ------------------------------------------------------------------ */

        return view('livewire.admin.activities-create');
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

    public function increaseCritery(){
        /* $this->resetErrorBag(); */
        /* $this->validateData(); */

        $this->currentCritery++;

        if($this->currentCritery > $this->totalCritery){
             $this->currentCritery = $this->totalCritery;
        }
    }

    public function decreaseCritery(){
        /* $this->resetErrorBag(); */
        /* $this->validateData(); */

        $this->currentCritery--;

        if($this->currentCritery < 1){
             $this->currentCritery = 1;
        }
    }

    public function increaseBiblio(){
        /* $this->resetErrorBag(); */
        /* $this->validateData(); */

        $this->currentBiblio++;

        if($this->currentBiblio > $this->totalBiblio){
             $this->currentBiblio = $this->totalBiblio;
        }
    }

    public function decreaseBiblio(){
        /* $this->resetErrorBag(); */
        /* $this->validateData(); */

        $this->currentBiblio--;

        if($this->currentBiblio < 1){
             $this->currentBiblio = 1;
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
            $this->status = 1;  //confirma que es PARA EDITAR la actividad, de no ser asi no procede.
            $this->validate([

                'coursess' => 'required',
            ]);
            /* dd($this->currentStep); */
        }
        elseif($this->currentStep == 2){
              $this->validate([
                'name' => 'required',

                /* 'slug' => 'required|unique:activities',  */

                'body' => 'required',
                'extract' => 'required',
                'extract01' => 'required',
                'extract02' => 'required',
                'extract03' => 'required',
                'extract04' => 'required',
                'instruction' => 'required',

                'criteries' => 'required',
                /* 'criteries.nota.*' => 'required', */
                'biblio' => 'required',
                /* 'biblio.autor.*' => 'required', */
                /* 'biblio.anno.*' => 'required', */


                /* 'extract01' => 'required',
                'extract02' => 'required' */
              ]);
              $this->preValidatePoint($this->criteries,$this->currentCritery);
              /* dd($this->currentStep); */
              /* dd('here!!'); */
        }
        elseif($this->currentStep == 1000){
              $this->validate([
                /* 'activity_type' => 'required', */

                /* 'extract01' => 'required',
                'extract02' => 'required' */

                /* 'lapse_in' => 'date|after_or_equal:academic_start',
                'lapse_out' => 'date|before_or_equal:academic_finish' */
              ]);
              /* $this->nota_curso = null; */
              /* $this->preValidatePoint($this->criteries,$this->currentCritery); */
              /* dd('here!!'); */
              /* $this->evaluationUnit($this->eval,$this->unit,$this->courses,4); */
        }
        elseif($this->currentStep == 1000){
            $this->validate([
              /* 'activity_type' => 'required', */

              /* 'extract03' => 'required', */
              /* 'extract04' => 'required' */

              /* 'lapse_in' => 'date|after_or_equal:academic_start',
              'lapse_out' => 'date|before_or_equal:academic_finish' */
            ]);
            /* $this->nota_curso = null; */
            /* dd('here!!'); */
            /* $this->evaluationUnit($this->eval,$this->unit,$this->courses,4); */
        }
        elseif($this->currentStep == 100){
            $this->validate([
              /* 'activity_type' => 'required', */

              /* 'instruction' => 'required', */

              /* 'lapse_in' => 'date|after_or_equal:academic_start',
              'lapse_out' => 'date|before_or_equal:academic_finish' */
            ]);
            /* $this->nota_curso = null; */
            /* dd('here!!'); */
            /* $this->evaluationUnit($this->eval,$this->unit,$this->courses,4); */
        }
        elseif($this->currentStep == 3){
            $this->validate([
              /* 'activity_type' => 'required', */
              'type' => 'required',
              'status' => 'required',
              'eval' => 'required',
              /* 'lapse_in' => 'date|after_or_equal:academic_start',
              'lapse_out' => 'date|before_or_equal:academic_finish' */
            ]);
            /* $this->nota_curso = null; */
            /* dd('here!!'); */
            $this->evaluationUnit($this->eval,$this->unit,$this->courses,4);
        }
        elseif($this->currentStep == 4){
            /* dd('validacion 4'); */
            /* $this->evaluationUnit($this->eval,$this->unit,$this->courses,4); */
        }
    }


    /* public function validateData(){

        if($this->currentStep == 1){
            $this->validate([
                'first_name'=>'required|string',
                'last_name'=>'required|string',
                'gender'=>'required',
                'age'=>'required|digits:2'
            ]);
        }
        elseif($this->currentStep == 2){
              $this->validate([
                 'email'=>'required|email|unique:students',
                 'phone'=>'required',
                 'country'=>'required',
                 'city'=>'required'
              ]);
        }
        elseif($this->currentStep == 3){
              $this->validate([
                  'frameworks'=>'required|array|min:2|max:3'
              ]);
        }
    } */

    /* public function register(){
          $this->resetErrorBag();
          if($this->currentStep == 4){
              $this->validate([
                  'cv'=>'required|mimes:doc,docx,pdf|max:1024',
                  'terms'=>'accepted'
              ]);
          }

          $cv_name = 'CV_'.time().$this->cv->getClientOriginalName();
          $upload_cv = $this->cv->storeAs('students_cvs', $cv_name);

          if($upload_cv){
              $values = array(
                  "first_name"=>$this->first_name,
                  "last_name"=>$this->last_name,
                  "gender"=>$this->gender,
                  "email"=>$this->email,
                  "phone"=>$this->phone,
                  "country"=>$this->country,
                  "city"=>$this->city,
                  "frameworks"=>json_encode($this->frameworks),
                  "description"=>$this->description,
                  "cv"=>$cv_name,
              );

              Student::insert($values);
            //   $this->reset();
            //   $this->currentStep = 1;
            $data = ['name'=>$this->first_name.' '.$this->last_name,'email'=>$this->email];
            return redirect()->route('registration.success', $data);
          }
    } */

    public function edit($id){

            $activity =            Activity::find($id);
            $this->id_activity     =  $activity->id;
            $this->name            =  $activity->name;
            /* $this->name            =  $activity->slug; */
            $this->body            =  $activity->id;
            $this->extract         =  $activity->id;
            $this->extract01       =  $activity->id;
            $this->evaluation      =  $activity->id;
            $this->lapse_in        =  $activity->id;
            $this->lapse_out       =  $activity->id;
            $this->status          =  $activity->id;
            $this->userActiveId    =  $activity->id;



    }

    public function update(){
            /* $this->validate([
                'name' => 'required',
                'description' => 'required',
                'quantity' => 'required',
                'price' => 'required'
            ]); */

            $activity = Activity::find($this->id_activity);
            $activity->update([

                /* 'courses'           => $this->coursess, */
                'name'              => $this->name,
                'slug'              => $this->name,
                'body'              => $this->body,
                'extract'           => $this->extract,
                'extract01'         => $this->extract01,
                'activity_type'     => $this->evaluation,
                'lapse_in'          => $this->lapse_in,
                'lapse_out'         => $this->lapse_out,
                'status'            => $this->status,
                'user_id'           => $this->userActiveId,
                'faculty_id'        => '1',
            ]);

           /*  $this->id_activityLast = Activity::where('user_id', $this->userActiveId)
                                    ->latest('id')
                                    ->first('id'); */

            $this->id_activityLast = $this->id_activity;

            /* dd($this->id_activityLast->id); */
            /* dd($this->coursess[0]); */

            $this->c = count($this->coursess);

            for( $this->i=0;$this->i<$this->c;$this->i++ )
            {
                $activity_courses = Activity_course::update([
                'id_activity'        => $this->id_activityLast->id,
                'id_course'          => $this->coursess[$this->i],
                ]);
            };

            $this->reset();



            return redirect()->route('admin.activities.index')->with('info', 'La actividad se edito con exito');

    }

    public function preValidatePoint($criteries,$currentCritery){
            /* dd($criteries['nota']); */
            $this->totalPoints = 0;
            for ($k=0; $k < $currentCritery; $k++) {
                $this->totalPoints = $this->totalPoints + $criteries['nota'][$k];
            }

            /* dd($this->totalPoints); */

            $this->eval = $this->totalPoints;
    }

    public function evaluationUnit($nota, $unidad, $id_curso, $id_periodo){
            /* dd($this->eval); */
            /* dd($id_curso); */
            /* dd($this->coursess); */
            $this->c = count($this->coursess); //cantidad de cursos del usuario
            /* dd($this->c); */
            /* $activity_courses = Activity_course::where([
                                ['id_course', 1051],
                                ['unit', 1] ])
                                ->get(); */
            $coursessx = Course::all();
            /* dd($coursessx[1051]); */
            /* dd($coursessx[$this->coursess[0]-1]->id); */
            /* dd($coursessx[$this->coursess[0]-1]); */
            /* $c_eval = count($activity_courses);  *///cantidad de notas por curso y unidad
            /* dd($c_eval); */
            /* dd($activity_courses); */
            /* dd($activity_courses[0]->unit); */

            /* dd($totalUnidad); */

            /* $activity_courses */

            $this->nota_mensaje = 0;
            $this->nota_curso = null;
            $this->nota_cursox = null;

            for( $this->i=0;$this->i<$this->c;$this->i++ )
            {
                $activity_courses = Activity_course::where([
                    ['id_course', $coursessx[$this->coursess[$this->i]-1]->id],
                    ['unit', $unidad] ])
                    ->get();
                $c_eval = count($activity_courses); //cantidad de notas por curso y unidad
                /* dd($activity_courses); */
                /* dd($c_eval); */
                $nota = $this->eval;
                /* $this->nota_mensaje = 0; */
                /* $this->nota_curso = null; */
                /* dd($activity_courses[0]->evaluation); */
                /* dd($nota); */
                for ($i=0; $i < $c_eval ; $i++) {
                    $nota = $activity_courses[$i]->evaluation + $nota;
                }
                /* dd($nota); */

                switch ($unidad) {
                    case '1':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit01;
                        break;
                    case '2':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit02;
                        break;
                    case '3':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit03;
                        break;
                    case '4':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit04;
                        break;
                    case '5':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit05;
                        break;
                    case '6':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit06;
                        break;
                    case '7':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit07;
                        break;
                    case '8':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit08;
                        break;
                    case '9':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit09;
                        break;
                    case '10':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit10;
                        break;
                    case '11':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit11;
                        break;
                    case '12':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit12;
                        break;
                    case '13':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit13;
                        break;
                    case '14':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit14;
                        break;
                    case '15':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit15;
                        break;
                    case '16':
                        $totalUnidad = $coursessx[$this->coursess[0]-1]->unit16;
                        break;

                    default:
                        # code...
                        break;
                }

                /* dd($totalUnidad); */

                if ($nota > $totalUnidad) { //ACUMULADOR DE CURSOS QUE SOBRE PASAN LA NOTA MAXimA DE LA UNIDAD
                    /* $this->nota_mensaje = 1; */
                    $this->nota_curso[$this->i] = $coursessx[$this->coursess[$this->i]-1];
                    $this->notax[$this->i] = $totalUnidad - ($nota - $this->eval);
                    /* dd('here!! dont work right'); */
                } else { //ACUMULADOR DE PUNTOS QUE FALTAN POR EVALUAR DE CADA MATERIA
                    $this->nota_cursox[$this->i] = $coursessx[$this->coursess[$this->i]-1];
                    $this->datos_curso[$this->i] = $totalUnidad - $nota;
                }
                /* dd($this->datos_curso); */
                /* dd($this->nota_curso); */
                /* dd($this->nota_mensaje); */


            };

            /* dd($nota); */
            /* dd($this->nota_curso); */

            /* if ( true === ( ($this->nota_curso ?? null ) ) {
                $this->nota_mensaje = 1
            } */

            /* if ( true === ( isset( $this->nota_curso ) ? $this->nota_curso : null ) ) {
                $this->nota_mensaje = 1;
                $this->cc = count ($this->nota_curso);
            } */
            if (isset($this->nota_curso)) {
                $this->nota_mensaje = 1;
                $this->cc = count($this->nota_curso);
            }

            if (isset($this->nota_cursox)) {
                /* $this->nota_mensaje = 1; */
                $this->ccx = count($this->nota_cursox);
            }


            /* dd($this->cc); */
            /* dd($nota); */
            /* dd($this->c); */

            /* dd($this->nota_curso); */
            /* dd($this->nota_mensaje); */

            /* dd($this->ccx); */
            /* dd($this->nota_cursox); */
            /* dd($this->datos_curso); */
            /* dd($this->notax); */


    }

    public function register(){
          $this->resetErrorBag();






            /* $cours = User_course::where('ced',$userActiveName)->get(); */



            /* $period = Period::all();
            $periodName = $period->name; */

            /* $this->lapse_in = Carbon::parse($this->lapse_in)->format('d/m/Y'); */
            /* $this->lapse_in =Carbon::createFromFormat('Y-m-d', $this->lapse_in);
            $this->lapse_out =Carbon::createFromFormat('Y-m-d', $this->lapse_out); */

            $this->lapse_in = Carbon::parse($this->lapse_in);
            $this->lapse_out = Carbon::parse($this->lapse_out);
            /* $this->lapse_out =Carbon::createFromFormat('Y-m-d', $this->lapse_out)->toDateTimeString(); */
            /* dd($this->lapse_in); */
            /* dd($this->coursess); */

            $data = [
                /* 'courses'           => $this->coursess, */
                'name'              => $this->name,
                'slug'              => $this->name,
                'body'              => $this->body,
                'extract'           => $this->extract,
                'extract01'         => $this->extract01,
                'lapse_in'          => $this->lapse_in,
                /* 'lapse_in'          => $this->lapse_in, */
                'lapse_out'         => $this->lapse_out,
                'status'            => $this->status,
                'activity_type'     => $this->evaluation,
                'user_id'           => $this->userActiveId,
            ];

            /* $criteries['nota'][$k]; */
            /* dd($this->criteries); */
            /* $this->cc = count($this->criteries['nota']);
            dd($this->cc); */



            /* if($data){
                            $data['slug'] = 'required|unique:activities,slug,' . $activity->id;
            } */

            /* $acti = Activity::all(); */

            /* dd($data); */


            /* dd($data); */

            /* dd($this->unit); */
            /* dd($this->eval); */



            $activity = Activity::create([
                /* 'courses'           => $this->coursess, */
                'name'              => $this->name,
                'unit'              => $this->unit,
                'slug'              => $this->name,
                'body'              => $this->body,
                'extract'           => $this->extract,
                'extract01'         => $this->extract01,
                'extract02'         => $this->extract02,
                'extract03'         => $this->extract03,
                'extract04'         => $this->extract04,
                'instruction'       => $this->instruction,
                'activity_type'     => $this->evaluation,
                'type'              => $this->type,
                'lapse_in'          => $this->lapse_in,
                'lapse_out'         => $this->lapse_out,
                'status'            => $this->status,
                'evaluation'        => $this->eval,
                'user_id'           => $this->userActiveId,
                'faculty_id'        => '1',

            ]);

            $this->id_activityLast = Activity::where('user_id', $this->userActiveId)
                                    ->latest('id')
                                    ->first('id');
            /* dd($this->id_activityLast->id); */
            /* dd($this->coursess[0]); */
            /* dd($this->coursess); */

            /* dd($this->unit); */
            /* dd($this->eval); */

            $this->c = count($this->coursess);

            for( $this->i=0;$this->i<$this->c;$this->i++ )
            {
                $activity_courses = Activity_course::create([
                    'unit'               => $this->unit,
                    'evaluation'         => $this->eval,
                    'id_activity'        => $this->id_activityLast->id,
                    'id_course'          => $this->coursess[$this->i],
                ]);
            };

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


            /* proceso para los criterios */

            $this->cc = count($this->criteries['nota']);

            for ($j=0; $j < $this->currentCritery; $j++) {
                $critery = Critery::create([
                    'activity_id'                  => $this->id_activityLast->id ,
                    'critery'                      => $this->criteries[$j] ,
                    'evaluation'                   => $this->criteries['nota'][$j] ,
                ]);
            }
            /* $critery = Critery::all(); */
           /*  dd($critery); */



            /* proceso para las referencias bibliograficas */

            $this->cc = count($this->biblio['autor']);

            for ($j=0; $j < $this->currentBiblio; $j++) {
                $critery = Reference::create([
                    'activity_id'                  => $this->id_activityLast->id ,
                    'title'                        => $this->biblio[$j] ,
                    'autor'                        => $this->biblio['autor'][$j] ,
                    'year'                         => $this->biblio['anno'][$j] ,
                ]);
            }

            /* $biblio = Reference::all(); */
            /* dd($biblio); */

            /* return redirect()->route('admin.activities.index')->with('info', 'La actividad se creo con exito'); */
            return redirect()->route('admin.activities.index');


    }
}
