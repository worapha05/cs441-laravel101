<?php

namespace App\Repositories;

use App\Models\Artist;
use App\Repositories\Traits\SimpleCRUD;
use Illuminate\Database\Eloquent\Collection;

class ArtistRepository
{
    use SimpleCRUD;
    private string $model = Artist::class;

    public function filterByName(string $name): Collection
    {
        return $this->model::where('name', 'LIKE', "%$name%")->get();
    }

    public function filterBySongId(int $id): Artist
    {
        return $this->model::where('song_id', $id)->firstOrFail();
    }
}
