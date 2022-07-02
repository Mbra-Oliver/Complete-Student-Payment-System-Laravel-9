<?php

namespace App\Http\Livewire;

use App\Models\Year;
use App\Models\Level;
use App\Models\Classe;
use App\Models\Student;
use Livewire\Component;
use App\Models\Registration;

class RegistrationsCreate extends Component
{
    public $studentFound=false;
    public $level_id = null;
    public $class_id=null;
    public $fullname=null;
    public $matricule;
    public $student_id=null;
    private $year_id;
    public $error= false;
    public $error_text= null;


    //Register the student in the classroom for the active year

    public function store(Registration $registration){
        $this->validate([
            'matricule'=>'required',
            'level_id'=>'required|integer',
            'class_id'=>'required|integer',
        ]);

        //Check if the student is not already register for the year

         //Get The Selected School Year
        
         $yearQuery= Year::where('active', 1)->get();

         foreach($yearQuery as $year){
             $this->year_id= $year->id;
         }
        $checkStudentRegister = Registration::where('student_id',$this->student_id)->where('year_id',$this->year_id)->get();

        if(count($checkStudentRegister)>=1){
            //Student is already registered in a class
            $this->error = true;
            $this->error_text= 'This student is already registered to a classroom. Check the table';

        }else{
            //Student not registered

            $registration->student_id = $this->student_id;
            $registration->classe_id = $this->class_id;
            $registration->year_id = $this->year_id;

            $registration->save();
            return redirect()->route('registrations')->with('message', 'Student registration successfull');
        }
    }


    public function render()
    {
        $studentSearch= Student::where('matricule', $this->matricule)->get();
        //Result if student is found

        if(count($studentSearch) ==0){
            $this->studentFound= false;
        }else{
            $this->studentFound=true;
        
            foreach($studentSearch as $result){
                $this->fullname= $result->lastname.''.$result->firstname;
                $this->student_id= $result->id;
            }
        }
        


        $levels= Level::all();
        
        //Get all class of the selected level

        $classes = Classe::where('level_id', $this->level_id)->get();

        return view('livewire.registrations-create', compact(['levels', 'classes']));
    }
}
