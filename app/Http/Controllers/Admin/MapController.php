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
        return Map::create($request->only([
            'name','type','map_url','description','is_active'
        ]));
    }

    public function update(Request $request, $id)
    {
        $map = Map::findOrFail($id);
        $map->update($request->only([
            'name','map_url','description','is_active'
        ]));
        return $map;
    }

    public function storeOffline(Request $request)
    {
        return OfflineMap::create($request->only([
            'map_id','image_path','resolution'
        ]));
    }
}
