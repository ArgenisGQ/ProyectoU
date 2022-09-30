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


class ActivitiesEdit extends Component
{
    use WithFileUploads;

    /* public $first_name;
    public $last_name;
    public $gender;
    public $age;
    public $description;
    public $email;
    public $phone;
    public $country;
    public $city;
    public $frameworks = [];
    public $cv;
    public $terms; */

    /* public $activityx; */
    /* public Activity $activityx; */
    public $id_activity;
    public $activity;
    public $activity_course;
    /* public Activity_course $activity_course; */

    public $courses = [];
    public $coursesForUser = [];
    public $coursess = [];
    public $coursessz = [];
    public $cour = [];
    public $faculties = [];
    public $evaluations = [];
    public $academic_start, $academic_finish;
    public $userActiveName, $userActiveCed;
    public $userActiveId;
    public $userActive = [];
    public $name;
    public $body, $extract, $extract01,$extract02;
    public $status, $evaluation,$stake,$eval ,$unit ;
    public $notax = [];
    public $lapse_in, $lapse_out;
    public $id_activityLast;
    public $nota_curso, $nota_cursox, $datos_curso = [];
    public $nota_mensaje, $totalPoints;
    public $extract03, $extract04, $instruction;
    public $criteries, $biblio = [];
    public $activityCriteries, $activitiyCrit = [];
    public $cx, $cc;
    public $references = [];
    /* public $biblio = []; */

    public $totalSteps = 4;
    public $currentStep = 1;
    public $currentCritery;
    public $totalCritery = 20;
    public $currentBiblio = 1;
    public $totalBiblio = 20;

    protected $rules = [
        'activity.name' => 'required',
        'activity.extract' => 'required',
        'activity.extract01' => 'required',
        'activity.extract02' => 'required',
        'activity.extract03' => 'required',
        'activity.extract04' => 'required',
        'activity.instruction' => 'required',
        'activity.body' => 'required',
        'activity.lapse_in' => 'required',
        'activity.lapse_out' => 'required',
        'activity.type' => 'required',
        'activity.unit' => 'required',
        'activity.activity_type' => 'required',
        'activity.evaluation' => 'required',
        'activity.status' => 'required',

        'cours' => 'required|array',
        'activityCriteries.*.critery' => 'required',
        'activityCriteries.*.evaluation' => 'required',
        'references.*.title' => 'required',
        'references.*.autor' => 'required',
        'references.*.year' => 'required',


    ];



    /* public function mount($activityx){ */
    /* public function mount(){ */
    public function mount(Activity $activity, /* Critery $criteries */){
        $this->currentStep = 1;
        /* $this->currentCritery = $this->cx; */
        $this->activity = $activity;
        /* $this->activityCriteries = $criteries; */

        /* dd($this->activity->evaluation); */
        /* dd($this->id_activity); */
        /* $criteries = Critery::all(); */
        /* dd($criteries); */
        /* dd($critery); */
        /* $this->criteries = $criteries->activity_id; */
        /* dd($this->criteries); */

        $this->activityCriteries = new Critery;

        $this->activityCriteries = Critery::where(
                                     'activity_id', $this->id_activity
                                    )->get();

        $this->references = new Reference;

        $this->references = Reference::where(
                                     'activity_id', $this->id_activity
                                    )->get();

        /* dd($this->activityCriteries); */
        /* $this->activitiyCrit = (array)$this->activityCriteries; */
        /* dd($this->activitiyCrit); */
        $this->cx = count($this->activityCriteries);
        $this->currentCritery = $this->cx;

        $this->cy = count($this->references);
        $this->currentBiblio = $this->cy;
        /* dd($this->cx); */






        /* $this->activity_course = $activity_course;
        dd($activity_course); */
        /* dd($activity); */
        /* dd($courses); */
        /* $this->id_activity = $activity->id;
        $this->id_activity = $id_activity; */
        /* $this->id_activity = 2; */
        /* $this->name = $activity->name; */
        /* $this->courses = $courses; */

        // get an array of ids
        $courses_ids= $activity->courses->pluck('id_course')->toArray();
        /* $courses_ids= $activity->courses->pluck('id')->toArray(); */
        /* $courses_ids= $activity->courses; */
        /* dd($courses_ids); */
		//  ---- PREFILL!!! ----
		// use the ids as the keys
		// fill the values with true so all the checkboxes are checked
		$this->cour = array_fill_keys($courses_ids, true);
        /* $this->cour = array_fill_keys($id, true); */
        /* dd($this->cour); */

        // set the many stuff for the loop
		$this->coursessz= $activity->courses;
         /* dd($this->coursess); */
        /* $this->lapse_in = $activity->lapse_in;
        $this->lapse_out = $activity->lapse_out; */
        /* dd($this->lapse_in); */
        $this->lapse_in = Carbon::parse($activity->lapse_in)->format('d-m-Y');
        /* dd($this->lapse_in); */
        $this->lapse_out = Carbon::parse($activity->lapse_out)->format('d-m-Y');
        /* $this->lapse_out = Carbon::parse($activity->lapse_out); */
        /* dd($this->lapse_out); */

    }

    public function render()
    {
        return view('livewire.admin.activities-edit');
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



        if($this->currentStep == 1){
            $valid = 0;
            foreach ($this->cour as $course) {
                if ($course) {
                    $valid = 1 + $valid;
                }
            }
            /* dd($valid); */
            if ($valid == 0) {
                $this->cour = [];
            }
            /* dd($this->cour); */
            $this->validate([

                'cour' => 'required',
            ]);
        }
        elseif($this->currentStep == 2){
              $this->validate([
                'activity.name' => 'required',
                /* 'slug' => 'required|unique:activities',  */
                'activity.body' => 'required',
                'activity.extract' => 'required',
                'activity.extract01' => 'required',
                'activity.extract02' => 'required',
                'activity.extract03' => 'required',
                'activity.extract04' => 'required',
                'activity.instruction' => 'required',

                /* 'criteries' => 'required', */
                /* 'biblio' => 'required', */

                'activityCriteries' => 'required',
                'references' => 'required',


              ]);
              $this->preValidatePoint($this->criteries,$this->activityCriteries,$this->currentCritery);

        }
        elseif($this->currentStep == 3){
              $this->validate([
                'activity.activity_type' => 'required',
                /* 'activity.lapse_in' => 'date|after_or_equal:academic_start', */
                /* 'activity.lapse_out' => 'date|before_or_equal:academic_finish', */
                /* 'evaluation' => 'required', */
                'activity.type' => 'required',
                /* 'activity.status' => 'required', */
                /* 'activity.eval' => 'required', */
                'activity.evaluation' => 'required',
                'activity.unit' => 'required',
              ]);
              $this->evaluationUnit($this->activity->evaluation,$this->activity->unit,$this->courses,4);
        }
    }



        public function edit($id_activity){

            $activity =            Activity::find($id_activity);
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



        public function updateb(){

            /* dd($this->activity->status); */

            if ($this->activity->status == 2) {
                return redirect()->route('admin.activities.index'); //validacion para evitar que las activiades con PUBLICACION activos no puedan editar.
            }

            /* dd($this->activityCriteries); */

            $this->activity->save();
            /* $this->activityCriteries->save(); */



            /* $this->id_activityLast = Activity::where('user_id', $this->userActiveId)
                                    ->latest('id')
                                    ->first('id'); */

            $this->id_activityLast = $this->id_activity;

            /* dd($this->lapse_in); */

            $this->lapse_in = Carbon::parse($this->lapse_in);
            $this->lapse_out = Carbon::parse($this->lapse_out);

            /* dd($this->lapse_in); */



            $activity = Activity::find($this->id_activity);
                $activity->update([
                    'lapse_in'          => $this->lapse_in,
                    'lapse_out'         => $this->lapse_out,
                ]);


            /* dd($activity); */

            /* dd($this->id_activityLast); */
            /* dd($this->coursess[0]); */
            /* dd($this->coursess); */
            /*   */
            /* $this->cour->save(); */

            /* dd($this->cour); */

           /*  --------------- */
           /* dd($this->$activity_courses); */
           /* dd($this->cour); */

           $cursoByUser = User_course::where('name',$this->userActiveName)
                    /* ->where('code',$curso['code']) */
                    ->get();

            /* dd($cursoByUser); */
            $courObj = (object)$this->cour;
            /* $courObj2 = $courObj; */
            /* dd($courObj); */


            /* foreach ($cursoByUser as $key => $value) { */
            foreach ($cursoByUser as $cursoz) {

                $id_cours = $cursoz->id;


                /* $id_cours = '1052'; */
                $indice = array_key_exists($id_cours,$this->cour);

                /* dd($indice); */

                if ($indice) {
                    if ( $this->cour[$id_cours]) {
                        $test = 'SI';
                        $activity_courses = Activity_course::create([
                            'id_activity'        => $this->id_activityLast,
                            'id_course'          => $id_cours,
                        ]);
                    } else {
                        $test = 'NO';
                        $activity_courses = Activity_course::where([
                                        ['id_activity', $this->id_activityLast],
                                        ['id_course', $id_cours],
                                        ])
                                        ->delete();
                    };
                } else {
                    $test = 'NO LIST';
                };
                /* dd($test); */
                /* dd($activity_courses); */

                /* dd($id_cours); */

                /* if ($this->cour[$id_cours]) { */

                /* dd($test); */


                /* $activity_courses = Activity_course::where('id_activity', $this->id_activityLast )
                                        ->where('id_course', $cursoz->id)
                                        ->update(
                                            [
                                                'id_activity' => $this->id_activityLast,
                                                'id_course'   => $this->coursess[$this->i],
                                            ]
                                        );




                $this->c = count($this->cour);

                for( $this->i=0;$this->i<$this->c;$this->i++ )
                    {
                        $activity_courses = Activity_course::where('id_activity', $this->id_activityLast )
                                        ->where('id_course', $cursoz->id)
                                        ->update(
                                            [
                                                'id_activity' => $this->id_activityLast,
                                                'id_course'   => $this->coursess[$this->i],
                                            ]
                                        );
                    }; */

            }


           /* $this->c = count($this->cour);

           for( $this->i=0;$this->i<$this->c;$this->i++ )
            {
                $activity_courses = Activity_course::where('id_activity', $this->id_activityLast )
                                ->where('id_course', $this->cour)->pluck('id_course');




                $activity_courses = Activity_course::where('id_activity', $this->id_activityLast )
                                ->where('id_course', $this->cour[$this->i])
                                ->update(
                                    [
                                        'id_activity' => $this->id_activityLast,
                                        'id_course'   => $this->coursess[$this->i],
                                    ]
                                );
            }; */

           /*  --------------- */

            /* $data = [
                'id_activity' => $this->id_activityLast,
                'id_course'   => $this->coursess,
            ]; */

            /* dd($this->cour); */

            /* $this->c = count($this->cour);
            $activity_courses = Activity_course::where('id_course', $this->cour)->pluck('id_course');
            dd($this->$activity_courses); */


            /* for( $this->i=0;$this->i<$this->c;$this->i++ )
            {
                $activity_courses = Activity_course::where('id', $this->cour[$this->i])->update(

                    [
                        'id_activity' => $this->id_activityLast,
                        'id_course'   => $this->coursess[$this->i],
                    ]
                );
            }; */



           /*  $this->c = count($this->coursess);

            for( $this->i=0;$this->i<$this->c;$this->i++ )
            {
                $activity_courses = Activity_course::update([
                'id_activity'        => $this->id_activityLast->id,
                'id_course'          => $this->coursess[$this->i],
                ]);
            }; */



            /* proceso para los criterios */

            if ($activity->activity_type == 1 || $activity->activity_type == 2) {
                /* dd('hereee!!'); */

                if (isset($this->activityCriteries)) {
                    $this->cc = count($this->activityCriteries);
                    if ($this->currentCritery == $this->cc) {
                        for ($j=0; $j < $this->cc; $j++) {
                            $critery = Critery::find($this->activityCriteries[$j]->id);
                            $critery->update([
                                'critery'                      => $this->activityCriteries[$j]->critery ,
                                'evaluation'                   => 0 ,
                            ]);
                        }
                    }
                    if ($this->currentCritery < $this->cc) {
                        for ($j=0; $j < $this->cc - $this->currentCritery; $j++) {
                            $critery = Critery::find($this->activityCriteries[$j]->id);
                            $critery->update([
                                'critery'                      => $this->activityCriteries[$j]->critery ,
                                'evaluation'                   => 0 ,
                            ]);
                        }
                        for ($i= $this->currentCritery; $i < $this->cc; $i++) {
                            $critery = Critery::find($this->activityCriteries[$i]->id);
                            $critery->delete();
                        }
                    }
                }

                if (isset($this->criteries['nota'])) {
                    $this->ccx = count($this->criteries['nota']);
                    for ($j=$this->cc; $j < $this->cc + $this->ccx; $j++) {
                        $critery = Critery::create([
                            'activity_id'                  => $this->id_activityLast ,
                            'critery'                      => $this->criteries[$j] ,
                            'evaluation'                   => 0,
                        ]);
                    }
                }

            } else {

                if (isset($this->activityCriteries)) {

                    /* dd($this->activityCriteries[1]->id); */

                    /* dd($this->currentCritery); */

                    $this->cc = count($this->activityCriteries);

                    /* dd($this->cc); */

                    if ($this->currentCritery == $this->cc) {
                        for ($j=0; $j < $this->cc; $j++) {

                            $critery = Critery::find($this->activityCriteries[$j]->id);
                            $critery->update([
                                /* 'activity_id'                  => $this->id_activityLast->id , */
                                'critery'                      => $this->activityCriteries[$j]->critery ,
                                'evaluation'                   => $this->activityCriteries[$j]->evaluation ,
                            ]);
                            /* $critery = Critery::update([
                                'activity_id'                  => $this->id_activityLast->id ,
                                'critery'                      => $this->criteries[$j] ,
                                'evaluation'                   => $this->criteries['nota'][$j] ,
                            ]); */
                        }
                    }

                    if ($this->currentCritery < $this->cc) {

                        /* dd('here!!!'); */

                        /* if (isset()) {

                        } */

                        for ($j=0; $j < $this->cc - $this->currentCritery; $j++) {



                            $critery = Critery::find($this->activityCriteries[$j]->id);
                            $critery->update([
                                /* 'activity_id'                  => $this->id_activityLast->id , */
                                'critery'                      => $this->activityCriteries[$j]->critery ,
                                'evaluation'                   => $this->activityCriteries[$j]->evaluation ,
                            ]);
                            /* $critery = Critery::update([
                                'activity_id'                  => $this->id_activityLast->id ,
                                'critery'                      => $this->criteries[$j] ,
                                'evaluation'                   => $this->criteries['nota'][$j] ,
                            ]); */
                        }

                        for ($i= $this->currentCritery; $i < $this->cc; $i++) {

                            /* dd($this->currentCritery); */

                            /* dd($this->cc - $this->currentCritery); */
                            $critery = Critery::find($this->activityCriteries[$i]->id);
                            $critery->delete();
                        }
                    }


                }


                if (isset($this->criteries['nota'])) {

                    /* dd('here new!!!'); */

                    /* dd($this->criteries); */
                    /* dd($this->id_activityLast); */
                    /* dd($this->criteries[$j]); */

                    $this->ccx = count($this->criteries['nota']);

                    /* dd($this->ccx); */

                    for ($j=$this->cc; $j < $this->cc + $this->ccx; $j++) {
                        $critery = Critery::create([
                            'activity_id'                  => $this->id_activityLast ,
                            'critery'                      => $this->criteries[$j] ,
                            'evaluation'                   => $this->criteries['nota'][$j] ,
                        ]);
                    }
                }


            }

            /* dd('another here!'); */




            /* proceso para las referencias bibliograficas */

            if (isset($this->references)) {

                /* dd($this->activityCriteries[1]->id); */

                /* dd($this->currentCritery); */

                $this->cc = count($this->references);

                /* dd($this->cc); */

                if ($this->currentBiblio == $this->cc) {
                    for ($j=0; $j < $this->cc; $j++) {

                        $referenceUp = Reference::find($this->references[$j]->id);
                        $referenceUp->update([
                            /* 'activity_id'                  => $this->id_activityLast->id , */
                            'title'                         => $this->references[$j]->title ,
                            'autor'                         => $this->references[$j]->autor ,
                            'year'                          => $this->references[$j]->year ,
                        ]);

                    }
                }

                if ($this->currentBiblio < $this->cc) {

                    /* dd('here!!!'); */

                    /* if (isset()) {

                    } */

                    for ($j=0; $j < $this->cc - $this->currentBiblio; $j++) {

                        $biblioUp = Reference::find($this->references[$j]->id);
                        $biblioUp->update([
                            'title'                         => $this->references[$j]->title ,
                            'autor'                         => $this->references[$j]->autor ,
                            'year'                          => $this->references[$j]->year ,
                        ]);

                    }

                    for ($i= $this->currentBiblio; $i < $this->cc; $i++) {

                        /* dd($this->currentCritery); */

                        /* dd($this->cc - $this->currentCritery); */
                        $biblioUp = Reference::find($this->references[$i]->id);
                        $biblioUp->delete();
                    }
                }


            }


            if (isset($this->biblio['autor'])) {
                /* dd('here new!!!'); */

                /* dd($this->criteries); */
                /* dd($this->id_activityLast); */
                /* dd($this->criteries[$j]); */

                $this->ccx = count($this->biblio['autor']);

                /* dd($this->ccx); */

                for ($j=$this->cc; $j < $this->cc + $this->ccx; $j++) {
                    $critery = Reference::create([
                        'activity_id'                  => $this->id_activityLast ,
                        'title'                        => $this->biblio[$j] ,
                        'autor'                        => $this->biblio['autor'][$j] ,
                        'year'                         => $this->biblio['anno'][$j] ,
                    ]);
                }
            }


            /* $this->reset();


            /* return redirect()->route('admin.activities.index')->with('info', 'La actividad se edito con exito'); */

            return redirect()->route('admin.activities.index');

    }

    public function evaluationUnit2($nota, $unidad, $id_curso, $id_periodo){
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


        for( $this->i=0;$this->i<$this->c;$this->i++ )
        {
            $activity_courses = Activity_course::where([
                ['id_course', $coursessx[$this->coursess[$this->i]-1]->id],
                ['unit', $unidad] ])
                ->get();
            $c_eval = count($activity_courses); //cantidad de notas por curso y unidad
            /* dd($activity_courses); */
            $nota = 0;
            for ($i=0; $i < $c_eval ; $i++) {
                $nota = $activity_courses[$i]->evaluation + $nota;
            }

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

            if ($nota >= $totalUnidad) {
                $this->nota_mensaje = 1;
                $this->nota_curso[$this->i] = $coursessx[$this->coursess[$this->i]-1];
            } else {
                $this->nota_mensaje = 0;
            }
            /* dd($this->nota_curso); */

        };

        /* dd($this->nota_curso); */


}

    public function evaluationUnit($nota, $unidad, $id_curso, $id_periodo){
        /* dd($this->eval); */
        /* dd($id_curso); */
        /* dd($this->coursess); */
        /* dd($this->cour); */
        $this->c = count($this->cour); //cantidad de cursos del usuario
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

        /* dd($nota); */

        /* dd($this->activity->unit); */ /* estilo para tomar las variables cuando es edicion */
        /* dd($this->activity->evaluation); */

        /* dd($totalUnidad); */

        /* $activity_courses */

        $courx = array_keys($this->cour);

        /* dd($courx); */

        $this->nota_mensaje = 0;
        $this->nota_curso = null;
        $this->nota_cursox = null;

        /* dd($this->id_activity); */

        /* $id_activity_note = Activity_course::all(); */
        $id_activity_note = Activity_course::where([
            ['id_activity', $this->id_activity],
            ['unit', $unidad],
            ['id_course', $courx[0]] ])
            ->get();
        /* dd($id_activity_note[0]->evaluation); */

        for( $this->i=0;$this->i<$this->c;$this->i++ )
        {
            $activity_courses = Activity_course::where([
                ['id_course', $coursessx[$courx[$this->i]-1]->id],
                ['unit', $unidad] ])
                ->get();


            $c_eval = count($activity_courses); //cantidad de notas por curso y unidad
            /* dd($activity_courses); */
            /* dd($c_eval); */
            /* $nota = $this->eval; */ /* ---- */

            /* $this->nota_mensaje = 0; */
            /* $this->nota_curso = null; */
            /* dd($activity_courses[1]->evaluation); */
            /* dd($nota); */

            $nota = $nota - $id_activity_note[0]->evaluation;

            /* dd($nota); */

            for ($i=0; $i < $c_eval ; $i++) {
                $nota = $activity_courses[$i]->evaluation + $nota;
            }

            /* dd($nota); */

            switch ($unidad) {
                case '1':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit01;
                    break;
                case '2':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit02;
                    break;
                case '3':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit03;
                    break;
                case '4':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit04;
                    break;
                case '5':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit05;
                    break;
                case '6':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit06;
                    break;
                case '7':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit07;
                    break;
                case '8':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit08;
                    break;
                case '9':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit09;
                    break;
                case '10':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit10;
                    break;
                case '11':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit11;
                    break;
                case '12':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit12;
                    break;
                case '13':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit13;
                    break;
                case '14':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit14;
                    break;
                case '15':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit15;
                    break;
                case '16':
                    $totalUnidad = $coursessx[$courx[$this->i]-1]->unit16;
                    break;

                default:
                    # code...
                    break;
            }

            /* dd($totalUnidad); */
            /* dd($nota); */

            if ($nota > $totalUnidad) { //ACUMULADOR DE CURSOS QUE SOBRE PASAN LA NOTA MAXimA DE LA UNIDAD
                $this->nota_mensaje = 1;
                $this->nota_curso[$this->i] = $coursessx[$courx[$this->i]-1];
                $this->notax[$this->i] = $totalUnidad - ($nota - $this->activity->evaluation);
                /* dd('here!! dont work right'); */
            } else { //ACUMULADOR DE PUNTOS QUE FALTAN POR EVALUAR DE CADA MATERIA
                $this->nota_cursox[$this->i] = $coursessx[$courx[$this->i]-1];
                $this->datos_curso[$this->i] = $totalUnidad - $nota;
            }
            /* dd($this->datos_curso); */
            /* dd($this->nota_curso); */
            /* dd() */
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

    public function preValidatePoint($criteries,$activityCriteries,$currentCritery){
            /* dd($criteries['nota']); */
            $this->totalPointsA = 0;
            $this->totalPointsC = 0;

            if (isset($activityCriteries)) {
                $aaa = count($activityCriteries);
                if ($this->currentCritery < $aaa) {
                    /* dd('here!'); */
                    $aaa = $aaa - $this->currentCritery;
                }
                /* dd($aaa); */
                for ($j=0; $j < $aaa; $j++) {
                    $this->totalPointsA = $this->totalPointsA + $activityCriteries[$j]['evaluation'];
                }
            }

            /* dd($criteries['nota']); */
            /* dd($this->currentCritery); */
            if (isset($criteries)) {
                $ccc = count($criteries['nota']);
                /* dd($aaa); */
                /* dd($ccc); */
                /* if ($this->currentCritery == $aaa + $ccc) {
                    for ($k=$aaa; $k < $ccc + $aaa ; $k++) {
                        $this->totalPointsC = $this->totalPointsC + $criteries['nota'][$k];
                    }
                }
                if ($this->currentCritery < $aaa + $ccc) {
                    for ($k=$aaa; $k < $this->currentCritery ; $k++) {
                        $this->totalPointsC = $this->totalPointsC + $criteries['nota'][$k];
                    }
                } */
                for ($k=$aaa; $k < $this->currentCritery ; $k++) {
                    $this->totalPointsC = $this->totalPointsC + $criteries['nota'][$k];
                }
            }


            /* for ($k=0; $k < $currentCritery; $k++) {
                $this->totalPoints = $this->totalPoints + $criteries['nota'][$k];
            } */

            $this->totalPoints = $this->totalPointsA + $this->totalPointsC;

            /* dd($this->totalPointsA); */

            /* dd($this->totalPoints); */

            /* dd($this->activity->evaluation); */

            $this->activity->evaluation = $this->totalPoints;

            /* dd($this->activity->evaluation); */
    }


    public function register(){
          $this->resetErrorBag();
          /* if($this->currentStep == 4){
              $this->validate([
                  'cv'=>'required|mimes:doc,docx,pdf|max:1024',
                  'terms'=>'accepted'
              ]);
          } */

          /* $cv_name = 'CV_'.time().$this->cv->getClientOriginalName();
          $upload_cv = $this->cv->storeAs('students_cvs', $cv_name); */

          /* if($upload_cv){
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
          } */





            /* $cours = User_course::where('ced',$userActiveName)->get(); */



            /* $period = Period::all();
            $periodName = $period->name; */

            /* $this->lapse_in = Carbon::parse($this->lapse_in)->format('d/m/Y'); */
            $this->lapse_in =Carbon::createFromFormat('Y-m-d', $this->lapse_in);
            $this->lapse_out =Carbon::createFromFormat('Y-m-d', $this->lapse_out);
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

            /* if($data){
                            $data['slug'] = 'required|unique:activities,slug,' . $activity->id;
            } */

            /* $acti = Activity::all(); */

            /* dd($data); */


            /* dd($data); */



            $activity = Activity::create([
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

            $this->id_activityLast = Activity::where('user_id', $this->userActiveId)
                                    ->latest('id')
                                    ->first('id');
            /* dd($this->id_activityLast->id); */
            /* dd($this->coursess[0]); */

            $this->c = count($this->coursess);

            for( $this->i=0;$this->i<$this->c;$this->i++ )
            {
                $activity_courses = Activity_course::create([
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
            return redirect()->route('admin.activities.index');


    }
}
