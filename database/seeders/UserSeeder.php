<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artist = User::where('email', 'admin@example.com')->first();
        if ($artist === null) {
            User::factory()->create(['email' => 'admin@example.com', 'role' => 'ADMIN']);
        }
        $artist = User::find(2);
        if ($artist === null) {
            User::factory()->create(['email' => 'user01@example.com']);
        }
        $limit = 50;
        $exits = User::count();
        if ($exits < $limit) {
            User::factory()->count($limit - $exits)->create();
        }
    }
}
