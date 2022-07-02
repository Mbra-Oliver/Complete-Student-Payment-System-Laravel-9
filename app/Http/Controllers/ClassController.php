<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Level;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index(){
        return view('classrooms.index');
    }
    public function create(){
        return view('classrooms.create');
    }
    public function edit(Classe $classe){
        $levels = Level::all();
        return view('classrooms.edit', compact('classe', 'levels'));
    }
    public function update(Request $request, Classe $classe){
        
        $request->validate([
            'libelle'=>'required',
            'level_id'=>'required|integer'
        ]);

        $classe->libelle = $request->libelle;
        $classe->level_id = $request->level_id;
        $classe->save();
        return redirect()->route('classrooms')->with('message', 'Classroom updated !');
    }
}
