<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function create(){
        return view('years.create');
    }
    
    public function edit(Year $year){
        
        return view('years.edit', compact('year'));
    }

    public function update(Request $request, Year $year){
        $request->validate([
            'libelle'=>'required'
        ]);
        $year->libelle=$request->libelle;
        $year->save();
        return redirect()->back()->with('message', 'Year updated');
    }
}
