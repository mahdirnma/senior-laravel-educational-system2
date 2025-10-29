<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Teacher extends User
{
    use HasApiTokens, Notifiable;
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
