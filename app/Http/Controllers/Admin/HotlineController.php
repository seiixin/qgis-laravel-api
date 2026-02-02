<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmergencyHotline;
use Illuminate\Http\Request;

class HotlineController extends Controller
{
    public function store(Request $request)
    {
        return EmergencyHotline::create($request->only([
            'agency_name','phone_number','description'
        ]));
    }
}
