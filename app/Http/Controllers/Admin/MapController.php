<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Map;
use App\Models\OfflineMap;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:100',
            'type'        => 'required|in:evacuation,hazard,geojson,wms',
            // map_url must be a valid URL for tile/WMS/embed sources,
            // OR a relative path like "geojson/BRGY_BOUNDS" for GeoJSON layers.
            'map_url'     => 'required|string',
            'description' => 'nullable|string',
            'is_active'   => 'boolean',
        ]);

        return response()->json(Map::create($data), 201);
    }

    public function update(Request $request, $id)
    {
        $map  = Map::findOrFail($id);
        $data = $request->validate([
            'name'        => 'sometimes|string|max:100',
            'type'        => 'sometimes|in:evacuation,hazard,geojson,wms',
            'map_url'     => 'sometimes|string',
            'description' => 'nullable|string',
            'is_active'   => 'boolean',
        ]);

        $map->update($data);
        return response()->json($map, 200);
    }

    public function storeOffline(Request $request)
    {
        return OfflineMap::create($request->only([
            'map_id','image_path','resolution'
        ]));
    }
}
