<?php

namespace Tests\Feature;

use App\Models\EmergencyHotline;
use App\Models\User;
use App\Models\UserContact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmergencyContactApiTest extends TestCase
{
    use RefreshDatabase;

    private function token(): string
    {
        return User::factory()->create()->createToken('mobile')->plainTextToken;
    }

    // ─── GET /emergency/hotlines ──────────────────────────────────────────────

    public function test_get_hotlines_returns_all_hotlines(): void
    {
        EmergencyHotline::factory()->count(3)->create();

        $response = $this->withToken($this->token())->getJson('/api/emergency/hotlines');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_get_hotlines_returns_expected_fields(): void
    {
        EmergencyHotline::factory()->create([
            'agency_name'  => 'MDRRMO Apalit',
            'phone_number' => '(045) 123-4567',
            'description'  => 'Municipal Disaster Risk Reduction',
        ]);

        $response = $this->withToken($this->token())->getJson('/api/emergency/hotlines');

        $response->assertStatus(200)
                 ->assertJsonFragment(['agency_name' => 'MDRRMO Apalit', 'phone_number' => '(045) 123-4567']);
    }

    public function test_get_hotlines_returns_404_when_none_exist(): void
    {
        $response = $this->withToken($this->token())->getJson('/api/emergency/hotlines');

        $response->assertStatus(404)
                 ->assertJson(['message' => 'No emergency hotlines found.']);
    }

    public function test_get_hotlines_requires_authentication(): void
    {
        $this->getJson('/api/emergency/hotlines')->assertStatus(401);
    }

    // ─── POST /emergency/contacts ─────────────────────────────────────────────

    public function test_add_contact_creates_record(): void
    {
        $token = $this->token();

        $response = $this->withToken($token)->postJson('/api/emergency/contacts', [
            'name'         => 'Juan dela Cruz',
            'contact_number' => '09171234567',
            'relationship' => 'Family',
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['message' => 'Contact created successfully.'])
                 ->assertJsonStructure(['message', 'data' => ['id', 'name', 'contact_number', 'relationship']]);

        $this->assertDatabaseHas('user_contacts', ['name' => 'Juan dela Cruz']);
    }

    public function test_add_contact_requires_authentication(): void
    {
        $this->postJson('/api/emergency/contacts', [
            'name'           => 'Test',
            'contact_number' => '09171234567',
            'relationship'   => 'Friend',
        ])->assertStatus(401);
    }

    // ─── DELETE /emergency/contacts/{id} ──────────────────────────────────────

    public function test_delete_contact_removes_record(): void
    {
        $token   = $this->token();
        $contact = UserContact::factory()->create();

        $response = $this->withToken($token)->deleteJson("/api/emergency/contacts/{$contact->id}");

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Contact deleted successfully.']);

        $this->assertDatabaseMissing('user_contacts', ['id' => $contact->id]);
    }

    public function test_delete_contact_returns_404_for_missing_contact(): void
    {
        $token = $this->token();

        $response = $this->withToken($token)->deleteJson('/api/emergency/contacts/9999');

        $response->assertStatus(404)
                 ->assertJson(['message' => 'Contact not found.']);
    }

    public function test_delete_contact_requires_authentication(): void
    {
        $contact = UserContact::factory()->create();

        $this->deleteJson("/api/emergency/contacts/{$contact->id}")->assertStatus(401);
    }
}
