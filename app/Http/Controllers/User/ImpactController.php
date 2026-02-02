<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\EmergencyHotline;
use App\Models\UserEmergencyContact;  // Updated model
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

    // Store a new emergency contact
    public function store(Request $r) {
        // Now using UserEmergencyContact model
        $contact = UserEmergencyContact::create($r->all());
        return response()->json(['message' => 'Emergency contact created successfully.', 'data' => $contact], 201);
    }

    // Delete a user contact
    public function destroy($id) {
        $contact = UserEmergencyContact::find($id);  // Updated model
        if (!$contact) {
            return response()->json(['message' => 'Emergency contact not found.'], 404);
        }
        $contact->delete();
        return response()->json(['message' => 'Emergency contact deleted successfully.'], 200);
    }
}
