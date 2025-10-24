<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::create([
            'title' => 'lesson 1',
            'description' => 'lorem ipsum 1',
            'capacity'=>'50',
            'course_id'=>'1',
            'teacher_id'=>'1',
            'field_id' => '1',
        ]);
        Lesson::create([
            'title' => 'lesson 2',
            'description' => 'lorem ipsum 2',
            'capacity'=>'45',
            'course_id'=>'2',
            'teacher_id'=>'2',
            'field_id' => '2',
        ]);

    }
}
