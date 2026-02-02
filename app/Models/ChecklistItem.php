<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    use HasFactory;

    // Disable automatic timestamps
    public $timestamps = false;

    protected $table = 'checklist_items';

    protected $fillable = [
        'phase', 'instruction', 'language'
    ];
}
