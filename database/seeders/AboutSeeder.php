<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'title' => 'عن الشركه',
            'vision_ar' => 'رؤيتنا هي أن نكون رواد الابتكار والتطوير.',
            'vision_en' => 'رؤيتنا هي أن نكون رواد الابتكار والتطوير.',
            'goals_ar' => 'هدفنا هو تحقيق التفوق في جميع المجالات.',
            'goals_en' => 'هدفنا هو تحقيق التفوق في جميع المجالات.',
            'message_ar' => 'رسالتنا هي تقديم حلول فعالة ومستدامة.',
            'message_en' => 'رسالتنا هي تقديم حلول فعالة ومستدامة.',
            'solutions_ar' => 'نوفر حلول شاملة تلبي احتياجات السوق.',
            'solutions_en' => 'نوفر حلول شاملة تلبي احتياجات السوق.',
            'strategy_ar' => 'استراتيجيتنا تقوم على الابتكار والتحسين المستمر.',
            'strategy_en' => 'استراتيجيتنا تقوم على الابتكار والتحسين المستمر.',
        ]);
    }
}
