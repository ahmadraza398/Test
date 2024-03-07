<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    //Creating the relation between FeeCategory & FeeCategoryAmount Tables
    public function fee_category(){
        return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
    }

     //Creating the relation between StudentClass & FeeCategoryAmount Tables
     public function student_class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
}
