<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'reza',
            'email' => 'reza@gmail.com',
            'password'=>Hash::make('123'),
            'field_id'=>Field::where('type','student')->first()->id,
        ]);
        Student::create([
            'name' => 'sara',
            'email' => 'sara@gmail.com',
            'password'=>Hash::make('123'),
            'field_id'=>Field::where('type','student')->first()->id,
        ]);
    }
}
