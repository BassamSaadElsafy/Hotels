<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/users',[UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}',[UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::delete('/users/destroy/all', [UserController::class, 'destroyAll'])->name('users.destroyAll');

//=====================================Routes of Roles==============================================//
Route::get('/roles',               [RoleController::class, 'index'])     ->name('roles.index');     //
Route::get('/roles/{role}',        [RoleController::class, 'show'])      ->name('roles.show');      //
Route::post('/roles',              [RoleController::class, 'store'])     ->name('roles.store');     //
Route::get('/roles/{role}/edit',   [RoleController::class, 'edit'])      ->name('roles.edit');      //
Route::put('/roles/{role}',        [RoleController::class, 'update'])    ->name('roles.update');    //
Route::delete('/roles/{role}',     [RoleController::class, 'destroy'])   ->name('roles.destroy');   //
Route::delete('/roles/destroy/all', [RoleController::class, 'destroyAll'])->name('roles.destroyAll');//
//==================================================================================================//


//===========================================Routes of Permissions====================================================//
Route::get('/permissions',               [PermissionController::class, 'index'])     ->name('permissions.index');     //
Route::get('/permissions/{permission}',        [PermissionController::class, 'show'])      ->name('permissions.show');      //
Route::post('/permissions',              [PermissionController::class, 'store'])     ->name('permissions.store');     //
Route::get('/permissions/{permission}/edit',   [PermissionController::class, 'edit'])      ->name('permissions.edit');      //
Route::put('/permissions/{permission}',        [PermissionController::class, 'update'])    ->name('permissions.update');    //
Route::delete('/permissions/{permission}',     [PermissionController::class, 'destroy'])   ->name('permissions.destroy');   //
Route::delete('/permissions/destroy/all', [PermissionController::class, 'destroyAll'])->name('permissions.destroyAll');//
//====================================================================================================================//



Route::get('/', function () {
    return view('index');
});

Route::get('lang/{lang}', function ($lang) {
    session()->has('lang') ? session()->forget('lang') : '';
    $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
    return back();
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
