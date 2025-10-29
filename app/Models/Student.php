<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Student extends User
{
    use HasApiTokens, Notifiable;
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
