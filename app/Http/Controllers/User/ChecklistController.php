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
     * Get the current user's checklist progress (stored as JSON in app_settings).
     * Returns { "b1": true, "b2": false, ... }
     */
    public function getProgress(Request $request)
    {
        $settings = \App\Models\AppSetting::where('user_id', $request->user()->id)->first();
        $progress = $settings?->checklist_progress ?? [];
        return response()->json((object) $progress, 200);
    }

    /**
     * Save checklist progress as a JSON blob.
     * Accepts { "b1": true, "b2": false, ... }
     */
    public function saveProgress(Request $request)
    {
        $request->validate(['*' => 'boolean']);

        \App\Models\AppSetting::updateOrCreate(
            ['user_id' => $request->user()->id],
            ['checklist_progress' => $request->all()]
        );

        return response()->json(['message' => 'Progress saved'], 200);
    } { "progress": [{ "checklist_item_id": 1, "is_completed": true }] }
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
