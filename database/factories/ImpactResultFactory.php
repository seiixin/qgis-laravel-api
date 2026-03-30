<?php

namespace Database\Factories;

use App\Models\ImpactResult;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImpactResultFactory extends Factory
{
    protected $model = ImpactResult::class;

    public function definition(): array
    {
        return [
            'scenario_name' => $this->faker->sentence(4),
            'fault_name'    => $this->faker->randomElement(['West Valley Fault', 'East Zambales Fault']),
            'casualties'    => $this->faker->numberBetween(0, 5000),
            'economic_loss' => $this->faker->numberBetween(1000000, 5000000000),
            'currency'      => 'PHP',
        ];
    }
}
