<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\EarthquakeInfo;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Gap 5 fix: filter by ?language= query param
     */
    public function index(Request $request)
    {
        $query = EarthquakeInfo::select('id', 'title', 'content', 'media_type', 'media_url', 'language');

        if ($request->filled('language')) {
            $query->where('language', $request->language);
        }

        return response()->json($query->get(), 200);
    }
}
