<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FreelanceContractsPermissionsSeeder extends Seeder
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
                "name" => "list-freelance-contract",
                "display_name" => "List Freelance Contacts",
                "ar_display_name" => "عرض عقود العقد مستقلين",
                "permission_group" => "freelancing",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
//            [
//                "name" => "force-list-freelancings",
//                "display_name" => "Force List Freelance Contract",
//                "ar_display_name" => "عرض كافة طاقم العمل بالنظام",
//                "permission_group" => "freelancings",
//                "guard_name" => "web",
//                "created_at" => Carbon::now()->toDateTimeString(),
//            ],

            [
                "name" => "create-freelance-contract",
                "display_name" => "Create Freelance Contract",
                "ar_display_name" => "انشاء عقد مستقلين جديد",
                "permission_group" => "freelancing",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "edit-freelance-contract",
                "display_name" => "Edit Freelance Contract",
                "ar_display_name" => "تعديل عقد مستقلين",
                "permission_group" => "freelancing",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "delete-freelance-contract",
                "display_name" => "Delete Freelance Contract",
                "ar_display_name" => "حذف عقد مستقلين",
                "permission_group" => "freelancing",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
        ]);

    }
}
