<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderPaymentProof extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id', 'buyer_id', 'payment_method', 'payment_reference', 'status', 'reviewed_by_id', 'review_notes'
    ];

    // Define relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function reviewedBy()
    {
        return $this->belongsTo(User::class, 'reviewed_by_id');
    }
}
