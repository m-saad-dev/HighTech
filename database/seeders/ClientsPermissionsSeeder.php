<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CustomerPermissionsSeeder extends Seeder
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
                "name" => "list-customers",
                "display_name" => "List Staff",
                "ar_display_name" => "عرض طاقم العمل",
                "permission_group" => "customers",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
//            [
//                "name" => "force-list-customers",
//                "display_name" => "Force List Staff",
//                "ar_display_name" => "عرض كافة طاقم العمل بالنظام",
//                "permission_group" => "customers",
//                "guard_name" => "web",
//                "created_at" => Carbon::now()->toDateTimeString(),
//            ],

            [
                "name" => "create-customer",
                "display_name" => "Create Staff",
                "ar_display_name" => "انشاء فرد جديد من طاقم العمل",
                "permission_group" => "customers",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "edit-customer",
                "display_name" => "Edit Staff",
                "ar_display_name" => "تعديل فرد من طاقم العمل",
                "permission_group" => "customers",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "delete-customer",
                "display_name" => "Delete Staff",
                "ar_display_name" => "حذف فرد من طاقم العمل",
                "permission_group" => "customers",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
        ]);

    }
}
