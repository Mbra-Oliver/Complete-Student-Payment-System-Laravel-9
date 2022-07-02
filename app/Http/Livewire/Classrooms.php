<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Livewire\Component;

class Classrooms extends Component
{
    public function render()
    {
        $classrooms = Classe::with('level')->latest()->paginate(15);
        return view('livewire.classrooms', compact('classrooms'));
    }
}
