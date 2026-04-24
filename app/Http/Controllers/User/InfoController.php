<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\EarthquakeInfo;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index(Request $request)
    {
        $query = EarthquakeInfo::select('id', 'title', 'content', 'media_type', 'media_url', 'language');

        if ($request->filled('language')) {
            $query->where('language', $request->language);
        }

        // Deduplicate by title — keep only the first entry per title
        $all = $query->orderBy('id')->get();
        $seen = [];
        $deduped = $all->filter(function ($item) use (&$seen) {
            $key = strtolower(trim($item->title));
            if (isset($seen[$key])) return false;
            $seen[$key] = true;
            return true;
        })->values();

        return response()->json($deduped, 200);
    }
}
