<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'state',
        'available',
        'acquired_at',
    ];

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected $casts = [
        'acquired_at' => 'datetime',
    ];
}
