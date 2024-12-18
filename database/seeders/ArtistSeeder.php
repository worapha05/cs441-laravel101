<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artist = Artist::where('name', 'Aespa')->first();
        if ($artist === null) {
            Artist::factory()->create(['name' => 'Aespa']);
        }
        $limit = 50;
        $exits = Artist::count();
        if ($exits < $limit) {
            Artist::factory()->count($limit - $exits)->create();
        }
    }
}
