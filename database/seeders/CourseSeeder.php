<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content2560 = Storage::json('2560.json');

        foreach ($content2560 as $item) {
            $eng_name_first = str_replace('(', '', $item['eng_name']);
            $eng_name = str_replace(')', '', $eng_name_first);

            DB::table('courses')->insert([
                'course_code' => '2560',
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

        $content2565 = Storage::json('2565.json');

        foreach ($content2565 as $item) {
            $eng_name_first = str_replace('(', '', $item['eng_name']);
            $eng_name = str_replace(')', '', $eng_name_first);

            DB::table('courses')->insert([
                'course_code' => '2565',
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
