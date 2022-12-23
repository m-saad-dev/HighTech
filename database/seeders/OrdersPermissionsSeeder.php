<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrdersPermissionsSeeder extends Seeder
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
                "name" => "list-orders",
                "display_name" => "List Orders",
                "ar_display_name" => "عرض العملاء",
                "permission_group" => "orders",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
            [
                "name" => "create-order",
                "display_name" => "Create Order",
                "ar_display_name" => "انشاء طلب خدمة جديد",
                "permission_group" => "orders",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "edit-order",
                "display_name" => "Edit Order",
                "ar_display_name" => "تعديل طلب خدمة",
                "permission_group" => "orders",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "edit-service-of-order",
                "display_name" => "Edit Service Of Order",
                "ar_display_name" => "تعديل الخدمة في الطلب",
                "permission_group" => "orders",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "delete-order",
                "display_name" => "Delete Order",
                "ar_display_name" => "حذف طلب خدمة",
                "permission_group" => "orders",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
        ]);

    }
}
