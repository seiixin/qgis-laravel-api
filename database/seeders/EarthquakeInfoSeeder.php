<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EarthquakeInfo;

class EarthquakeInfoSeeder extends Seeder
{
    public function run(): void
    {
        $entries = [
            // ── English ──────────────────────────────────────────────────────
            [
                'title'    => 'What is an Earthquake?',
                'content'  => 'An earthquake is a natural event that occurs when there is a sudden movement within the Earth\'s crust, causing the ground to shake. This movement happens when built-up pressure beneath the surface is released.',
                'language' => 'English',
            ],
            [
                'title'    => 'Causes of Earthquakes',
                'content'  => "The main causes include:\n• Movement of tectonic plates\n• Volcanic activity\n• Fault lines\n• Human activities",
                'language' => 'English',
            ],
            [
                'title'    => 'West Valley Fault',
                'content'  => "An active fault line in the Philippines runs through parts of Bulacan, Rizal, Laguna, and Metro Manila. It is part of the larger Valley Fault System and is closely monitored because it is close to places with many people. PHIVOLCS states that it could cause a magnitude 7.2 earthquake — often called \"The Big One.\"\n\nIf this happens, areas like Apalit in Pampanga might still experience Intensity VI–VII shaking, which may destroy structures not built safely. Liquefaction may also occur in low-lying areas.",
                'language' => 'English',
            ],
            [
                'title'    => 'East Zambales Fault',
                'content'  => "The East Zambales Fault is a geological fault line in Zambales province. It is an active fault that could generate earthquakes up to magnitude 7.4. This severe earthquake might cause much ground shaking, damage to buildings, and landslides, especially in surrounding regions.",
                'language' => 'English',
            ],
            [
                'title'    => '1990 Luzon Earthquake (Magnitude 7.8)',
                'content'  => "At 4:26 PM on July 16, 1990, Central Luzon was rocked by the strongest quake to hit northern Philippines that century. Magnitude 7.8 with epicenter at 15.6°N, 121.0°E near Rizal, Nueva Ecija. The severe and unusually long ground shaking caused widespread destruction — collapsed structures, liquefaction, and slope failures. An estimated 2,412 lives were lost and thousands were injured.",
                'language' => 'English',
            ],
            [
                'title'    => '2019 Zambales Earthquake (Magnitude 6.1)',
                'content'  => "At 5:11 PM on April 22, 2019, a magnitude 6.1 earthquake shook Zambales, Pampanga and vicinity. Epicenter: 18 km east of Castillejos, Zambales, at 10 km depth. 29 buildings were damaged in Pampanga, with 18 fatalities. The Chuzon Supermarket in Porac, Pampanga collapsed, killing five people. Other fatalities were reported in Lubao, Angeles City, and San Marcelino, Zambales.",
                'language' => 'English',
            ],
            [
                'title'    => 'Safety Tips: Before an Earthquake',
                'content'  => "1. Prepare an emergency kit: water, food, flashlights, batteries, first aid kit, important documents.\n2. Learn how to turn off gas, water, and electricity.\n3. Secure heavy furniture, cabinets, mirrors, and appliances.\n4. Store heavy and breakable items on lower shelves.\n5. Make a family emergency plan — where to meet, what to do.\n6. Know the safety plan at your school or workplace.",
                'language' => 'English',
            ],
            [
                'title'    => 'Safety Tips: During an Earthquake',
                'content'  => "1. Stay calm and do not panic.\n2. If indoors: Drop, Cover, and Hold On under a sturdy table or desk.\n3. Stay away from windows, glass, and objects that could fall.\n4. If outdoors: move to an open area away from buildings, trees, and power lines.\n5. If in a car: stop in a safe place and stay inside until shaking stops.\n6. Do not use elevators.",
                'language' => 'English',
            ],
            [
                'title'    => 'Safety Tips: After an Earthquake',
                'content'  => "1. Check yourself and others for injuries; provide first aid if needed.\n2. Be careful of hazards: gas leaks, broken wires, damaged buildings.\n3. Listen to updates from authorities via radio or official announcements.\n4. Stay away from damaged areas; be prepared for aftershocks.\n5. Only return home when officials say it is safe.",
                'language' => 'English',
            ],

            // ── Tagalog ───────────────────────────────────────────────────────
            [
                'title'    => 'Ano ang Lindol?',
                'content'  => 'Ang lindol ay isang likas na pangyayari na nagaganap kapag may biglaang paggalaw sa loob ng crust ng mundo, na nagdudulot ng pagyanig ng lupa. Nangyayari ito kapag ang naipong presyon sa ilalim ng lupa ay biglang napakawalan.',
                'language' => 'Tagalog',
            ],
            [
                'title'    => 'Mga Sanhi ng Lindol',
                'content'  => "Ang mga pangunahing sanhi ay kinabibilangan ng:\n• Paggalaw ng tectonic plates\n• Aktibidad ng bulkan\n• Mga fault line\n• Mga gawaing pantao",
                'language' => 'Tagalog',
            ],
            [
                'title'    => 'West Valley Fault',
                'content'  => "Ang West Valley Fault ay isang aktibong fault line sa Pilipinas na dumadaan sa ilang bahagi ng Bulacan, Rizal, Laguna, at Metro Manila. Ayon sa PHIVOLCS, maaari itong magdulot ng magnitude 7.2 na lindol — kilala bilang \"The Big One.\"\n\nAng mga lugar tulad ng Apalit, Pampanga ay maaaring makaranas ng Intensity VI–VII na pagyanig. Maaari ring mangyari ang liquefaction sa mababang lugar.",
                'language' => 'Tagalog',
            ],
            [
                'title'    => 'East Zambales Fault',
                'content'  => "Ang East Zambales Fault ay isang aktibong fault line sa probinsya ng Zambales. Ayon sa mga pag-aaral, maaari itong magdulot ng lindol na may magnitude 7.4 — na maaaring magdulot ng matinding pagyanig, pagkasira ng mga gusali, at pagguho ng lupa.",
                'language' => 'Tagalog',
            ],
            [
                'title'    => '1990 Luzon Earthquake (Magnitude 7.8)',
                'content'  => "Noong Hulyo 16, 1990, ganap na 4:26 ng hapon, yumanig ang Central Luzon. May magnitude 7.8 at ang epicenter ay malapit sa Rizal, Nueva Ecija (15.6°N, 121.0°E). Tinatayang 2,412 katao ang namatay at libo-libo ang nasugatan.",
                'language' => 'Tagalog',
            ],
            [
                'title'    => '2019 Zambales Earthquake (Magnitude 6.1)',
                'content'  => "Noong Abril 22, 2019, alas 5:11 ng hapon, isang lindol na may magnitude 6.1 ang tumama sa Zambales at Pampanga. Ang epicenter ay nasa 18 km silangan ng Castillejos, Zambales. 29 na gusali ang nasira at 18 ang nasawi. Ang Chuzon Supermarket sa Porac, Pampanga ay bumagsak at limang katao ang namatay.",
                'language' => 'Tagalog',
            ],
            [
                'title'    => 'Mga Gabay sa Kaligtasan: Bago ang Lindol',
                'content'  => "1. Maghanda ng emergency kit: tubig, pagkain, flashlight, baterya, first aid kit, mahahalagang dokumento.\n2. Alamin kung paano patayin ang gas, tubig, at kuryente.\n3. Siguraduhing maayos ang pagkaka-secure ng mabibigat na gamit.\n4. Ilagay ang mabibigat na bagay sa mababang lugar.\n5. Gumawa ng family emergency plan.\n6. Alamin ang safety plan sa paaralan o trabaho.",
                'language' => 'Tagalog',
            ],
            [
                'title'    => 'Mga Gabay sa Kaligtasan: Habang may Lindol',
                'content'  => "1. Manatiling kalmado.\n2. Gawin ang \"Drop, Cover, and Hold On.\"\n3. Lumayo sa salamin at maaaring bumagsak na bagay.\n4. Kung nasa labas, pumunta sa open area.\n5. Kung nasa sasakyan, huminto sa ligtas na lugar.\n6. Huwag gumamit ng elevator.",
                'language' => 'Tagalog',
            ],
            [
                'title'    => 'Mga Gabay sa Kaligtasan: Pagkatapos ng Lindol',
                'content'  => "1. Suriin ang sarili at iba kung may sugat.\n2. Mag-ingat sa mga panganib: gas leak, sirang kable, nasirang gusali.\n3. Makinig sa opisyal na anunsyo.\n4. Iwasan ang mga nasirang lugar; maghanda para sa aftershocks.\n5. Bumalik lamang kung ligtas na.",
                'language' => 'Tagalog',
            ],

            // ── Kapampangan ───────────────────────────────────────────────────
            [
                'title'    => 'Nanu ing Lindol?',
                'content'  => 'Ing lindol metung yang natural a pangyari a malyari nung ing luta mitatalagku king lalung-lalam na parte ning crust na ning Yatu, a makapagtatalagku king ibabaw. Ining pagtatalagku malyari nung ing naipun a presyon king lalung-lalam ning luta biglang palwal.',
                'language' => 'Kapampangan',
            ],
            [
                'title'    => 'Mga Uzung Sanhi ning Lindol',
                'content'  => "Ining mga pangunahing sanhi:\n• Galaw ning tectonic plates\n• Aktibidad ning bulkan\n• Mga fault line\n• Mga gawa ning tau",
                'language' => 'Kapampangan',
            ],
            [
                'title'    => 'West Valley Fault',
                'content'  => "Ing West Valley Fault metung yang aktibung fault line king Pilipinas a dumalan king diling bahagi ning Bulacan, Rizal, Laguna, at Metro Manila. Ayon kay PHIVOLCS, malyari yang makapagtabu ning magnitude 7.2 a lindol — kilala bilang \"The Big One.\"\n\nKung malyari iti, ing mga lugal a nung nong Apalit king Pampanga malyari yang makaranas ning Intensity VI–VII a pagtatalagku, a makaparusak king mga gusaling e maayus ing pagkatayo. Malyari naman ing liquefaction king mababang lugal.",
                'language' => 'Kapampangan',
            ],
            [
                'title'    => 'East Zambales Fault',
                'content'  => "Ing East Zambales Fault metung yang aktibung fault line king probinsya ning Zambales. Ayon king mga pag-aaral, malyari yang makapagtabu ning lindol a magnitude 7.4 — a makapagtabu ning maragul a pagtatalagku, pagkasira ning mga gusali, at pagguho ning lupa king mga karatig lugal.",
                'language' => 'Kapampangan',
            ],
            [
                'title'    => '1990 Luzon Earthquake (Magnitude 7.8)',
                'content'  => "King Hulyo 16, 1990, alas 4:26 ning hapon, nagtatalagku ing Central Luzon. Magnitude 7.8 at ing epicenter malapit king Rizal, Nueva Ecija (15.6°N, 121.0°E). Ing maragul at atyu-atyung pagtatalagku makapagtabu ning maragul a panirasak — mga nabuwal a gusali, liquefaction, at pagguho ning lupa. Tinatayang 2,412 a tau ing namate at libu-libu ing nasugatan.",
                'language' => 'Kapampangan',
            ],
            [
                'title'    => '2019 Zambales Earthquake (Magnitude 6.1)',
                'content'  => "King Abril 22, 2019, alas 5:11 ning hapon, metung a magnitude 6.1 a lindol ing tumama king Zambales at Pampanga. Ing epicenter nasa 18 km silangan ning Castillejos, Zambales, king 10 km a kalaliman. 29 a gusali ing nasira king Pampanga, at 18 a tau ing namate. Ing Chuzon Supermarket king Porac, Pampanga nabuwal at limang tau ing namate. Ding aliwa pang namate binanggit king Lubao, Angeles City, at San Marcelino, Zambales.",
                'language' => 'Kapampangan',
            ],
            [
                'title'    => 'Kaligtasan: Bago ing Lindol',
                'content'  => "1. Maglaan ning emergency kit: danum, pamangan, flashlight, baterya, first aid kit, mahahalagang dokumento.\n2. Aralan mu kung nanu ing paralan a patayin ing gas, danum, at kuryente.\n3. Siguraduhing maayus ing pagkaka-secure ning mabibigat a kasangkapan.\n4. Ilagak ing mabibigat a bagay king mababang lugar.\n5. Gumawa kang family emergency plan — nukarin mekikipagkita at nanu ing gagawin.\n6. Aralan mu ing safety plan king eskwelahan o trabahu.",
                'language' => 'Kapampangan',
            ],
            [
                'title'    => 'Kaligtasan: Keng Panahon ning Lindol',
                'content'  => "1. Manatiling mapanatag at e mag-panic.\n2. Nung nasa laub ka: Gumawa ning \"Drop, Cover, at Hold On\" king laum ning matatag a lamesa o desk.\n3. Lumayo ka king mga salamin at bagay a malyaring mabuwal.\n4. Nung nasa lual ka: pumunta ka king bukas a lugar, malayo king mga gusali, puno, at linya ning kuryente.\n5. Nung nasa sasakyan ka: huminto ka king ligtas a lugar at manatili ka laub anggang matapos ing pagtatalagku.\n6. E ka gumamit ning elevator.",
                'language' => 'Kapampangan',
            ],
            [
                'title'    => 'Kaligtasan: Kaibat ning Lindol',
                'content'  => "1. Suriin mu ing sarili mu at ding aliwa kung atin sugat; magbigay ning first aid nung kailangan.\n2. Mag-ingat ka king mga panganib: gas leak, sirang kable, nasirang gusali.\n3. Makinig ka king opisyal a anunsyo king radyo o opisyal a pahayag.\n4. Lumayo ka king mga nasirang lugar; maging handa para sa aftershocks.\n5. Bumalik ka la mu nung sabian na ning mga opisyal a ligtas na.",
                'language' => 'Kapampangan',
            ],
        ];

        foreach ($entries as $entry) {
            EarthquakeInfo::updateOrCreate(
                ['title' => $entry['title'], 'language' => $entry['language']],
                array_merge($entry, ['media_type' => 'text', 'media_url' => null])
            );
        }
    }
}
