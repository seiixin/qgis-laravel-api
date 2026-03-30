<?php

namespace Tests\Feature;

use App\Models\Map;
use App\Models\OfflineMap;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MapApiTest extends TestCase
{
    use RefreshDatabase;

    private function actingAsUser(): string
    {
        $user  = User::factory()->create();
        return $user->createToken('mobile')->plainTextToken;
    }

    // ─── GET /maps ────────────────────────────────────────────────────────────

    public function test_get_maps_returns_active_maps(): void
    {
        $token = $this->actingAsUser();

        Map::factory()->count(2)->create(['is_active' => 1]);
        Map::factory()->create(['is_active' => 0]); // should be excluded

        $response = $this->withToken($token)->getJson('/api/maps');

        $response->assertStatus(200)
                 ->assertJsonCount(2);
    }

    public function test_get_maps_returns_expected_fields(): void
    {
        $token = $this->actingAsUser();
        Map::factory()->create(['is_active' => 1]);

        $response = $this->withToken($token)->getJson('/api/maps');

        $response->assertStatus(200)
                 ->assertJsonStructure([['id', 'name', 'type', 'map_url', 'description']]);
    }

    public function test_get_maps_requires_authentication(): void
    {
        $this->getJson('/api/maps')->assertStatus(401);
    }

    // ─── GET /maps/{id} ───────────────────────────────────────────────────────

    public function test_get_single_map_returns_correct_map(): void
    {
        $token = $this->actingAsUser();
        $map   = Map::factory()->create(['is_active' => 1, 'name' => 'Evacuation Map']);

        $response = $this->withToken($token)->getJson("/api/maps/{$map->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Evacuation Map']);
    }

    public function test_get_single_map_returns_404_for_missing_map(): void
    {
        $token = $this->actingAsUser();

        $this->withToken($token)->getJson('/api/maps/9999')->assertStatus(404);
    }

    // ─── GET /maps/{id}/offline ───────────────────────────────────────────────

    public function test_get_offline_images_returns_images_for_map(): void
    {
        $token = $this->actingAsUser();
        $map   = Map::factory()->create(['is_active' => 1]);
        OfflineMap::factory()->count(3)->create(['map_id' => $map->id]);

        $response = $this->withToken($token)->getJson("/api/maps/{$map->id}/offline");

        $response->assertStatus(200)
                 ->assertJsonCount(3)
                 ->assertJsonStructure([['id', 'map_id', 'image_path', 'resolution']]);
    }

    public function test_get_offline_images_returns_empty_array_when_none(): void
    {
        $token = $this->actingAsUser();
        $map   = Map::factory()->create(['is_active' => 1]);

        $response = $this->withToken($token)->getJson("/api/maps/{$map->id}/offline");

        $response->assertStatus(200)
                 ->assertJsonCount(0);
    }

    // ─── GET /geojson ─────────────────────────────────────────────────────────

    public function test_geojson_list_returns_array(): void
    {
        $token = $this->actingAsUser();

        // The endpoint reads from public/geojson — returns empty array when no files
        $response = $this->withToken($token)->getJson('/api/geojson');

        $response->assertStatus(200)
                 ->assertJsonIsArray();
    }

    public function test_geojson_list_requires_authentication(): void
    {
        $this->getJson('/api/geojson')->assertStatus(401);
    }

    // ─── GET /geojson/{layer} ─────────────────────────────────────────────────

    public function test_geojson_layer_returns_404_for_missing_layer(): void
    {
        $token = $this->actingAsUser();

        $response = $this->withToken($token)->getJson('/api/geojson/nonexistent_layer');

        $response->assertStatus(404)
                 ->assertJson(['message' => 'Layer not found.']);
    }
}
