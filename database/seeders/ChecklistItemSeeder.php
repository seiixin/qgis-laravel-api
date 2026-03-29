<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChecklistItem;

class ChecklistItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // Before
            ['phase' => 'before', 'instruction' => 'Prepare an emergency go-bag with food, water, medicine, and documents.'],
            ['phase' => 'before', 'instruction' => 'Identify safe spots in each room (under sturdy tables, against interior walls).'],
            ['phase' => 'before', 'instruction' => 'Secure heavy furniture and appliances to walls.'],
            ['phase' => 'before', 'instruction' => 'Know the location of your nearest evacuation center.'],
            ['phase' => 'before', 'instruction' => 'Store at least 3 days of drinking water (1 liter per person per day).'],
            ['phase' => 'before', 'instruction' => 'Keep a battery-powered or hand-crank radio for emergency alerts.'],
            ['phase' => 'before', 'instruction' => 'Agree on a family meeting point outside your home.'],

            // During
            ['phase' => 'during', 'instruction' => 'Drop, Cover, and Hold On — get under a sturdy table or desk.'],
            ['phase' => 'during', 'instruction' => 'Stay away from windows, glass, and heavy objects that may fall.'],
            ['phase' => 'during', 'instruction' => 'Do not run outside while shaking is happening.'],
            ['phase' => 'during', 'instruction' => 'If outdoors, move away from buildings, trees, and power lines.'],
            ['phase' => 'during', 'instruction' => 'If driving, pull over away from bridges and overpasses and stay inside.'],

            // After
            ['phase' => 'after', 'instruction' => 'Check yourself and others for injuries before moving.'],
            ['phase' => 'after', 'instruction' => 'Inspect your home for structural damage before re-entering.'],
            ['phase' => 'after', 'instruction' => 'Check for gas leaks — if you smell gas, open windows and leave immediately.'],
            ['phase' => 'after', 'instruction' => 'Do not use elevators after an earthquake.'],
            ['phase' => 'after', 'instruction' => 'Be prepared for aftershocks.'],
            ['phase' => 'after', 'instruction' => 'Listen to official news and follow instructions from local authorities.'],
            ['phase' => 'after', 'instruction' => 'Document damage with photos for insurance or relief assistance.'],
        ];

        foreach ($items as $item) {
            ChecklistItem::updateOrCreate(
                ['phase' => $item['phase'], 'instruction' => $item['instruction']],
                ['language' => 'English']
            );
        }
    }
}
