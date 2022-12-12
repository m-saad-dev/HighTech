<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('display_name', 256)->after('name');
            $table->string('ar_display_name', 256)->after('display_name');
            $table->string('permission_group', 256)->after('ar_display_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn(['display_name']);
            $table->dropColumn(['ar_display_name']);
            $table->dropColumn(['permission_group']);
        });
    }
}
