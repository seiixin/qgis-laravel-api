<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\UserSetting;
use Illuminate\Http\Request;

class LanguageController extends Controller {
    public function update(Request $request) {
        return UserSetting::updateOrCreate(
            ['user_identifier'=>$request->user()->id],
            ['language'=>$request->language]
        );
    }
}
