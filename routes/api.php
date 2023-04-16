<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('users', [UserController::class, 'index'])
    ->middleware('auth:sanctum', 'ability:user-route');

Route::middleware('auth:sanctum', 'ability:permission-route')
    ->apiResource('permissions', PermissionController::class)
    ->except(['create', 'edit']);

Route::middleware('auth:sanctum', 'ability:role-route')
    ->apiResource('roles', RoleController::class)
    ->except(['create', 'edit']);


/*
Route::get('/roles', [RoleController::class, 'index'])
    ->name('roles.index')
    ->middleware('auth:sanctum', 'ability:role-index');

*/
/*
Route::middleware('auth:sanctum', 'ability:role-route')
    ->controller(RoleController::class)->group(function () {
        Route::get('/roles', 'index')->name('roles.index');
        Route::post('/roles', 'store')->name('roles.store');
        Route::get('/roles/{id}', 'show')->name('roles.show');
        Route::patch('/roles/{id}', 'update')->name('roles.update');
        Route::delete('/roles/{id}', 'destroy')->name('roles.delte');
});
*/
