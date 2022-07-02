<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('students.index');
    }
    public function create(){
        return view('students.create');
    }
    public function edit(Student $student){
        return view('students.edit', compact('student'));
    }
    public function update(Request $request, Student $student){
        
        $request->validate([
            'matricule'=>'required',
            'lastname'=> 'required|string',
            'firstname'=> 'required|string',
            'birth'=> 'required|date',
            'sexe'=> 'required|min:1|max:1',
           
        ]);

        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->sexe = $request->sexe;
        $student->birth = $request->birth;
        $student->save();
        return redirect()->route('students')->with('message', 'Student data updated !');
    }
}
