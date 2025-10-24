<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'field_id',
        'is_active',
    ];
    public function field(){
        return $this->belongsTo(Field::class);
    }
    public function lessons(){
        return $this->belongsToMany(Lesson::class);
    }
}
