<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
class Teacher extends User
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'field_id',
        'is_active',
    ];
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
    public function field(){
        return $this->belongsTo(Field::class);
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }

}
