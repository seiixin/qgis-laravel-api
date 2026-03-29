<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Map;
use App\Models\OfflineMap;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * View the list of active maps.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Fetch all active maps with their respective fields
        $maps = Map::where('is_active', 1)->get(['id', 'name', 'type', 'map_url', 'description']);

        return response()->json($maps, 200);
    }

    /**
     * View a specific map by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // Fetch a specific map by ID
        $map = Map::findOrFail($id, ['id', 'name', 'type', 'map_url', 'description']);

        return response()->json($map, 200);
    }

    /**
     * View the offline map images for a specific map by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function offline($id)
    {
        // Fetch offline maps related to the specified map_id
        $offlineMaps = OfflineMap::where('map_id', $id)->get(['id', 'map_id', 'image_path', 'resolution']);

        return response()->json($offlineMaps, 200);
    }

    /**
     * List available GeoJSON layer names.
     */
    public function geojsonList()
    {
        $dir    = public_path('geojson');
        $files  = glob($dir . '/*.geojson') ?: [];
        $layers = array_map(fn($f) => pathinfo($f, PATHINFO_FILENAME), $files);
        return response()->json(array_values($layers), 200);
    }

    /**
     * Serve a GeoJSON layer by name.
     */
    public function geojson(string $layer)
    {
        $path = public_path('geojson/' . $layer . '.geojson');
        if (!file_exists($path)) {
            return response()->json(['message' => 'Layer not found.'], 404);
        }
        return response()->file($path, ['Content-Type' => 'application/geo+json']);
    }
}
