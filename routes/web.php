<?php

use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('admin.home');
});

Auth::routes();

Route::middleware('locale')->prefix('website')->get('language/{locale}', function ($locale) {
    if (!checkLocale($locale) ) {
        setSessionAppLocale($locale);
    }
    return redirect()->back();
})->name('website.language');

Route::as('website.')->group(function () {
    Route::get('/', [\App\Http\Controllers\website\HomeController::class, 'index'])->name('home');
});

Route::prefix('admin')->get('language/{locale}', function ($locale) {
    if ($locale ) {
        app()->setlocale($locale);
        session()->put('locale', $locale);
    }
    return redirect(url()->previous());
})->name('admin.language');

Route::prefix('admin')->as('admin.')->middleware(['auth', 'web'])->group(function (){
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('/users', UserController::class);
        Route::get('/my-profile', [UserController::class, 'myProfile'])->name('myProfile');
        Route::resource('/roles', RoleController::class);
        Route::resource('/services', ServiceController::class);
        Route::resource('/articles', ArticleController::class);
        Route::resource('/staff', StaffController::class);
        Route::resource('/clients', ClientController::class);
        Route::resource('/customers', CustomerController::class);
        Route::resource('/orders', OrderController::class);
        Route::get('/settings/{key}', [SettingController::class, 'edit'])->name('settings');
        Route::put('/settings/{key}', [SettingController::class, 'update'])->name('settings.update');
});
