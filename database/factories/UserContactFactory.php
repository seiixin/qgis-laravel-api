<?php

namespace Database\Factories;

use App\Models\UserContact;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserContactFactory extends Factory
{
    protected $model = UserContact::class;

    public function definition(): array
    {
        return [
            'name'           => $this->faker->name(),
            'contact_number' => $this->faker->phoneNumber(),
            'relationship'   => $this->faker->randomElement(['Family', 'Friend', 'Neighbor', 'Colleague']),
        ];
    }
}
