<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.roles.fields'], function ($view) {
            $allPermissions = Permission::all();
            $view->with('allPermissions', $allPermissions);
        });
        View::composer(['admin.users.fields'], function ($view) {
            $allRoles = Role::all();
            $view->with('allRoles', $allRoles);
        });
    }
}
