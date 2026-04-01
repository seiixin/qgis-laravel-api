<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\EmergencyHotline;
use App\Models\UserContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Get all official emergency hotlines.
     */
    public function hotlines()
    {
        $hotlines = EmergencyHotline::all();

        if ($hotlines->isEmpty()) {
            return response()->json(['message' => 'No emergency hotlines found.'], 404);
        }

        return response()->json($hotlines, 200);
    }

    /**
     * Gap 3 fix: GET /emergency/contacts — return the authenticated user's personal contacts.
     */
    public function index(Request $request)
    {
        $contacts = UserContact::where('user_identifier', $request->user()->id)
            ->get()
            ->map(fn($c) => [
                'id'           => $c->id,
                'name'         => $c->name,
                'phone'        => $c->contact_number,
                'relationship' => $c->relationship,
            ]);

        return response()->json($contacts, 200);
    }

    /**
     * Store a new personal contact for the authenticated user.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'phone'        => 'required|string|max:50',
            'relationship' => 'nullable|string|max:100',
        ]);

        $contact = UserContact::create([
            'user_identifier' => $request->user()->id,
            'name'            => $request->name,
            'contact_number'  => $request->phone,
            'relationship'    => $request->relationship ?? '',
        ]);

        // Return with "phone" key so Android gets consistent field name
        return response()->json([
            'message' => 'Contact created successfully.',
            'data'    => [
                'id'           => $contact->id,
                'name'         => $contact->name,
                'phone'        => $contact->contact_number,
                'relationship' => $contact->relationship,
            ],
        ], 201);
    }

    /**
     * Delete a personal contact (only if it belongs to the authenticated user).
     */
    public function destroy(Request $request, $id)
    {
        $contact = UserContact::where('id', $id)
            ->where('user_identifier', $request->user()->id)
            ->first();

        if (!$contact) {
            return response()->json(['message' => 'Contact not found.'], 404);
        }

        $contact->delete();
        return response()->json(['message' => 'Contact deleted successfully.'], 200);
    }
}
