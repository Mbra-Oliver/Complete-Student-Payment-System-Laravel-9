<?php

namespace App\Http\Livewire;

use App\Models\Year;
use App\Models\Level;
use App\Models\Classe;
use App\Models\Payment;
use App\Models\Student;
use Livewire\Component;
use App\Models\Registration;

class PaymentCreate extends Component
{
    public $paidmount;
    public $matricule;
    public $fullname;
    public $resttopaid;
    public $registration_id;
    public $student_id;
    public $year_id;
    public $level_id;
    public $error=false;
    public $error_text;

    public $studentFound=false;

    public function store(Payment $payment){
        $this->validate([
            'paidmount'=>'required|integer'
        ]);

        $payment->registration_id = $this->registration_id;
        $payment->year_id = $this->year_id;
        $payment->amountpaid = $this->paidmount;
        $payment->date = date('Y-m-d');
        $payment->confirm = 1;

        $payment->save();

        return redirect()->route('dashboard')->with('message', 'Payment done');
    }

    public function render()
    {
        $studentSearch= Student::where('matricule', $this->matricule)->get();
        //Result if student is found

        if(count($studentSearch) ==0){
            $this->studentFound= false;
        }else{
            $this->studentFound=true;
        
            foreach($studentSearch as $result){
                $this->fullname= $result->lastname.''.$result->firstname;
                $this->student_id= $result->id;
            }
        }

        //Get the registration with the student id and the year id

        $yearQuery= Year::where('active', 1)->get();

        foreach($yearQuery as $year){
            $this->year_id= $year->id;
        }
        

        $registrationQuery = Registration::where('student_id', $this->student_id)->where('year_id', $this->year_id)->get();

        foreach($registrationQuery as $rq){
            //Get the classe first
            $this->registration_id = $rq->id;
            $classQuery= Classe::find($rq->classe_id);
            $this->level_id = $classQuery->level_id;    
                 
            
        }

        //Get the amount of the level

        $levelAmountQuery = Level::find($this->level_id);

        //Check if student have make some paiements and check the rest
        $checkPaiement= Payment::where('registration_id', $this->registration_id)->get();

        $alreadyPaid = 0;

        foreach($checkPaiement as $check){
            $alreadyPaid = $alreadyPaid+$check->amountpaid;
        }

      if($levelAmountQuery){
          
        $this->resttopaid=$levelAmountQuery->amount - $alreadyPaid;
        
        //Limit the paiement of

        if($this->paidmount > $this->resttopaid){
            $this->error= true;
            $this->error_text= 'Paiement can not exceed level amount. Rest to paid'.$this->resttopaid.' $';
        }else{
            $this->error=false;
        }
        
      }
        return view('livewire.payment-create');
    }
}
