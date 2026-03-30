<?php

namespace Tests\Feature;

use App\Models\ImpactResult;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImpactApiTest extends TestCase
{
    use RefreshDatabase;

    private function token(): string
    {
        return User::factory()->create()->createToken('mobile')->plainTextToken;
    }

    // ─── GET /impact-results ──────────────────────────────────────────────────

    public function test_get_impact_results_returns_all_records(): void
    {
        ImpactResult::factory()->count(3)->create();

        $response = $this->withToken($this->token())->getJson('/api/impact-results');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_get_impact_results_returns_expected_fields(): void
    {
        ImpactResult::factory()->create([
            'scenario_name' => 'M7.2 West Valley',
            'fault_name'    => 'West Valley Fault',
            'casualties'    => 1200,
            'economic_loss' => 2500000000,
            'currency'      => 'PHP',
        ]);

        $response = $this->withToken($this->token())->getJson('/api/impact-results');

        $response->assertStatus(200)
                 ->assertJsonStructure([['id', 'scenario_name', 'fault_name', 'casualties', 'economic_loss', 'currency']])
                 ->assertJsonFragment([
                     'scenario_name' => 'M7.2 West Valley',
                     'casualties'    => 1200,
                     'currency'      => 'PHP',
                 ]);
    }

    public function test_get_impact_results_returns_empty_array_when_none(): void
    {
        $response = $this->withToken($this->token())->getJson('/api/impact-results');

        $response->assertStatus(200)
                 ->assertJsonCount(0);
    }

    public function test_get_impact_results_requires_authentication(): void
    {
        $this->getJson('/api/impact-results')->assertStatus(401);
    }
}
