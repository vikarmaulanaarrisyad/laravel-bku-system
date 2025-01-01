<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Operator\OperatorDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('layouts.app');
});

Route::group(['middleware' => ['auth']], function () {
    // Role Admin
    Route::group(['middleware' => ['role:Admin']], function () {
        Route::prefix('admin')->as('admin.')->group(function () {
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        });
    });

    // Role Operator
    // Route::group(['middleware' => ['role:operator']], function () {
    //     Route::prefix('operator')->as('operator.')->group(function () {
    //         Route::get('/dashboard', [OperatorDashboardController::class, 'index'])->name('dashboard');
    //     });
    // });
});
