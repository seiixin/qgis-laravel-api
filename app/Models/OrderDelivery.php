<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDelivery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id', 'delivered_by_id', 'delivered_to_id', 'stage', 'delivery_payload', 'delivered_at', 'confirmed_at'
    ];

    // Define relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function deliveredBy()
    {
        return $this->belongsTo(User::class, 'delivered_by_id');
    }

    public function deliveredTo()
    {
        return $this->belongsTo(User::class, 'delivered_to_id');
    }
}
