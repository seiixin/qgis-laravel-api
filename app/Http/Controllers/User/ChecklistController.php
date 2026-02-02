<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\ChecklistProgress;
use Illuminate\Http\Request;

class ChecklistController extends Controller {
    public function saveProgress(Request $request) {
        return ChecklistProgress::updateOrCreate(
            ['checklist_id'=>$request->checklist_id],
            ['is_completed'=>$request->is_completed]
        );
    }
}
