<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImpactResult;
use Illuminate\Http\Request;

class ImpactController extends Controller
{
    public function store(Request $request)
    {
        return ImpactResult::create($request->only([
            'scenario_name','fault_name','casualties','economic_loss','currency'
        ]));
    }
}
