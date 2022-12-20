<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ServicesPermissionsSeeder extends Seeder
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
                "name" => "list-services",
                "display_name" => "List Services",
                "ar_display_name" => "عرض الخدمات",
                "permission_group" => "services",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
//            [
//                "name" => "force-list-servicess",
//                "display_name" => "Force List Service",
//                "ar_display_name" => "عرض كافة طاقم العمل بالنظام",
//                "permission_group" => "servicess",
//                "guard_name" => "web",
//                "created_at" => Carbon::now()->toDateTimeString(),
//            ],

            [
                "name" => "create-service",
                "display_name" => "Create Service",
                "ar_display_name" => "انشاء خدمة جديد",
                "permission_group" => "services",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "edit-service",
                "display_name" => "Edit Service",
                "ar_display_name" => "تعديل خدمة",
                "permission_group" => "services",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "delete-service",
                "display_name" => "Delete Service",
                "ar_display_name" => "حذف خدمة",
                "permission_group" => "services",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
        ]);

    }
}
