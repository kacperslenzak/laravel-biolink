<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileView extends Model
{
    use HasFactory;

    protected $table = 'profile_views';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'viewer_ip'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
