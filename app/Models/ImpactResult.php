<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpactResult extends Model
{
    use HasFactory;

    // Disable timestamps (created_at and updated_at)
    public $timestamps = false;

    protected $table = 'impact_results';

    protected $fillable = [
        'scenario_name', 'fault_name', 'casualties', 'economic_loss', 'currency'
    ];
}
