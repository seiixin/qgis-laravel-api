<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayoutRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'seller_id', 'order_id', 'amount', 'currency', 'payout_method', 'payout_account', 'remarks', 'status', 'approved_by_id', 'approval_notes', 'paid_reference', 'paid_at'
    ];

    // Define relationships
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }
}
