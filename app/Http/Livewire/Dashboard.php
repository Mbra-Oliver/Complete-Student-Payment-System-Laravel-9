<?php

namespace App\Http\Livewire;

use App\Models\Year;
use App\Models\Payment;
use Livewire\Component;

class Dashboard extends Component
{

    public $currentYear;
    
    public function render()
    {

        //Get The Selected School Year
        
        $yearQuery= Year::where('active', 1)->get();

        foreach($yearQuery as $year){
            $this->currentYear= $year->id;
        }
 
        //Get All paiements

        $paiements = Payment::join('registrations', 'registrations.id', '=','payments.registration_id')
        ->join('students', 'students.id', '=','registrations.student_id')
        ->join('classes', 'classes.id', '=', 'registrations.classe_id')
        ->join('levels', 'levels.id', '=', 'classes.level_id')
        ->join('years', 'years.id', '=', 'payments.year_id')
        ->where('payments.year_id', $this->currentYear)
        ->get(['payments.date as date','payments.id as payment_id', 'payments.amountpaid as amountpaid', 'students.*', 'classes.libelle as classroom', 'levels.libelle as level', 'years.libelle as schoolyear']);

        return view('livewire.dashboard', compact('paiements'));
    }
}
