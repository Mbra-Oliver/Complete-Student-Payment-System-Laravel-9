<?php

namespace App\Http\Livewire;

use App\Models\Level;
use Livewire\Component;

class LevelCreate extends Component
{
    public $libelle;
    public $amount;

    public function store(){
        
        $this->validate([
            'libelle'=>'unique:years,libelle|required'
        ]);

        Level::create([
            'libelle'=>$this->libelle,
            'amount'=>$this->amount,
        ]);
        return redirect()->route('levels')->with('message', 'Level add');
    }

    public function render()
    {
        return view('livewire.level-create');
    }
}
