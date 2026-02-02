<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChecklistItem;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function store(Request $request)
    {
        return ChecklistItem::create($request->only([
            'phase','instruction','language'
        ]));
    }
}
