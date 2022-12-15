<?php

namespace App\Providers;

use App\Models\User;
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
            //get auth user children and send them as parents for the new user create view
            $parents = auth()->user()->hasRole('Super Admin') ? User::all() : auth()->user()->children->add(auth()->user())->sort();
            $view->with([
                'allRoles' => $allRoles,
                'parents' => $parents,
            ]);
        });
    }
}
