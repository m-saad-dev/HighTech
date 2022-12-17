<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StaffPermissionsSeeder extends Seeder
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
                "name" => "list-staff",
                "display_name" => "List Staff",
                "ar_display_name" => "عرض طاقم العمل",
                "permission_group" => "staff",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
//            [
//                "name" => "force-list-staff",
//                "display_name" => "Force List Staff",
//                "ar_display_name" => "عرض كافة طاقم العمل بالنظام",
//                "permission_group" => "staff",
//                "guard_name" => "web",
//                "created_at" => Carbon::now()->toDateTimeString(),
//            ],

            [
                "name" => "create-role",
                "display_name" => "Create Staff",
                "ar_display_name" => "انشاء فرد جديد من طاقم العمل",
                "permission_group" => "staff",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "edit-role",
                "display_name" => "Edit Staff",
                "ar_display_name" => "تعديل فرد من طاقم العمل",
                "permission_group" => "staff",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "delete-role",
                "display_name" => "Delete Staff",
                "ar_display_name" => "حذف فرد من طاقم العمل",
                "permission_group" => "staff",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
        ]);

    }
}
