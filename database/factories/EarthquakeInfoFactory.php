<?php

namespace Database\Factories;

use App\Models\EarthquakeInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EarthquakeInfoFactory extends Factory
{
    protected $model = EarthquakeInfo::class;

    public function definition(): array
    {
        return [
            'title'      => $this->faker->sentence(5),
            'content'    => $this->faker->paragraph(),
            'media_type' => $this->faker->randomElement(['image', 'video', 'audio']),
            'media_url'  => $this->faker->url(),
            'language'   => $this->faker->randomElement(['English', 'Tagalog', 'Kapampangan']),
        ];
    }
}
