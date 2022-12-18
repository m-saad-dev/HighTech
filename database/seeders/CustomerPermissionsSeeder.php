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
                "name" => "list-customers-reviews",
                "display_name" => "List Customers Reviews",
                "ar_display_name" => "عرض رأي عميل",
                "permission_group" => "customers",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
            [
                "name" => "create-customer-review",
                "display_name" => "Create Customer Review",
                "ar_display_name" => "انشاء رأي عميل جديد",
                "permission_group" => "customers",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "edit-customer-review",
                "display_name" => "Edit Customer Review",
                "ar_display_name" => "تعديل رأي عميل",
                "permission_group" => "customers",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "delete-customer-review",
                "display_name" => "Delete Customer Review",
                "ar_display_name" => "حذف رأي عميل",
                "permission_group" => "customers",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
        ]);

    }
}
