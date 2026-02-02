<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfflineMap extends Model
{
    use HasFactory;

    // Disable timestamps (created_at, updated_at)
    public $timestamps = false;

    protected $table = 'offline_maps';

    protected $fillable = [
        'map_id', 'image_path', 'resolution'
    ];
}
