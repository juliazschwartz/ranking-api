<?php

namespace Database\Factories;

use App\Models\Athlete;
use App\Models\Movement;
use App\Models\PersonalRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalRecordFactory extends Factory
{
    protected $model = PersonalRecord::class;

    public function definition()
    {
        return [
            'athlete_id' => Athlete::factory(),
            'movement_id' => Movement::factory(),
            'value' => $this->faker->numberBetween(100, 300),
            'date' => $this->faker->date(),
        ];
    }
}

