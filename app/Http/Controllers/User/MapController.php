<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Map;
use App\Models\OfflineMap;

class MapController extends Controller
{
    public function index() {
        return Map::where('is_active',1)->get();
    }

    public function show($id) {
        return Map::findOrFail($id);
    }

    public function offline($id) {
        return OfflineMap::where('map_id',$id)->get();
    }
}
