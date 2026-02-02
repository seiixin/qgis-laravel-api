<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\EarthquakeInfo;

class InfoController extends Controller
{
    public function index() {
        return EarthquakeInfo::all();
    }
}
