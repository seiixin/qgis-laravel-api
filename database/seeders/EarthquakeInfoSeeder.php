<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EarthquakeInfo;

class EarthquakeInfoSeeder extends Seeder
{
    public function run(): void
    {
        $entries = [
            [
                'title'      => 'What is an Earthquake?',
                'content'    => 'An earthquake is the shaking of the Earth\'s surface caused by the sudden release of energy in the Earth\'s lithosphere. This energy creates seismic waves that travel through the ground. Earthquakes can range from barely noticeable tremors to violent shaking that causes widespread destruction.',
                'media_type' => 'text',
                'media_url'  => null,
                'language'   => 'English',
            ],
            [
                'title'      => 'What Causes Earthquakes?',
                'content'    => 'Most earthquakes are caused by the movement of tectonic plates along fault lines. When stress builds up along a fault and is suddenly released, it generates an earthquake. The Philippines sits along the Pacific Ring of Fire, making it one of the most seismically active countries in the world.',
                'media_type' => 'text',
                'media_url'  => null,
                'language'   => 'English',
            ],
            [
                'title'      => 'West Valley Fault',
                'content'    => 'The West Valley Fault is a 100 km active fault running through Metro Manila and nearby provinces including Pampanga. It is capable of producing a magnitude 7.2 earthquake. A major rupture could affect millions of people and cause catastrophic damage to infrastructure.',
                'media_type' => 'text',
                'media_url'  => null,
                'language'   => 'English',
            ],
            [
                'title'      => 'East Zambales Fault',
                'content'    => 'The East Zambales Fault runs along the eastern side of the Zambales mountain range, passing near Pampanga. It is capable of generating earthquakes up to magnitude 6.5–7.0. This fault was associated with the 2019 Zambales earthquake that was felt strongly across Central Luzon.',
                'media_type' => 'text',
                'media_url'  => null,
                'language'   => 'English',
            ],
            [
                'title'      => '1990 Luzon Earthquake (M7.8)',
                'content'    => 'On July 16, 1990, a magnitude 7.8 earthquake struck Luzon, with the epicenter near Cabanatuan, Nueva Ecija. It was one of the deadliest earthquakes in Philippine history, killing over 1,600 people. The earthquake caused massive landslides, building collapses, and infrastructure damage across Central Luzon and the Cordillera region.',
                'media_type' => 'text',
                'media_url'  => null,
                'language'   => 'English',
            ],
            [
                'title'      => '2019 Zambales Earthquake (M6.1)',
                'content'    => 'On April 22, 2019, a magnitude 6.1 earthquake struck Zambales, with tremors felt strongly across Pampanga, Tarlac, and Metro Manila. The earthquake caused building collapses in Pampanga, killing at least 18 people and injuring hundreds. It served as a reminder of the seismic risk in Central Luzon.',
                'media_type' => 'text',
                'media_url'  => null,
                'language'   => 'English',
            ],
            [
                'title'      => 'Safety Tips: Before an Earthquake',
                'content'    => 'Prepare an emergency kit with water, food, flashlight, first aid supplies, and important documents. Secure heavy furniture to walls. Identify safe spots in your home. Know your evacuation route and the location of the nearest evacuation center. Practice earthquake drills with your family.',
                'media_type' => 'text',
                'media_url'  => null,
                'language'   => 'English',
            ],
            [
                'title'      => 'Safety Tips: During an Earthquake',
                'content'    => 'Drop to your hands and knees. Take Cover under a sturdy desk or table, or against an interior wall away from windows. Hold On until the shaking stops. If outdoors, move away from buildings and power lines. Never use elevators during an earthquake.',
                'media_type' => 'text',
                'media_url'  => null,
                'language'   => 'English',
            ],
            [
                'title'      => 'Safety Tips: After an Earthquake',
                'content'    => 'Check for injuries and provide first aid. Inspect your surroundings for hazards like gas leaks, fires, or structural damage. Do not re-enter damaged buildings. Expect aftershocks. Listen to official announcements from PHIVOLCS and local government units for updates and instructions.',
                'media_type' => 'text',
                'media_url'  => null,
                'language'   => 'English',
            ],
        ];

        foreach ($entries as $entry) {
            EarthquakeInfo::updateOrCreate(
                ['title' => $entry['title'], 'language' => $entry['language']],
                $entry
            );
        }
    }
}
