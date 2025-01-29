<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PointByExpiredView extends Model
{
    protected $primaryKey = false;

    public $timestamps = false;

    protected $casts = [
        'expired_at' => 'datetime',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function scopeUnExpired($query) {
        return $query->where('expired_at', '>=', now());
    }

    public function scopeOfUserId($query, $user_id) {
        return $query->where('user_id', $user_id);
    }
}
