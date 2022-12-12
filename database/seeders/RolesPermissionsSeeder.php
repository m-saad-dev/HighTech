<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolesPermissionsSeeder extends Seeder
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
                "name" => "list-roles",
                "display_name" => "List Roles",
                "ar_display_name" => "عرض المستخدمين",
                "permission_group" => "roles",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
            [
                "name" => "force-list-roles",
                "display_name" => "Force List Roles",
                "ar_display_name" => "عرض كافة المستخدمين بالنظام",
                "permission_group" => "roles",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "create-role",
                "display_name" => "Create Role",
                "ar_display_name" => "انشاء مستخدم جديدة",
                "permission_group" => "roles",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "edit-role",
                "display_name" => "Edit Role",
                "ar_display_name" => "تعديل مستخدم",
                "permission_group" => "roles",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "delete-role",
                "display_name" => "Delete Role",
                "ar_display_name" => "حذف مستخدم",
                "permission_group" => "roles",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
        ]);

    }
}
