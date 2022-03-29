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


class ActivitiesCreate extends Component
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

    public $courses = [];
    public $coursess = [];
    public $faculties = [];
    public $evaluations = [];
    public $academic_start, $academic_finish;
    public $userActiveName;
    public $userActiveId;
    public $name;
    public $body, $extract, $extract01;
    public $status, $evaluation;
    public $lapse_in, $lapse_out;

    public $totalSteps = 6;
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

                'coursess' => 'required',
            ]);
        }
        elseif($this->currentStep == 2){
              $this->validate([
                'name' => 'required',
                /* 'slug' => 'required|unique:activities',  */
                'body' => 'required',
                'extract' => 'required',
                'extract01' => 'required',
              ]);
        }
        elseif($this->currentStep == 3){
              $this->validate([
                'activity_type' => 'required',
                'lapse_in' => 'date|after_or_equal:academic_start',
                'lapse_out' => 'date|before_or_equal:academic_finish'
              ]);
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

          $data01 = array(
            /* "first_name"=>$this->first_name,
            "last_name"=>$this->last_name,
            "gender"=>$this->gender,
            "email"=>$this->email,
            "phone"=>$this->phone,
            "country"=>$this->country,
            "city"=>$this->city,
            "frameworks"=>json_encode($this->frameworks),
            "description"=>$this->description,
            "cv"=>$cv_name, */

            );



            /* $cours = User_course::where('ced',$userActiveName)->get(); */



            /* $period = Period::all();
            $periodName = $period->name; */

            /* $this->lapse_in = Carbon::parse($this->lapse_in)->format('d/m/Y'); */
            $this->lapse_in =Carbon::createFromFormat('Y-m-d', $this->lapse_in);
            $this->lapse_out =Carbon::createFromFormat('Y-m-d', $this->lapse_out);
            /* $this->lapse_out =Carbon::createFromFormat('Y-m-d', $this->lapse_out)->toDateTimeString(); */
            /* dd($this->lapse_in); */

            $data = [
                'courses'           => $this->coursess,
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
                'courses'           => $this->coursess,
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
