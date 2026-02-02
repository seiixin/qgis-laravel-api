<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\EmergencyHotline;
use App\Models\UserContact;
use Illuminate\Http\Request;

class ContactController extends Controller {
    // Get all emergency hotlines
    public function hotlines() {
        $hotlines = EmergencyHotline::all();
        if ($hotlines->isEmpty()) {
            return response()->json(['message' => 'No emergency hotlines found.'], 404);
        }
        return response()->json($hotlines, 200);
    }

    // Store a new user contact
    public function store(Request $r) {
        $contact = UserContact::create($r->all());
        return response()->json(['message' => 'Contact created successfully.', 'data' => $contact], 201);
    }

    // Delete a user contact
    public function destroy($id) {
        $contact = UserContact::find($id);
        if (!$contact) {
            return response()->json(['message' => 'Contact not found.'], 404);
        }
        $contact->delete();
        return response()->json(['message' => 'Contact deleted successfully.'], 200);
    }
}
