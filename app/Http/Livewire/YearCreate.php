<?php

namespace App\Http\Livewire;

use App\Models\Year;
use Livewire\Component;

class YearCreate extends Component
{
    public $year;

    public function store(){
        $this->validate([
            'year'=>'unique:years,libelle|required'
        ]);

        Year::create([
            'libelle'=>$this->year
        ]);
        return redirect()->route('settings')->with('message', 'School Year add');
    }
    public function render()
    {
        return view('livewire.year-create');
    }
}
