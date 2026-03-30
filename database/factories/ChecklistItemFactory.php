<?php

namespace Database\Factories;

use App\Models\ChecklistItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChecklistItemFactory extends Factory
{
    protected $model = ChecklistItem::class;

    public function definition(): array
    {
        return [
            'phase'       => $this->faker->randomElement(['before', 'during', 'after']),
            'instruction' => $this->faker->sentence(),
            'language'    => $this->faker->randomElement(['English', 'Tagalog', 'Kapampangan']),
        ];
    }
}
