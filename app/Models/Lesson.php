<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable=[
        'title',
        'description',
        'capacity',
        'course_id',
        'teacher_id',
        'field_id',
        'is_active'
    ];
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function field(){
        return $this->belongsTo(Field::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function students(){
        return $this->belongsToMany(Student::class);
    }

}
