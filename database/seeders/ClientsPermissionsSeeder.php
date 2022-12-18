<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClientsPermissionsSeeder extends Seeder
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
                "name" => "list-clients",
                "display_name" => "List Clients",
                "ar_display_name" => "عرض العملاء",
                "permission_group" => "clients",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
//            [
//                "name" => "force-list-clientss",
//                "display_name" => "Force List Client",
//                "ar_display_name" => "عرض كافة طاقم العمل بالنظام",
//                "permission_group" => "clientss",
//                "guard_name" => "web",
//                "created_at" => Carbon::now()->toDateTimeString(),
//            ],

            [
                "name" => "create-client",
                "display_name" => "Create Client",
                "ar_display_name" => "انشاء عميل جديد",
                "permission_group" => "clients",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "edit-client",
                "display_name" => "Edit Client",
                "ar_display_name" => "تعديل عميل",
                "permission_group" => "clients",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "delete-client",
                "display_name" => "Delete Client",
                "ar_display_name" => "حذف عميل",
                "permission_group" => "clients",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
        ]);

    }
}
