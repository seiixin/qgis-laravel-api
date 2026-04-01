<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Get current settings for the authenticated user.
     */
    public function read(Request $request)
    {
        $settings = AppSetting::where('user_id', $request->user()->id)->first();

        if (!$settings) {
            return response()->json(['message' => 'Settings not found'], 404);
        }

        return response()->json($settings, 200);
    }

    /**
     * Update all settings at once.
     */
    public function update(Request $request)
    {
        $request->validate([
            'language'      => 'sometimes|string|in:English,Tagalog,Kapampangan',
            'font_size'     => 'sometimes|string|in:small,medium,large',
            'dark_mode'     => 'sometimes|boolean',
            'text_to_speech'=> 'sometimes|boolean',
        ]);

        $settings = AppSetting::updateOrCreate(
            ['user_id' => $request->user()->id],
            $request->only(['language', 'font_size', 'dark_mode', 'text_to_speech'])
        );

        return response()->json($settings, 200);
    }

    /**
     * Gap 4 fix: PUT /settings/language — now uses AppSetting (same table as PUT /settings)
     */
    public function updateLanguage(Request $request)
    {
        $request->validate([
            'language' => 'required|string|in:English,Tagalog,Kapampangan',
        ]);

        $settings = AppSetting::updateOrCreate(
            ['user_id' => $request->user()->id],
            ['language' => $request->language]
        );

        return response()->json($settings, 200);
    }

    /**
     * Gap 4 fix: PUT /settings/accessibility — now uses AppSetting (same table as PUT /settings)
     */
    public function updateAccessibility(Request $request)
    {
        $request->validate([
            'dark_mode'      => 'sometimes|boolean',
            'font_size'      => 'sometimes|string|in:small,medium,large',
            'tts_enabled'    => 'sometimes|boolean',
            'high_contrast'  => 'sometimes|boolean',
        ]);

        $settings = AppSetting::updateOrCreate(
            ['user_id' => $request->user()->id],
            array_filter([
                'dark_mode'      => $request->dark_mode,
                'font_size'      => $request->font_size,
                'text_to_speech' => $request->tts_enabled,
            ], fn($v) => !is_null($v))
        );

        return response()->json($settings, 200);
    }
}
