<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyHotline extends Model
{
    use HasFactory;

    public $timestamps = false;  // Disable automatic timestamps

    protected $table = 'emergency_hotlines';

    protected $fillable = [
        'agency_name', 'phone_number', 'description'
    ];
}
    