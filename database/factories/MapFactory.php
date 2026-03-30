<?php

namespace Database\Factories;

use App\Models\Map;
use Illuminate\Database\Eloquent\Factories\Factory;

class MapFactory extends Factory
{
    protected $model = Map::class;

    public function definition(): array
    {
        return [
            'name'        => $this->faker->words(3, true),
            'type'        => $this->faker->randomElement(['evacuation', 'hazard']),
            'map_url'     => $this->faker->url(),
            'description' => $this->faker->sentence(),
            'is_active'   => 1,
        ];
    }
}
