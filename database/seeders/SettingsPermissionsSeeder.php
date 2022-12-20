<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SettingsPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->insert([
            [
                "name" => "about-us-setting",
                "display_name" => "About Us Setting",
                "ar_display_name" => "إعدادات صفحة عنَّا",
                "permission_group" => "settings",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
            [
                "name" => "logo-setting",
                "display_name" => "Logo Setting",
                "ar_display_name" => "إعدادات الشعار",
                "permission_group" => "settings",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
            [
                "name" => "links-setting",
                "display_name" => "Links Setting",
                "ar_display_name" => "إعدادات روابط التواصل",
                "permission_group" => "settings",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
        ]);

    }
}
