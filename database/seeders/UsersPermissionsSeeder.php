<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersPermissionsSeeder extends Seeder
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
                "name" => "dashboard",
                "display_name" => "Show Dashboard",
                "ar_display_name" => "عرض لوحة التحكم",
                "permission_group" => "general",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
            [
                "name" => "list-users",
                "display_name" => "List Users",
                "ar_display_name" => "عرض المستخدمين",
                "permission_group" => "users",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
            [
                "name" => "force-list-users",
                "display_name" => "Force List Users",
                "ar_display_name" => "عرض كافة المستخدمين بالنظام",
                "permission_group" => "users",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "create-user",
                "display_name" => "Create User",
                "ar_display_name" => "انشاء مستخدم جديدة",
                "permission_group" => "users",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "edit-user",
                "display_name" => "Edit User",
                "ar_display_name" => "تعديل مستخدم",
                "permission_group" => "users",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "delete-user",
                "display_name" => "Delete User",
                "ar_display_name" => "حذف مستخدم",
                "permission_group" => "users",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
            [
                "name" => "user-notifications",
                "display_name" => "Receive Notifications",
                "ar_display_name" => "استقبال الاشعارات",
                "permission_group" => "users",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
        ]);

    }
}
