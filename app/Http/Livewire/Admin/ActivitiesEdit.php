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
    public $body, $extract, $extract01;
    public $status, $evaluation;
    public $lapse_in, $lapse_out;
    public $id_activityLast;


    public $totalSteps = 3;
    public $currentStep = 1;

    protected $rules = [
        'activity.name' => 'required',
        'activity.extract' => 'required',
        'activity.extract01' => 'required',
        'activity.body' => 'required',
        'activity.lapse_in' => 'required',
        'activity.lapse_out' => 'required',
        'activity.type' => 'required',
        /* 'activity.evaluation' => 'required', */
        'activity.status' => 'required',
        /* 'activity.courses' => 'required', */
        'cours' => 'required|array',


    ];



    /* public function mount($activityx){ */
    /* public function mount(){ */
    public function mount(Activity $activity/* , Activity_course $activity_course */){
        $this->currentStep = 1;
        $this->activity = $activity;
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
              ]);
        }
        elseif($this->currentStep == 3){
              $this->validate([
                'activity.activity_type' => 'required',
                'activity.lapse_in' => 'date|after_or_equal:academic_start',
                'activity.lapse_out' => 'date|before_or_equal:academic_finish'
              ]);
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



            $this->activity->save();

            /* $this->id_activityLast = Activity::where('user_id', $this->userActiveId)
                                    ->latest('id')
                                    ->first('id'); */

            $this->id_activityLast = $this->id_activity;

            /* dd($this->lapse_in); */

            $this->lapse_in = Carbon::parse($this->lapse_in);
            $this->lapse_out = Carbon::parse($this->lapse_out);

           /*  dd($this->lapse_in); */



            /* $activity = Activity::find($this->id_activity);
                $activity->update([
                    'lapse_in'          => $this->lapse_in,
                    'lapse_out'         => $this->lapse_out,
                ]);


            dd($activity); */

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

            /* $this->reset();



            /* return redirect()->route('admin.activities.index')->with('info', 'La actividad se edito con exito'); */

            return redirect()->route('admin.activities.index');

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
