<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDispute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id', 'opened_by_id', 'against_user_id', 'reason', 'description', 'evidence', 'status', 'resolution', 'partial_amount', 'currency', 'decided_by_id', 'decision_notes'
    ];

    // Define relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function openedBy()
    {
        return $this->belongsTo(User::class, 'opened_by_id');
    }

    public function againstUser()
    {
        return $this->belongsTo(User::class, 'against_user_id');
    }

    public function decidedBy()
    {
        return $this->belongsTo(User::class, 'decided_by_id');
    }
}
