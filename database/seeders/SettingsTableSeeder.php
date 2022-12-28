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
                            'en' => 'Start with Us',
                            'ar' => 'إبدأ معنا',
                        ],
                        'content' => [
                            'en' => 'and create your successful store ',
                            'ar' => 'واصنع متجراً ناجحاً ',
                        ],
                    ]),
            ],
            [
                'key' => 'logo',
                'value' => json_encode(
                    [
                        'title' => [
                            'en' => 'Logo',
                            'ar' => 'الشعار',
                        ],
                    ]
                ),
            ],
            [
                'key' => 'links',
                'value' => json_encode(
                    [
                        [
                            'title' => [
                                'en' => 'Whatsapp',
                                'ar' => 'واتساب',
                            ],
                            'link' => '',
                        ],
                        [
                            'title' => [
                                'en' => 'Gmail',
                                'ar' => 'Gmail',
                            ],
                            'link' => '',
                        ],
                        [
                            'title' => [
                                'en' => 'Instagram',
                                'ar' => 'إنستجرام',
                            ],
                            'link' => '',
                        ],
                        [
                            'title' => [
                                'en' => 'Tweeter',
                                'ar' => 'تويتر',
                            ],
                            'link' => '',
                        ],
                        [
                            'title' => [
                                'en' => 'LinkedIn',
                                'ar' => 'لينكد إن',
                            ],
                            'link' => '',
                        ],
                        [
                            'title' => [
                                'en' => 'Google Map',
                                'ar' => 'خرائط جوجل',
                            ],
                            'link' => '',
                        ],
                    ]
                ),
            ],
        ];
        Setting::insert($data);
    }
}
