<?php

use App\Http\Controllers\admin\DashboardController;
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
Route::middleware(['auth', 'web'])->prefix('admin')->as('admin.')->group(function (){
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('/users', UserController::class);
        Route::resource('/roles', RoleController::class);
});
