<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=[
        'title',
        'description',
        'start_date',
        'end_date',
        'year',
        'teacher_id',
        'is_active'
    ];
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }

}
