<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ImpactResult;

class ImpactResultSeeder extends Seeder
{
    public function run(): void
    {
        // Real PHIVOLCS PEIS simulation data for Apalit, Pampanga
        $results = [
            [
                'scenario_name' => 'East Zambales Fault Earthquake Impact',
                'fault_name'    => 'East Zambales Fault',
                'casualties'    => 295,
                'economic_loss' => null,
                'currency'      => 'PHP',
            ],
            [
                'scenario_name' => 'West Valley Fault Major Earthquake Impact',
                'fault_name'    => 'West Valley Fault',
                'casualties'    => 74,
                'economic_loss' => null,
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
