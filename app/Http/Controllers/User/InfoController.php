<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\EarthquakeInfo;

class InfoController extends Controller
{
    /**
     * Get all earthquake information.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Fetch all earthquake information from the EarthquakeInfo model
        $earthquakeInfo = EarthquakeInfo::select('id', 'title', 'content', 'media_type', 'media_url', 'language')->get();

        // Return the earthquake information in JSON format
        return response()->json($earthquakeInfo, 200);
    }
}
