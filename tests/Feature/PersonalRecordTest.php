<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\PersonalRecord;
use App\Models\Athlete;
use App\Models\Movement;
class PersonalRecordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_personal_records()
    {
        PersonalRecord::factory()->count(3)->create();

        $response = $this->getJson('/api/personal_records');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
 public function it_can_create_a_personal_record()
    {
        $athlete = Athlete::factory()->create(['id' => 1]);
        $movement = Movement::factory()->create(['id' => 1]);

        $personalRecordData = [
            'athlete_id' => $athlete->id,
            'movement_id' => $movement->id,
            'value' => 150,
            'date' => '2024-06-13 00:00:00'
        ];

        $response = $this->postJson('/api/personal_records', $personalRecordData);

        $response->assertStatus(201)
                 ->assertJsonFragment($personalRecordData);

        $this->assertDatabaseHas('personal_records', $personalRecordData);
    }

    /** @test */
    public function it_can_show_a_personal_record()
    {
        $personalRecord = PersonalRecord::factory()->create();

        $response = $this->getJson('/api/personal_records/' . $personalRecord->id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['value' => $personalRecord->value]);
    }

    /** @test */
    public function it_can_update_a_personal_record()
    {
        $personalRecord = PersonalRecord::factory()->create();

        $updateData = [
            'athlete_id' => $personalRecord->athlete_id,
            'movement_id' => $personalRecord->movement_id,
            'value' => 160,
            'date' => '2024-06-14'
        ];

        $response = $this->putJson('/api/personal_records/' . $personalRecord->id, $updateData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updateData);

        $this->assertDatabaseHas('personal_records', $updateData);
    }

    /** @test */
    public function it_can_delete_a_personal_record()
    {
        $personalRecord = PersonalRecord::factory()->create();

        $response = $this->deleteJson('/api/personal_records/' . $personalRecord->id);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Personal record deleted successfully']);

        $this->assertDatabaseMissing('personal_records', ['id' => $personalRecord->id]);
    }
}
