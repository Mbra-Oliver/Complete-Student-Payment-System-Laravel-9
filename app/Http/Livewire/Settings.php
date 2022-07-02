<?php

namespace App\Http\Livewire;

use App\Models\Year;
use Livewire\Component;

class Settings extends Component
{

    public $listeners=['toggle_year'];
    
    public function toggle_year(Year $year){
    
        //Make all Year inactive first

        $query = Year::query()->update(['active'=> 0]);
        
            $year->active = 1;
            
            $year->save();
            return redirect()->back()->with('message', 'Activation done !');
        


    }
    
    public function render()
    {
        $schoolyears = Year::latest()->paginate(15);
        return view('livewire.settings', compact('schoolyears'));
    }
}
