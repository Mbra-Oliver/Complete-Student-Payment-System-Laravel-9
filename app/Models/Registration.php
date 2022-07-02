<?php

namespace App\Models;

use App\Models\Year;
use App\Models\Classe;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }
}
