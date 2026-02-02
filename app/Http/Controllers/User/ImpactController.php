<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ImpactResult;

class ImpactController extends Controller
{
    public function index() {
        return ImpactResult::all();
    }
}
