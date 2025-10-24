<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable=[
        'title',
        'description',
        'type',
        'unitNumber',
        'branch',
        'is_active'
    ];
    public function students(){
        return $this->hasMany(Student::class);
    }
    public function teachers(){
        return $this->hasMany(Teacher::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
