<?php

namespace Tests\Feature;

use App\Models\ChecklistItem;
use App\Models\ChecklistProgress;
use App\Models\EarthquakeInfo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EarthquakeInfoApiTest extends TestCase
{
    use RefreshDatabase;

    private function token(): string
    {
        return User::factory()->create()->createToken('mobile')->plainTextToken;
    }

    // ─── GET /earthquake-info ─────────────────────────────────────────────────

    public function test_get_earthquake_info_returns_all_entries(): void
    {
        EarthquakeInfo::factory()->count(4)->create();

        $response = $this->withToken($this->token())->getJson('/api/earthquake-info');

        $response->assertStatus(200)
                 ->assertJsonCount(4);
    }

    public function test_get_earthquake_info_returns_expected_fields(): void
    {
        EarthquakeInfo::factory()->create([
            'title'      => 'What is an Earthquake?',
            'content'    => 'An earthquake is...',
            'media_type' => 'image',
            'media_url'  => 'https://example.com/img.jpg',
            'language'   => 'English',
        ]);

        $response = $this->withToken($this->token())->getJson('/api/earthquake-info');

        $response->assertStatus(200)
                 ->assertJsonStructure([['id', 'title', 'content', 'media_type', 'media_url', 'language']])
                 ->assertJsonFragment(['title' => 'What is an Earthquake?', 'language' => 'English']);
    }

    public function test_get_earthquake_info_returns_empty_array_when_none(): void
    {
        $response = $this->withToken($this->token())->getJson('/api/earthquake-info');

        $response->assertStatus(200)->assertJsonCount(0);
    }

    public function test_get_earthquake_info_requires_authentication(): void
    {
        $this->getJson('/api/earthquake-info')->assertStatus(401);
    }

    // ─── GET /checklist-items ─────────────────────────────────────────────────

    public function test_get_checklist_items_returns_all_items(): void
    {
        ChecklistItem::factory()->count(5)->create();

        $response = $this->withToken($this->token())->getJson('/api/checklist-items');

        $response->assertStatus(200)
                 ->assertJsonCount(5);
    }

    public function test_get_checklist_items_returns_expected_fields(): void
    {
        ChecklistItem::factory()->create([
            'phase'       => 'before',
            'instruction' => 'Prepare emergency kit',
            'language'    => 'English',
        ]);

        $response = $this->withToken($this->token())->getJson('/api/checklist-items');

        $response->assertStatus(200)
                 ->assertJsonStructure([['id', 'phase', 'instruction', 'language']])
                 ->assertJsonFragment(['phase' => 'before', 'instruction' => 'Prepare emergency kit']);
    }

    public function test_get_checklist_items_requires_authentication(): void
    {
        $this->getJson('/api/checklist-items')->assertStatus(401);
    }

    // ─── POST /earthquake/checklist/progress ──────────────────────────────────

    public function test_save_checklist_progress_creates_record(): void
    {
        $token = $this->token();
        $item  = ChecklistItem::factory()->create();

        $response = $this->withToken($token)->postJson('/api/earthquake/checklist/progress', [
            'checklist_id' => $item->id,
            'is_completed' => true,
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Checklist progress saved successfully']);

        $this->assertDatabaseHas('checklist_progress', [
            'checklist_id' => $item->id,
            'is_completed' => 1,
        ]);
    }

    public function test_save_checklist_progress_updates_existing_record(): void
    {
        $token = $this->token();
        $item  = ChecklistItem::factory()->create();

        // Create initial progress
        ChecklistProgress::create(['checklist_id' => $item->id, 'is_completed' => false]);

        // Update it
        $response = $this->withToken($token)->postJson('/api/earthquake/checklist/progress', [
            'checklist_id' => $item->id,
            'is_completed' => true,
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('checklist_progress', [
            'checklist_id' => $item->id,
            'is_completed' => 1,
        ]);
        $this->assertDatabaseCount('checklist_progress', 1);
    }

    public function test_save_checklist_progress_fails_with_invalid_checklist_id(): void
    {
        $token = $this->token();

        $response = $this->withToken($token)->postJson('/api/earthquake/checklist/progress', [
            'checklist_id' => 9999,
            'is_completed' => true,
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['checklist_id']);
    }

    public function test_save_checklist_progress_fails_with_missing_fields(): void
    {
        $token = $this->token();

        $response = $this->withToken($token)->postJson('/api/earthquake/checklist/progress', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['checklist_id', 'is_completed']);
    }

    public function test_save_checklist_progress_requires_authentication(): void
    {
        $this->postJson('/api/earthquake/checklist/progress', [])->assertStatus(401);
    }
}
