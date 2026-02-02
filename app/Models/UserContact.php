<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    public $timestamps = false;  // Disable timestamps

    protected $table = 'user_contacts';

    protected $fillable = [
        'name', 'contact_number', 'relationship'
    ];
}
