<?php

namespace Database\Factories;

use App\Models\EmergencyHotline;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmergencyHotlineFactory extends Factory
{
    protected $model = EmergencyHotline::class;

    public function definition(): array
    {
        return [
            'agency_name'  => $this->faker->company(),
            'phone_number' => $this->faker->phoneNumber(),
            'description'  => $this->faker->sentence(),
        ];
    }
}
