<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    //Creating the relation between StudentClass & AssignSubject Tables
    public function student_class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

     //Creating the relation between SchoolSubject & AssignSubject Tables
     public function school_subject(){
        return $this->belongsTo(SchoolSubject::class,'subject_id','id');
    }

}
