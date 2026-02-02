<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'maps';

    // Disable automatic handling of created_at and updated_at columns
    public $timestamps = false; // Disable automatic timestamp management

    protected $fillable = [
        'name', 'type', 'map_url', 'description', 'is_active'
    ];
}
