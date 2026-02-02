<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Update or create settings
    public function update(Request $request)
    {
        return AppSetting::updateOrCreate(
            ['user_identifier' => $request->user()->id],
            $request->only(['language', 'font_size', 'dark_mode', 'text_to_speech'])
        );
    }
    
    public function read(Request $request)
{
    $user = $request->user();
    \Log::info('Authenticated User:', [$user]);

    $settings = AppSetting::where('user_id', $user->id)->first();

    if ($settings) {
        return response()->json($settings, 200);
    }

    return response()->json(['message' => 'Settings not found'], 404);
}


}
