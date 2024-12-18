<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialQualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialQualifications = [
            ['name' => 'PhD', 'description' => 'Doctor of Philosophy', 'qualification_id' => 1],
            ['name' => 'MBA', 'description' => 'Master of Business Administration', 'qualification_id' => 2],
            ['name' => 'BSc', 'description' => 'Bachelor of Science', 'qualification_id' => 2],
            ['name' => 'MSc', 'description' => 'Master of Science', 'qualification_id' => 1],
            ['name' => 'BA', 'description' => 'Bachelor of Arts', 'qualification_id' => 2],
        ];

        foreach ($specialQualifications as $specialQualification) {
            \App\Models\SpecialQualification::create($specialQualification);
        }
    }
}
