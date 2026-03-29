<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'maps';

    // Disable automatic handling of created_at and updated_at columns
    public $timestamps = false; // Disable automatic timestamp management

    protected $fillable = [
        'name', 'type', 'map_url', 'description', 'is_active'
    ];

    /**
     * Valid map types:
     *  - 'evacuation' / 'hazard' : XYZ tile URL  e.g. https://tile.server/{z}/{x}/{y}.png
     *  - 'wms'                   : WMS URL        e.g. http://qgis-server/wms?SERVICE=WMS&...
     *  - 'geojson'               : layer name     e.g. "BRGY_BOUNDS"  (served via /api/geojson/{layer})
     *
     * The mobile app should branch on `type` to decide how to render the map:
     *   geojson → fetch /api/geojson/{map_url} and render with Leaflet/MapLibre
     *   wms     → add as a WMS tile layer
     *   *       → treat map_url as an XYZ tile template
     */
}
