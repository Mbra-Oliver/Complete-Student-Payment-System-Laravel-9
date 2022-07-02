<?php

namespace App\Http\Livewire;

use App\Models\Level;
use App\Models\Classe;
use App\Models\Student;
use Livewire\Component;
use App\Models\Registration;

class RegistrationEdit extends Component
{
    public $studentFound=true;
    private $student_id;
    public $level_id = null;
    public $class_id=null;
    public $fullname=null;
    public $matricule;
    public $error= false;
    public $error_text= null;

    //get the registration 

    public $registration;

    public function update(){
        //Get the current registration

        $RegistrationUpdate = Registration::find($this->registration->id);
        $this->validate([
            'matricule'=>'required',
            'level_id'=>'required|integer',
            'class_id'=>'required|integer',
        ]);

        $RegistrationUpdate->classe_id = $this->class_id;

        $RegistrationUpdate->save();

        return redirect()->route('registrations')->with('message', 'Student registration update successfully');
    }

    public function render()
    {
        //Get student id
        $this->student_id = $this->registration->student_id;

        $studentSearch= Student::find($this->student_id);
        //Result if student is found
        $this->matricule = $studentSearch->matricule;
        $this->fullname= $studentSearch->lastname.''.$studentSearch->firstname;
        


        $levels= Level::all();
        
        //Get all class of the selected level

        $classes = Classe::where('level_id', $this->level_id)->get();
        return view('livewire.registration-edit', compact(['levels','classes']));
    }
}
