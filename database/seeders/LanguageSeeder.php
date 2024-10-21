<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::truncate();
        Language::insert([
            [
                'name'      => 'العربية',
                'flag'      => 'front/assets/ar-sa-large.png',
                'code'      => 'ar',
                'local'     => 'ar-SA',
                'direction' => 'rtl',
                'rtl'       => true,
                'sort'      => '1',
                'active'    => true,
            ],
            [
                'name'      => 'English',
                'flag'      => 'front/assets/en-us-large.jpg',
                'code'      => 'en',
                'local'     => 'en-US',
                'direction' => 'ltr',
                'rtl'       => false,
                'sort'      => '2',
                'active'    => true,
            ],

        ]);
    }
}
