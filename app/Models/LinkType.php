<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LinkType extends Model
{
    use HasFactory;

    public function links(): HasMany
    {
        return $this->hasMany(Links::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($linkType) {
            Links::all()->where('link_type', $linkType->link_name)->each->delete();
        });
    }
}
