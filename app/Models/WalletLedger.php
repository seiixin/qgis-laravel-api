<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalletLedger extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'order_id', 'payout_request_id', 'type', 'amount', 'currency', 'balance_after', 'reason', 'meta', 'created_by_id', 'posted_at'
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function payoutRequest()
    {
        return $this->belongsTo(PayoutRequest::class, 'payout_request_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
