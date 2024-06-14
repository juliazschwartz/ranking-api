<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Athlete;

class AthleteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_athletes()
    {
        Athlete::factory()->count(3)->create();

        $response = $this->getJson('/api/athletes');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_create_an_athlete()
    {
        $athleteData = [
            'name' => 'New Athlete'
        ];

        $response = $this->postJson('/api/athletes', $athleteData);

        $response->assertStatus(201)
                 ->assertJsonFragment($athleteData);

        $this->assertDatabaseHas('athletes', $athleteData);
    }

    /** @test */
    public function it_can_show_an_athlete()
    {
        $athlete = Athlete::factory()->create();

        $response = $this->getJson('/api/athletes/' . $athlete->id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => $athlete->name]);
    }

    /** @test */
    public function it_can_update_an_athlete()
    {
        $athlete = Athlete::factory()->create();

        $updateData = [
            'name' => 'Updated Athlete'
        ];

        $response = $this->putJson('/api/athletes/' . $athlete->id, $updateData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updateData);

        $this->assertDatabaseHas('athletes', $updateData);
    }

    /** @test */
    public function it_can_delete_an_athlete()
    {
        $athlete = Athlete::factory()->create();

        $response = $this->deleteJson('/api/athletes/' . $athlete->id);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Athlete deleted successfully']);

        $this->assertDatabaseMissing('athletes', ['id' => $athlete->id]);
    }
}
