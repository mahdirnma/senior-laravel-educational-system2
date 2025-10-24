<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Field::create([
            'title' => 'field 1',
            'description' => 'lorem ipsum 1',
            'unitNumber'=>'150',
            'branch'=>'physics',
            'type' => 'teacher',
        ]);
        Field::create([
            'title' => 'field 2',
            'description' => 'lorem ipsum 2',
            'unitNumber'=>'140',
            'branch'=>'physics',
            'type' => 'student',
        ]);

    }
}
