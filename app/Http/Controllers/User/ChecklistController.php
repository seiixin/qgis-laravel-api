<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ChecklistItem; 
use App\Models\ChecklistProgress;  // New model for checklist progress
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * View the preparedness checklist.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewChecklist(Request $request)
    {
        // Fetch all checklist items
        $checklistItems = ChecklistItem::select('id', 'phase', 'instruction', 'language')
                                       ->get();  // You can apply additional filters if needed

        // Return the checklist items
        return response()->json($checklistItems, 200);
    }

    /**
     * Save checklist completion status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveChecklistCompletion(Request $request)
    {
        // Validate the input
        $request->validate([
            'checklist_id' => 'required|exists:checklist_items,id', // Ensure checklist item exists
            'is_completed' => 'required|boolean',
        ]);

        // Create or update the checklist progress
        $progress = ChecklistProgress::updateOrCreate(
            ['checklist_id' => $request->checklist_id], 
            ['is_completed' => $request->is_completed]
        );

        // Return success response
        return response()->json(['message' => 'Checklist progress saved successfully', 'data' => $progress], 200);
    }
}
