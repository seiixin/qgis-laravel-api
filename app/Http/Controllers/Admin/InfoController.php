<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EarthquakeInfo;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function store(Request $request)
    {
        return EarthquakeInfo::create($request->only([
            'title','content','media_type','media_url','language'
        ]));
    }
}
