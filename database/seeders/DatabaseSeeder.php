<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\CustomMediaProperties;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(UsersPermissionsSeeder::class);
        $this->call(RolesPermissionsSeeder::class);
        $this->call(StaffPermissionsSeeder::class);
        $this->call(CustomerPermissionsSeeder::class);
        $this->call(ClientsPermissionsSeeder::class);
        $this->call(SettingsPermissionsSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
