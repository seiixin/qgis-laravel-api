<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_no', 'listing_id', 'buyer_id', 'seller_id', 'midman_id', 'status', 'dispute_status',
        'amount', 'currency', 'meta', 'pending_review_at', 'paid_verified_at', 'completed_at',
        'last_status_at'
    ];

    // Define relationships
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function midman()
    {
        return $this->belongsTo(User::class, 'midman_id');
    }

    public function paymentProof()
    {
        return $this->hasOne(OrderPaymentProof::class);
    }

    public function deliveries()
    {
        return $this->hasMany(OrderDelivery::class);
    }

    public function disputes()
    {
        return $this->hasMany(OrderDispute::class);
    }
}
