<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Extend the type enum to support GeoJSON (client-side Leaflet/MapLibre)
        // and WMS (QGIS Server / GeoServer) in addition to the original values.
        DB::statement("ALTER TABLE maps MODIFY COLUMN type ENUM('evacuation','hazard','geojson','wms') NOT NULL");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE maps MODIFY COLUMN type ENUM('evacuation','hazard') NOT NULL");
    }
};
