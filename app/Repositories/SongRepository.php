<?php

namespace App\Repositories;

use App\Models\Song;
use App\Repositories\Traits\SimpleCRUD;
use Illuminate\Database\Eloquent\Collection;

class SongRepository
{
    use SimpleCRUD;

    private string $model = Song::class;

    public function filterByTitle(string $title) : Collection
    {
        return $this->model::where('title', 'LIKE', "%{$title}%")->get();
    }

    public function filterByArtistId(int $artistId) : Collection
    {
        return $this->model::where('artist_id', $artistId)->get();
    }
}
