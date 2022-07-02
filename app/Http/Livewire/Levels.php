<?php

namespace App\Http\Livewire;

use App\Models\Level;
use Livewire\Component;

class Levels extends Component
{
    public function render()
    {
        $levels = Level::latest()->paginate(10);
        return view('livewire.levels', compact('levels'));
    }
}
