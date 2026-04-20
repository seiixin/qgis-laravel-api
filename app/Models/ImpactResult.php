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
        'scenario_name', 'fault_name', 'casualties', 'economic_loss', 'currency',
        'slight_injuries_day', 'slight_injuries_night',
        'non_life_threatening_day', 'non_life_threatening_night',
        'life_threatening_day', 'life_threatening_night',
        'fatalities_day', 'fatalities_night',
        'color_day', 'color_night',
    ];
}
