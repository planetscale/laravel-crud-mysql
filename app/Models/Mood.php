<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Mood extends Model
{
    public $timestamps = FALSE;
    protected $fillable = ['name', 'color'];

    // Get the entries for a specific mood.
    public function entries()
    {
        return $this->hasMany(Mood::class);
    }

    // Clear moods cache upon modifying a mood entry
    protected static function boot()
    {
        parent::boot();

        static::saving(function() {
            Cache::forget('moods');
        });
    }
}