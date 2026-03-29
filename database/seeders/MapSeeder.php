<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Map;
use App\Models\OfflineMap;

class MapSeeder extends Seeder
{
    public function run(): void
    {
        // Remove any placeholder / bad records left from earlier seeds
        Map::where('map_url', 'like', '%example.com%')->delete();
        OfflineMap::where('image_path', 'offline_map_zone8.png')->delete();

        $layers = [
            [
                'name'        => 'Barangay Boundaries',
                'type'        => 'geojson',
                'map_url'     => '/api/geojson/BRGY_BOUNDS',
                'description' => 'Apalit barangay boundary polygons',
                'is_active'   => 1,
            ],
            [
                'name'        => 'Brgy Lourdes',
                'type'        => 'geojson',
                'map_url'     => '/api/geojson/Brgy_Lourdes',
                'description' => 'Barangay Lourdes boundary',
                'is_active'   => 1,
            ],
            [
                'name'        => 'Brgy Lourdes Subdivision Extension',
                'type'        => 'geojson',
                'map_url'     => '/api/geojson/Brgy_Lourdes Subdivision Extension',
                'description' => 'Barangay Lourdes Subdivision Extension boundary',
                'is_active'   => 1,
            ],
            [
                'name'        => 'Brgy Tagumpay',
                'type'        => 'geojson',
                'map_url'     => '/api/geojson/Brgy_Tagumpay',
                'description' => 'Barangay Tagumpay boundary',
                'is_active'   => 1,
            ],
            [
                'name'        => 'Escopa Barangay Bounds',
                'type'        => 'geojson',
                'map_url'     => '/api/geojson/ESCOPA_BRGY_BOUNDS',
                'description' => 'Escopa barangay boundary polygons',
                'is_active'   => 1,
            ],
            [
                'name'        => 'Escopa I',
                'type'        => 'geojson',
                'map_url'     => '/api/geojson/EscopaI',
                'description' => 'Escopa I barangay boundary',
                'is_active'   => 1,
            ],
            [
                'name'        => 'San Vicente',
                'type'        => 'geojson',
                'map_url'     => '/api/geojson/San Vicente',
                'description' => 'San Vicente barangay boundary',
                'is_active'   => 1,
            ],
            [
                'name'        => 'Tagumpay',
                'type'        => 'geojson',
                'map_url'     => '/api/geojson/Tagumpay',
                'description' => 'Tagumpay barangay boundary',
                'is_active'   => 1,
            ],
        ];

        foreach ($layers as $layer) {
            Map::updateOrCreate(['name' => $layer['name']], $layer);
        }
    }
}
