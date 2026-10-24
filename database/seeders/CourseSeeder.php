<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = ['BSIT', 'BSCS', 'ACT'];

        foreach ($courses as $course) {
            Course::firstOrCreate(['name' => $course]);
        }
    }
}
