<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Artist extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'image_path'];
    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }

    public function artistImage() : Attribute
    {
        $url = "/storage/images/default-artist.jpg";

        if (Str::startsWith($this->image_path, 'http')) {
            $url = $this->image_path;
        } else if (!empty($this->image_path)) {
            $url = Storage::url($this->image_path);
        }

        return new Attribute(
            get: fn () => $url
        );
    }
}
