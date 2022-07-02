<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index(){
        return view('levels.index');
    }
    public function create(){
        return view('levels.create');
    }
    public function edit(Level $level){
        return view('levels.edit', compact('level'));
    }
    public function update(Request $request, Level $level){
        
        $request->validate([
            'libelle'=>'required',
            'amount'=>'required|integer'
        ]);

        $level->libelle = $request->libelle;
        $level->amount = $request->amount;
        $level->save();
        return redirect()->route('levels')->with('message', 'Level updated !');
    }
}
