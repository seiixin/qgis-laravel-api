<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ImpactResult;

class ImpactResultSeeder extends Seeder
{
    public function run(): void
    {
        $results = [
            [
                'scenario_name' => '1990 Luzon Earthquake',
                'fault_name'    => 'Philippine Fault Zone',
                'casualties'    => 1621,
                'economic_loss' => 369000000.00,
                'currency'      => 'PHP',
            ],
            [
                'scenario_name' => '2019 Zambales Earthquake',
                'fault_name'    => 'East Zambales Fault',
                'casualties'    => 0,
                'economic_loss' => 5200000.00,
                'currency'      => 'PHP',
            ],
            [
                'scenario_name' => 'West Valley Fault Scenario (M7.2)',
                'fault_name'    => 'West Valley Fault',
                'casualties'    => 175,
                'economic_loss' => 2500000000.00,
                'currency'      => 'PHP',
            ],
            [
                'scenario_name' => 'East Zambales Fault Scenario (M6.5)',
                'fault_name'    => 'East Zambales Fault',
                'casualties'    => 42,
                'economic_loss' => 850000000.00,
                'currency'      => 'PHP',
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
