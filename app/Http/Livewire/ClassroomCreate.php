<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use App\Models\Level;
use Livewire\Component;

class ClassroomCreate extends Component
{
    public $libelle;
    public $level_id;
    public $levels;

    public function store(){
        
        $this->validate([
            'libelle'=>'string|required',
            'level_id'=>'required'
        ]);

        Classe::create([
            'libelle'=>$this->libelle,
            'level_id'=>$this->level_id,
        ]);
        return redirect()->route('classrooms')->with('message', 'Classroom added');
    }


    public function render()
    {
        $this->levels = Level::all();
        return view('livewire.classroom-create');
    }
}
