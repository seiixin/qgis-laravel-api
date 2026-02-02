<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EarthquakeInfo extends Model
{
    use HasFactory;

    // Disable timestamps if not required
    public $timestamps = false;

    protected $table = 'earthquake_info'; 

    protected $fillable = [
        'title', 'content', 'media_type', 'media_url', 'language'
    ];
}
