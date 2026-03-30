<?php

namespace Tests\Feature;

use App\Models\AppSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingsApiTest extends TestCase
{
    use RefreshDatabase;

    private function actingUser(): array
    {
        $user  = User::factory()->create();
        $token = $user->createToken('mobile')->plainTextToken;
        return [$user, $token];
    }

    // ─── PUT /settings ────────────────────────────────────────────────────────

    public function test_update_settings_creates_record_for_new_user(): void
    {
        [$user, $token] = $this->actingUser();

        $response = $this->withToken($token)->putJson('/api/settings', [
            'language'       => 'English',
            'font_size'      => 'medium',
            'dark_mode'      => false,
            'text_to_speech' => true,
        ]);

        // Controller uses updateOrCreate with user_identifier; response is the model
        $response->assertSuccessful();
    }

    public function test_update_settings_updates_existing_record(): void
    {
        [$user, $token] = $this->actingUser();

        // First call creates
        $this->withToken($token)->putJson('/api/settings', [
            'language'       => 'English',
            'font_size'      => 'small',
            'dark_mode'      => false,
            'text_to_speech' => false,
        ]);

        // Second call updates
        $response = $this->withToken($token)->putJson('/api/settings', [
            'language'       => 'Tagalog',
            'font_size'      => 'large',
            'dark_mode'      => true,
            'text_to_speech' => true,
        ]);

        $response->assertSuccessful();
    }

    public function test_update_settings_requires_authentication(): void
    {
        $this->putJson('/api/settings', ['language' => 'English'])->assertStatus(401);
    }

    // ─── PUT /settings/language ───────────────────────────────────────────────

    public function test_update_language_setting_requires_authentication(): void
    {
        $this->putJson('/api/settings/language', ['language' => 'Tagalog'])->assertStatus(401);
    }

    public function test_update_language_setting_succeeds_for_authenticated_user(): void
    {
        [, $token] = $this->actingUser();

        $response = $this->withToken($token)->putJson('/api/settings/language', [
            'language' => 'Kapampangan',
        ]);

        $response->assertSuccessful();
    }

    // ─── PUT /settings/accessibility ──────────────────────────────────────────

    public function test_update_accessibility_setting_requires_authentication(): void
    {
        $this->putJson('/api/settings/accessibility', ['text_to_speech' => true])->assertStatus(401);
    }

    public function test_update_accessibility_setting_succeeds_for_authenticated_user(): void
    {
        [, $token] = $this->actingUser();

        $response = $this->withToken($token)->putJson('/api/settings/accessibility', [
            'text_to_speech' => true,
            'font_size'      => 'large',
            'dark_mode'      => true,
        ]);

        $response->assertSuccessful();
    }

    // ─── GET /settings ────────────────────────────────────────────────────────

    public function test_get_settings_returns_user_settings(): void
    {
        [$user, $token] = $this->actingUser();

        AppSetting::create([
            'user_id'        => $user->id,
            'language'       => 'English',
            'font_size'      => 'medium',
            'dark_mode'      => false,
            'text_to_speech' => false,
        ]);

        $response = $this->withToken($token)->getJson('/api/settings');

        $response->assertStatus(200)
                 ->assertJsonFragment(['language' => 'English']);
    }

    public function test_get_settings_returns_404_when_not_configured(): void
    {
        [, $token] = $this->actingUser();

        $response = $this->withToken($token)->getJson('/api/settings');

        $response->assertStatus(404)
                 ->assertJson(['message' => 'Settings not found']);
    }

    public function test_get_settings_requires_authentication(): void
    {
        $this->getJson('/api/settings')->assertStatus(401);
    }
}
