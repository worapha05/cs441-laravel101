<?php

namespace Database\Seeders;

use App\Models\Point;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_count = User::count();
        $limit = 10;
        if ($user_count < $limit) {
            User::factory()->count($limit - $user_count)->create();
        }
        Point::factory()->count(1000)->create();

    }
}
