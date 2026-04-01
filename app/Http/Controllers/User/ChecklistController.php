<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ChecklistItem;
use App\Models\ChecklistProgress;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Gap 1 fix: return field as "label" (aliased from "instruction")
     * Gap 6 fix: filter by ?language= query param
     */
    public function viewChecklist(Request $request)
    {
        $query = ChecklistItem::select('id', 'phase', 'instruction as label', 'language');

        if ($request->filled('language')) {
            $query->where('language', $request->language);
        }

        return response()->json($query->get(), 200);
    }

    /**
     * Gap 2 fix: accept batch array { "progress": [{ "checklist_item_id": 1, "is_completed": true }] }
     * Also still accepts single-item format for backwards compatibility.
     */
    public function saveChecklistCompletion(Request $request)
    {
        $request->validate([
            'progress'                          => 'required|array|min:1',
            'progress.*.checklist_item_id'      => 'required|integer|exists:checklist_items,id',
            'progress.*.is_completed'           => 'required|boolean',
        ]);

        $userId = $request->user()->id;

        foreach ($request->progress as $item) {
            ChecklistProgress::updateOrCreate(
                [
                    'checklist_id'      => $item['checklist_item_id'],
                    'user_identifier'   => $userId,
                ],
                ['is_completed' => $item['is_completed']]
            );
        }

        return response()->json(['message' => 'Progress saved successfully'], 200);
    }
}
