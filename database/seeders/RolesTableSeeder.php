<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    use HasRoles;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Role
        $role = Role::create(['name' => 'Super Admin','name_ar' => 'مدير النظام','guard_name'=>'web', 'created_by' => 1]);
        $role->givePermissionTo([Permission::all()]);
        $admin= User::findOrFail(1);
        $admin->assignRole('Super Admin');
    }
}
