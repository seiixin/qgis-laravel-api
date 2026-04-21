<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ChecklistItem;
use App\Models\ChecklistProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChecklistController extends Controller
{
    /**
     * Map string item keys (b1-b7, a1-a7) to stable integers.
     * This avoids needing checklist_items rows in the DB.
     */
    private static function keyToId(string $key): int
    {
        $map = [
            'b1' => 101, 'b2' => 102, 'b3' => 103, 'b4' => 104,
            'b5' => 105, 'b6' => 106, 'b7' => 107,
            'a1' => 201, 'a2' => 202, 'a3' => 203, 'a4' => 204,
            'a5' => 205, 'a6' => 206, 'a7' => 207,
        ];
        return $map[$key] ?? crc32($key) & 0x7FFFFFFF;
    }

    private static function idToKey(int $id): string
    {
        $map = array_flip([
            'b1' => 101, 'b2' => 102, 'b3' => 103, 'b4' => 104,
            'b5' => 105, 'b6' => 106, 'b7' => 107,
            'a1' => 201, 'a2' => 202, 'a3' => 203, 'a4' => 204,
            'a5' => 205, 'a6' => 206, 'a7' => 207,
        ]);
        return $map[$id] ?? (string) $id;
    }

    /**
     * GET /checklist-items — return checklist items by language.
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
     * GET /checklist-progress — return { "b1": true, "b2": false, ... }
     */
    public function getProgress(Request $request)
    {
        $userId = $request->user()->id;

        $rows = ChecklistProgress::where('user_identifier', $userId)->get();

        $result = [];
        foreach ($rows as $row) {
            $key = self::idToKey($row->checklist_id);
            $result[$key] = (bool) $row->is_completed;
        }

        return response()->json((object) $result, 200);
    }

    /**
     * PUT /checklist-progress — save { "b1": true, "b2": false, ... }
     */
    public function saveProgress(Request $request)
    {
        $userId = $request->user()->id;
        $data   = $request->all();

        foreach ($data as $key => $value) {
            $checklistId = self::keyToId((string) $key);

            ChecklistProgress::updateOrCreate(
                [
                    'checklist_id'    => $checklistId,
                    'user_identifier' => $userId,
                ],
                ['is_completed' => (bool) $value]
            );
        }

        return response()->json(['message' => 'Progress saved'], 200);
    }

    /**
     * POST /earthquake/checklist/progress — legacy batch format.
     */
    public function saveChecklistCompletion(Request $request)
    {
        $request->validate([
            'progress'                     => 'required|array|min:1',
            'progress.*.checklist_item_id' => 'required|integer',
            'progress.*.is_completed'      => 'required|boolean',
        ]);

        $userId = $request->user()->id;

        foreach ($request->progress as $item) {
            ChecklistProgress::updateOrCreate(
                [
                    'checklist_id'    => $item['checklist_item_id'],
                    'user_identifier' => $userId,
                ],
                ['is_completed' => $item['is_completed']]
            );
        }

        return response()->json(['message' => 'Progress saved successfully'], 200);
    }
}
