<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ImpactResult;

class ImpactResultSeeder extends Seeder
{
    public function run(): void
    {
        $results = [
            // East Zambales Fault — from chart (orange bars)
            [
                'scenario_name'              => 'East Zambales Fault Scenario (M7.4)',
                'fault_name'                 => 'East Zambales Fault',
                'casualties'                 => 295,
                'economic_loss'              => 850000000.00,
                'currency'                   => 'PHP',
                'slight_injuries_day'        => 255,
                'slight_injuries_night'      => 302,
                'non_life_threatening_day'   => 17,
                'non_life_threatening_night' => 10,
                'life_threatening_day'       => 8,
                'life_threatening_night'     => 8,
                'fatalities_day'             => 15,
                'fatalities_night'           => 18,
                'color_day'                  => '#E67E22',
                'color_night'                => '#F5CBA7',
            ],
            // West Valley Fault — from chart (red bars)
            [
                'scenario_name'              => 'West Valley Fault Scenario (M7.2)',
                'fault_name'                 => 'West Valley Fault',
                'casualties'                 => 74,
                'economic_loss'              => 2500000000.00,
                'currency'                   => 'PHP',
                'slight_injuries_day'        => 62,
                'slight_injuries_night'      => 70,
                'non_life_threatening_day'   => 8,
                'non_life_threatening_night' => 5,
                'life_threatening_day'       => 1,
                'life_threatening_night'     => 1,
                'fatalities_day'             => 3,
                'fatalities_night'           => 5,
                'color_day'                  => '#E74C3C',
                'color_night'                => '#F1948A',
            ],
            // Historical — 1990 Luzon
            [
                'scenario_name'              => '1990 Luzon Earthquake (M7.8)',
                'fault_name'                 => 'Philippine Fault Zone',
                'casualties'                 => 2412,
                'economic_loss'              => 369000000.00,
                'currency'                   => 'PHP',
                'slight_injuries_day'        => null,
                'slight_injuries_night'      => null,
                'non_life_threatening_day'   => null,
                'non_life_threatening_night' => null,
                'life_threatening_day'       => null,
                'life_threatening_night'     => null,
                'fatalities_day'             => null,
                'fatalities_night'           => null,
                'color_day'                  => '#8E44AD',
                'color_night'                => '#BB8FCE',
            ],
            // Historical — 2019 Zambales
            [
                'scenario_name'              => '2019 Zambales Earthquake (M6.1)',
                'fault_name'                 => 'East Zambales Fault',
                'casualties'                 => 18,
                'economic_loss'              => 5200000.00,
                'currency'                   => 'PHP',
                'slight_injuries_day'        => null,
                'slight_injuries_night'      => null,
                'non_life_threatening_day'   => null,
                'non_life_threatening_night' => null,
                'life_threatening_day'       => null,
                'life_threatening_night'     => null,
                'fatalities_day'             => null,
                'fatalities_night'           => null,
                'color_day'                  => '#2980B9',
                'color_night'                => '#85C1E9',
            ],
        ];

        foreach ($results as $data) {
            ImpactResult::updateOrCreate(
                ['scenario_name' => $data['scenario_name']],
                $data
            );
        }
    }
}
