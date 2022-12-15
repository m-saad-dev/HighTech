<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'key' => 'about_us',
                'value' => json_encode([
                        'title' => [
                            'en' => 'Brief About Us',
                            'ar' => 'نبذة مختصرة عنا',
                        ],
                        'content' => [
                            'en' => 'Brief About Us Brief About Us Brief About Us Brief About Us Brief About Us Brief About Us ',
                            'ar' => 'نبذة مختصرة عنا نبذة مختصرة عنا نبذة مختصرة عنا نبذة مختصرة عنا نبذة مختصرة عنا نبذة مختصرة عنا ',
                        ],
                    ]),
            ],
        ];
        Setting::insert($data);
    }
}
