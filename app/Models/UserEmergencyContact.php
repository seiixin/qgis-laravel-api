<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmergencyContact extends Model
{
    use HasFactory;

    protected $table = 'user_emergency_contacts';

    protected $fillable = [
        'user_identifier', 'contact_name', 'contact_number', 'relationship'
    ];
}
