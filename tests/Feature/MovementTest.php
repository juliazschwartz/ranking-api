<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Movement;

class MovementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_movements()
    {
        Movement::factory()->count(3)->create();

        $response = $this->getJson('/api/movements');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_create_a_movement()
    {
        $movementData = [
            'name' => 'New Movement'
        ];

        $response = $this->postJson('/api/movements', $movementData);

        $response->assertStatus(201)
                 ->assertJsonFragment($movementData);

        $this->assertDatabaseHas('movements', $movementData);
    }

    /** @test */
    public function it_can_show_a_movement()
    {
        $movement = Movement::factory()->create();

        $response = $this->getJson('/api/movements/' . $movement->id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => $movement->name]);
    }

    /** @test */
    public function it_can_update_a_movement()
    {
        $movement = Movement::factory()->create();

        $updateData = [
            'name' => 'Updated Movement'
        ];

        $response = $this->putJson('/api/movements/' . $movement->id, $updateData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updateData);

        $this->assertDatabaseHas('movements', $updateData);
    }

    /** @test */
    public function it_can_delete_a_movement()
    {
        $movement = Movement::factory()->create();

        $response = $this->deleteJson('/api/movements/' . $movement->id);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Movement deleted successfully']);

        $this->assertDatabaseMissing('movements', ['id' => $movement->id]);
    }
}
