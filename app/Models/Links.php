<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Links extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function icon_class()
    {
        return LinkType::all()->where('link_name', $this->link_type)->first()->icon_class;
    }

    public function link_type(): BelongsTo
    {
        return $this->belongsTo(LinkType::class);
    }
}
