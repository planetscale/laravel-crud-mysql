<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\Cache;

class Entry extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    protected $fillable = ['date', 'notes', 'mood_id'];

    public function mood()
    {
        return $this->belongsTo(Mood::class);
    }

    // Clear entries cache upon modifying an entry
    protected static function boot()
    {
        parent::boot();

        static::saving(function() {
            Cache::forget('entries');
        });
    }
}