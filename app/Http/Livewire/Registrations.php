<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Registration;

class Registrations extends Component
{
    public function render()
    {
        $registrations = Registration::with(['student', 'classe', 'year'])->latest()->paginate(10);
        return view('livewire.registrations', compact('registrations'));
    }
}
