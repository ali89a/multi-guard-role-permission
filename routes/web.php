<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\RoleController as UserRoleController;

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
    return view('welcome');
});
Route::get('localization/{locale}', [LocalizationController::class, 'index']);
Route::get('/dashboard', [UserDashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');




Route::group(['middleware' => 'auth', 'as' => 'user.'], function () {
    Route::group(['prefix' => 'access-control'], function () {
        Route::resource('permissions', PermissionController::class);
        Route::resource('roles', UserRoleController::class);
        Route::resource('users', UserController::class);
    });

    Route::resource('categories', CategoryController::class);
    Route::put('password-reset/{id}', [UserController::class, 'passwordReset'])->name('user.password.reset');

});



Route::group(['middleware' => 'auth:admin', 'prefix' => 'access-control', 'as' => 'admin.'], function () {
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('plans', PlanController::class);

    Route::get('/admin/login/{adminId}', [AdminController::class, 'login'])->name('admin.login');
    Route::put('password-reset/{id}', [AdminController::class, 'passwordReset'])->name('admin.password.reset');
    Route::resource('admin', AdminController::class);
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
