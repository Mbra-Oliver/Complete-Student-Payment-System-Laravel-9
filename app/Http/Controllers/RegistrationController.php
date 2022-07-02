<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(){
        return view('registrations.index');
    }
    
    public function create(){
        return view('registrations.create');
    }
    
    public function edit(Registration $registration){
        return view('registrations.edit', compact('registration'));
    }
}
