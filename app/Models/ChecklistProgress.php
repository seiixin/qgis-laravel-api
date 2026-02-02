<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'checklist_id', 'user_identifier', 'is_completed'
    ];

    public function checklist()
    {
        return $this->belongsTo(ChecklistItems::class);
    }
    public $timestamps = false;
}
