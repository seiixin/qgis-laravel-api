<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'language', 'font_size', 'dark_mode', 'text_to_speech'
    ];

    /**
     * Get the user that owns the AppSetting.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the settings for the user.
     *
     * This is an optional function to retrieve the user's settings more easily.
     * It allows you to use `$user->settings` directly.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function settings()
    {
        return $this->hasOne(UserSettings::class, 'user_id', 'user_id');
    }
}
