<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ImpactResult;

class ImpactController extends Controller
{
    public function index()
    {
        $results = ImpactResult::select(
            'id', 'scenario_name', 'fault_name', 'casualties', 'economic_loss', 'currency'
        )->get();

        return response()->json($results, 200);
    }
}
