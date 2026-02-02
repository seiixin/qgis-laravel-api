<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\EmergencyHotline;
use App\Models\UserContact;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function hotlines(){ return EmergencyHotline::all(); }
    public function store(Request $r){ return UserContact::create($r->all()); }
    public function destroy($id){ return UserContact::destroy($id); }
}
