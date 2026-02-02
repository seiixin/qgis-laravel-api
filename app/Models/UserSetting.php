<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;

    // Specify the correct table name
    protected $table = 'user_settings';

    // Allow mass-assignment for these columns
    protected $fillable = [
        'language', 'font_size', 'text_to_speech', 'speech_to_text', 'high_contrast'
    ];

    // If you have 'created_at' and 'updated_at' columns, Laravel will handle them automatically
    // If you're not using timestamps, set 'timestamps' to false
    public $timestamps = false; // Set to true if you're using 'created_at' and 'updated_at'
}
