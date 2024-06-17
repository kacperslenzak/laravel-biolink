<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'background_effect',
        'username_effect',
        'profile_opacity',
        'profile_blur',
        'username_glow',
        'badge_glow'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
