<?php

namespace Database\Factories;

use App\Models\Map;
use App\Models\OfflineMap;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfflineMapFactory extends Factory
{
    protected $model = OfflineMap::class;

    public function definition(): array
    {
        return [
            'map_id'     => Map::factory(),
            'image_path' => 'storage/maps/' . $this->faker->uuid() . '.jpg',
            'resolution' => $this->faker->randomElement(['1920x1080', '1280x720', '800x600']),
        ];
    }
}
