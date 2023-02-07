<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FreelancerPlatformsPermissionsSeeder extends Seeder
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
                "name" => "list-freelancer-platforms",
                "display_name" => "List Freelancers Platforms",
                "ar_display_name" => "عرض منصات المستقلين",
                "permission_group" => "freelancers",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
//            [
//                "name" => "force-list-freelancer-platformss",
//                "display_name" => "Force List Freelancer Platform",
//                "ar_display_name" => "عرض كافة طاقم العمل بالنظام",
//                "permission_group" => "freelancerss",
//                "guard_name" => "web",
//                "created_at" => Carbon::now()->toDateTimeString(),
//            ],

            [
                "name" => "create-freelancer-platform",
                "display_name" => "Create Freelancer Platform",
                "ar_display_name" => "انشاء منصة مستقل جديدة",
                "permission_group" => "freelancers",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "edit-freelancer-platform",
                "display_name" => "Edit Freelancer Platform",
                "ar_display_name" => "تعديل منصة مستقل",
                "permission_group" => "freelancers",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "delete-freelancer-platform",
                "display_name" => "Delete Freelancer Platform",
                "ar_display_name" => "حذف منصة مستقل",
                "permission_group" => "freelancers",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
        ]);

    }
}
