<?php

namespace App\Providers;

use App\Models\Service;
use App\Models\Setting;
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
        View::composer(['admin.layouts.logo'], function ($view) {
            $logo = Setting::where('key', 'logo')->first();
            $logoTitle = json_decode($logo->value, true)['title'];
            $logoLink = $logo->getFirstMedia('image') ? $logo->getFirstMedia('image')->getFullUrl() : null;
            $view->with([
                'logoTitle' => $logoTitle,
                'logoLink' => $logoLink,
            ]);
        });
        View::composer(['admin.roles.fields'], function ($view) {
            $allPermissions = Permission::all();
            $view->with('allPermissions', $allPermissions);
        });
        View::composer(['admin.orders.fields'], function ($view) {
            $allServices = Service::all();
            $view->with('services', $allServices);
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
