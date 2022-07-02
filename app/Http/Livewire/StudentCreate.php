<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentCreate extends Component
{
    public $matricule;
    public $lastname;
    public $firstname;
    public $birth;
    public $sexe;
    
    public function store(){
        
        $this->validate([
            'matricule'=>'unique:students,matricule|required',
            'lastname'=> 'required|string',
            'firstname'=> 'required|string',
            'birth'=> 'required|date',
            'sexe'=> 'required|min:1|max:1',
        ]);

        Student::create([
            'matricule'=>$this->matricule,
            'lastname'=>$this->lastname,
            'firstname'=>$this->firstname,
            'birth'=>$this->birth,
            'sexe'=>$this->sexe,
        ]);
        return redirect()->route('students')->with('message', 'Student added');
    }

    public function render()
    {
        return view('livewire.student-create');
    }
}
