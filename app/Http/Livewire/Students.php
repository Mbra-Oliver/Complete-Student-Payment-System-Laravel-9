<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class Students extends Component
{
    public function render()
    {
        $students= Student::latest()->paginate(15);
        return view('livewire.students', compact('students'));
    }
}
