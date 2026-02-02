<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\UserSetting;
use Illuminate\Http\Request;

class AccessibilityController extends Controller {
    public function update(Request $request) {
        return UserSetting::updateOrCreate(
            ['user_identifier'=>$request->user()->id],
            $request->only(['font_size','text_to_speech','speech_to_text','high_contrast'])
        );
    }
}
