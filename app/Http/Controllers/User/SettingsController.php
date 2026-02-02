<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller {
    public function update(Request $request) {
        return AppSetting::updateOrCreate(
            ['user_identifier' => $request->user()->id],
            $request->only(['language','font_size','dark_mode','text_to_speech'])
        );
    }
}
