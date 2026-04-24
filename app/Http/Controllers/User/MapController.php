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

    /**
     * Proxy OSRM routing so the mobile app doesn't need direct external access.
     * GET /api/route?from_lat=&from_lng=&to_lat=&to_lng=
     */
    public function route(Request $request)
    {
        $request->validate([
            'from_lat' => 'required|numeric',
            'from_lng' => 'required|numeric',
            'to_lat'   => 'required|numeric',
            'to_lng'   => 'required|numeric',
        ]);

        $fromLng = $request->from_lng;
        $fromLat = $request->from_lat;
        $toLng   = $request->to_lng;
        $toLat   = $request->to_lat;

        $url = "https://router.project-osrm.org/route/v1/driving/{$fromLng},{$fromLat};{$toLng},{$toLat}?overview=full&geometries=geojson&steps=true";

        try {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
            $body   = curl_exec($ch);
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($status === 200 && $body) {
                $data = json_decode($body, true);
                if (($data['code'] ?? '') === 'Ok' && !empty($data['routes'][0])) {
                    $route = $data['routes'][0];
                    // Extract turn-by-turn steps
                    $steps = [];
                    foreach ($route['legs'] ?? [] as $leg) {
                        foreach ($leg['steps'] ?? [] as $step) {
                            $maneuver = $step['maneuver'] ?? [];
                            $type     = $maneuver['type'] ?? '';
                            $modifier = $maneuver['modifier'] ?? '';
                            $location = $maneuver['location'] ?? [0, 0];
                            if ($type && $type !== 'depart') {
                                $steps[] = [
                                    'type'     => $type,
                                    'modifier' => $modifier,
                                    'lng'      => $location[0],
                                    'lat'      => $location[1],
                                    'distance' => $step['distance'] ?? 0,
                                    'name'     => $step['name'] ?? '',
                                ];
                            }
                        }
                    }
                    return response()->json([
                        'ok'          => true,
                        'coordinates' => $route['geometry']['coordinates'],
                        'distance'    => $route['distance'],
                        'steps'       => $steps,
                    ]);
                }
            }
        } catch (\Throwable $e) {
            // fall through
        }

        return response()->json(['ok' => false, 'message' => 'Routing failed'], 502);
    }
}
