<?php

namespace App\Models;

use App\Models\Enums\PlaylistAccessibility;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Playlist extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'accessibility' => PlaylistAccessibility::class,
    ];

    protected $fillable = ['name', 'accessibility', 'user_id'];

    // playlists -[m:m]- songs
    public function songs() : BelongsToMany
    {
        return $this->belongsToMany(Song::class);
    }

    // playlist belongsTo user
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublic(Builder $query) : void
    {
        $query->where('accessibility', PlaylistAccessibility::PUBLIC);
    }

    public function scopePrivate(Builder $query) : void
    {
        $query->where('accessibility', PlaylistAccessibility::PRIVATE);
    }

    public function scopeOfUser(Builder $query, $user_id) : void
    {
        $query->where('user_id', $user_id);
    }
}
