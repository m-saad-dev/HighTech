<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FreelancersPermissionsSeeder extends Seeder
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
                "name" => "list-freelancers",
                "display_name" => "List Freelancers",
                "ar_display_name" => "عرض المستقلين",
                "permission_group" => "freelancing",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
//            [
//                "name" => "force-list-freelancerss",
//                "display_name" => "Force List Freelancer",
//                "ar_display_name" => "عرض كافة طاقم العمل بالنظام",
//                "permission_group" => "freelancings",
//                "guard_name" => "web",
//                "created_at" => Carbon::now()->toDateTimeString(),
//            ],

            [
                "name" => "create-freelancer",
                "display_name" => "Create Freelancer",
                "ar_display_name" => "انشاء مستقل جديد",
                "permission_group" => "freelancing",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "edit-freelancer",
                "display_name" => "Edit Freelancer",
                "ar_display_name" => "تعديل مستقل",
                "permission_group" => "freelancing",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "delete-freelancer",
                "display_name" => "Delete Freelancer",
                "ar_display_name" => "حذف مستقل",
                "permission_group" => "freelancing",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
        ]);

    }
}
