<?php

namespace Database\Factories;

use App\Models\Athlete;
use Illuminate\Database\Eloquent\Factories\Factory;

class AthleteFactory extends Factory
{
    protected $model = Athlete::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}

