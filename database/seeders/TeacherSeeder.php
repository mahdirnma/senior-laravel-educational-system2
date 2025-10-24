<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create([
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'password'=>Hash::make('123'),
            'field_id'=>Field::where('type','teacher')->first()->id,
        ]);
        Teacher::create([
            'name' => 'nima',
            'email' => 'nima@gmail.com',
            'password'=>Hash::make('123'),
            'field_id'=>Field::where('type','teacher')->first()->id,
        ]);
    }
}
