<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ArticlesPermissionsSeeder extends Seeder
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
                "name" => "list-articles",
                "display_name" => "List Articles",
                "ar_display_name" => "عرض المقالات",
                "permission_group" => "articles",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
//            [
//                "name" => "force-list-articless",
//                "display_name" => "Force List Article",
//                "ar_display_name" => "عرض كافة طاقم العمل بالنظام",
//                "permission_group" => "articless",
//                "guard_name" => "web",
//                "created_at" => Carbon::now()->toDateTimeString(),
//            ],

            [
                "name" => "create-article",
                "display_name" => "Create Article",
                "ar_display_name" => "انشاء مقال جديد",
                "permission_group" => "articles",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "edit-article",
                "display_name" => "Edit Article",
                "ar_display_name" => "تعديل مقال",
                "permission_group" => "articles",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],

            [
                "name" => "delete-article",
                "display_name" => "Delete Article",
                "ar_display_name" => "حذف مقال",
                "permission_group" => "articles",
                "guard_name" => "web",
                "created_at" => Carbon::now()->toDateTimeString(),
            ],
        ]);

    }
}
