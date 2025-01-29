<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Point extends Model
{
    /** @use HasFactory<\Database\Factories\PointFactory> */
    use HasFactory, SoftDeletes;

    protected $casts = [
        'expired_at' => 'datetime',
    ];

    protected $fillable = [
        'title', 'user_id', 'point', 'used', 'expired_at', 'is_active'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
