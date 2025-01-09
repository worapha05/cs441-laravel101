<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->addJson('2560.json', '2560');
        $this->addJson('2565.json', '2565');
    }

    private function addJson($file, $year): void
    {
        $content = Storage::json($file);

        foreach ($content as $item) {
            $eng_name_first = str_replace('(', '', $item['eng_name']);
            $eng_name = str_replace(')', '', $eng_name_first);

            Course::create([
                'curriculum_code' => $year,
                'code' => $item['code'],
                'thai_name' => $item['thai_name'],
                'eng_name' => $eng_name,
                'thai_description' => $item['thai_description'],
                'eng_description' => $item['eng_description'],
                'credit' => $item['credit'],
                'lecture_hours' => $item['lecture_hours'],
                'practice_hours' => $item['practice_hours'],
                'self_study_hours' => $item['self_study_hours'],
                'condition' => ($item['condition'] ?? "") != "" ? $item['condition'] : null,
            ]);
        }
    }
}
