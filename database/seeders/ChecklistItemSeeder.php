<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChecklistItem;

class ChecklistItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // ── Before — English ─────────────────────────────────────────────
            ['phase' => 'before', 'language' => 'English', 'instruction' => 'Prepare an emergency kit: water, food, flashlight, batteries, first aid, important documents'],
            ['phase' => 'before', 'language' => 'English', 'instruction' => 'Secure heavy furniture and appliances; inspect gas and electrical connections'],
            ['phase' => 'before', 'language' => 'English', 'instruction' => 'Know safe locations: away from windows, under sturdy tables'],
            ['phase' => 'before', 'language' => 'English', 'instruction' => 'Plan with family — decide on meeting points and emergency contacts'],
            ['phase' => 'before', 'language' => 'English', 'instruction' => 'Keep emergency contacts saved on your phone'],
            ['phase' => 'before', 'language' => 'English', 'instruction' => "Keep your phone's alerts turned on"],
            ['phase' => 'before', 'language' => 'English', 'instruction' => 'Practice "Drop, Cover, Hold On"'],

            // ── After — English ──────────────────────────────────────────────
            ['phase' => 'after', 'language' => 'English', 'instruction' => 'Check yourself and others for injuries; administer first aid if necessary'],
            ['phase' => 'after', 'language' => 'English', 'instruction' => 'Watch out for dangers: damaged buildings, gas leaks, broken glass'],
            ['phase' => 'after', 'language' => 'English', 'instruction' => 'Avoid using matches or lighters until certain there are no gas leaks'],
            ['phase' => 'after', 'language' => 'English', 'instruction' => 'Listen to official updates via mobile alerts, TV, or radio'],
            ['phase' => 'after', 'language' => 'English', 'instruction' => 'Prepare for aftershocks by staying in safe zones'],
            ['phase' => 'after', 'language' => 'English', 'instruction' => 'Assist neighbors, especially the elderly, disabled, and children'],
            ['phase' => 'after', 'language' => 'English', 'instruction' => "Don't go home until authorities say it's safe"],

            // ── Before — Tagalog ─────────────────────────────────────────────
            ['phase' => 'before', 'language' => 'Tagalog', 'instruction' => 'Ihanda ang emergency kit: tubig, pagkain, flashlight, baterya, first aid, mahahalagang dokumento'],
            ['phase' => 'before', 'language' => 'Tagalog', 'instruction' => 'Siguraduhing maayos ang pagkaka-secure ng mabibigat na kasangkapan at appliances; suriin ang koneksyon ng gas at kuryente'],
            ['phase' => 'before', 'language' => 'Tagalog', 'instruction' => 'Alamin ang mga ligtas na lugar: lumayo sa mga bintana at manatili sa ilalim ng matitibay na mesa'],
            ['phase' => 'before', 'language' => 'Tagalog', 'instruction' => 'Magplano kasama ang pamilya at magtakda ng meeting points at emergency contacts'],
            ['phase' => 'before', 'language' => 'Tagalog', 'instruction' => 'I-save ang mga emergency contacts sa iyong telepono'],
            ['phase' => 'before', 'language' => 'Tagalog', 'instruction' => 'Panatilihing naka-on ang alerts ng iyong telepono'],
            ['phase' => 'before', 'language' => 'Tagalog', 'instruction' => 'Sanayin ang "Drop, Cover, Hold On"'],

            // ── After — Tagalog ──────────────────────────────────────────────
            ['phase' => 'after', 'language' => 'Tagalog', 'instruction' => 'Suriin ang sarili at ang iba kung may sugat, at magbigay ng paunang lunas kung kinakailangan'],
            ['phase' => 'after', 'language' => 'Tagalog', 'instruction' => 'Mag-ingat sa mga posibleng panganib tulad ng nasirang gusali, tagas ng gas, at basag na salamin'],
            ['phase' => 'after', 'language' => 'Tagalog', 'instruction' => 'Hangga\'t hindi ka sigurado na walang tagas ng gas, iwasang gumamit ng posporo o lighter'],
            ['phase' => 'after', 'language' => 'Tagalog', 'instruction' => 'Makinig sa mga opisyal na anunsyo sa pamamagitan ng mobile alerts, TV, o radyo'],
            ['phase' => 'after', 'language' => 'Tagalog', 'instruction' => 'Maghanda para sa aftershocks sa pamamagitan ng pananatili sa mga ligtas na lugar'],
            ['phase' => 'after', 'language' => 'Tagalog', 'instruction' => 'Tumulong sa mga kapitbahay, lalo na sa matatanda, may kapansanan, at mga bata'],
            ['phase' => 'after', 'language' => 'Tagalog', 'instruction' => 'Huwag bumalik sa bahay hangga\'t hindi sinasabi ng mga awtoridad na ligtas na'],

            // ── Before — Kapampangan ─────────────────────────────────────────
            ['phase' => 'before', 'language' => 'Kapampangan', 'instruction' => 'Maglaan ning emergency kit: danum, pamangan, flashlight, baterya, first aid, mahahalagang dokumento'],
            ['phase' => 'before', 'language' => 'Kapampangan', 'instruction' => 'Siguraduhing maayus ing pagkaka-secure ning mabibigat a kasangkapan; suriin ing koneksyon ning gas at kuryente'],
            ['phase' => 'before', 'language' => 'Kapampangan', 'instruction' => 'Aralan mu ing mga ligtas a lugar: lumayo king mga bintana at manatili king laum ning matibay a lamesa'],
            ['phase' => 'before', 'language' => 'Kapampangan', 'instruction' => 'Magplano kasama ing pamilya at magtakda ning meeting points at emergency contacts'],
            ['phase' => 'before', 'language' => 'Kapampangan', 'instruction' => 'I-save ing mga emergency contacts king iyung telepono'],
            ['phase' => 'before', 'language' => 'Kapampangan', 'instruction' => 'Panatilihing naka-on ing alerts ning iyung telepono'],
            ['phase' => 'before', 'language' => 'Kapampangan', 'instruction' => 'Sanayin ing "Drop, Cover, Hold On"'],

            // ── After — Kapampangan ──────────────────────────────────────────
            ['phase' => 'after', 'language' => 'Kapampangan', 'instruction' => 'Suriin ing sarili mu at ding aliwa kung atin sugat, at magbigay ning paunang lunas kung kailangan'],
            ['phase' => 'after', 'language' => 'Kapampangan', 'instruction' => 'Mag-ingat king mga posibleng panganib: nasirang gusali, tagas ning gas, at basag a salamin'],
            ['phase' => 'after', 'language' => 'Kapampangan', 'instruction' => 'Anggang e ka sigurado a ala tagas ning gas, iwasan mung gumamit ning posporo o lighter'],
            ['phase' => 'after', 'language' => 'Kapampangan', 'instruction' => 'Makinig king mga opisyal a anunsyo king mobile alerts, TV, o radyo'],
            ['phase' => 'after', 'language' => 'Kapampangan', 'instruction' => 'Maging handa para sa aftershocks sa pamamagitan ng pananatili sa mga ligtas na lugar'],
            ['phase' => 'after', 'language' => 'Kapampangan', 'instruction' => 'Tumulong king mga kapit-bale, lalo na king matatanda, may kapansanan, at mga anak'],
            ['phase' => 'after', 'language' => 'Kapampangan', 'instruction' => 'E ka bumalik king bale anggang e sabian ning mga opisyal a ligtas na'],
        ];

        foreach ($items as $item) {
            ChecklistItem::updateOrCreate(
                ['phase' => $item['phase'], 'language' => $item['language'], 'instruction' => $item['instruction']],
                $item
            );
        }
    }
}
