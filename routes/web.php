<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\CutiManagementController;
use App\Http\Controllers\UserManagementController;

// Login
Route::get('/',  function () {
    return view('index');
});

// Authenticate

Route::post('post.login', [LoginController::class, 'login'])->name('post.login');

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'superadmin', 'prefix' => 'superadmin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboardSuperAdmin'])->name('dashboard.superadmin');
        Route::get('/users-management', [UserManagementController::class, 'pageuser'])->name('page.user');

        // * Users Management
        Route::post('create-user', [UserManagementController::class, 'create'])->name('create.user');
    });

    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin');
        Route::get('/format-cuti',[CutiManagementController::class,'pageformatcuti'])->name('page.format.cuti');
        Route::get('/pengajuan-cuti',[CutiManagementController::class,'pagepengajuancuti'])->name('page.pengajuan.cuti');
    
        // * Forms
        Route::get('/form-ubah-cuti',[CutiManagementController::class,'formubahcuti'])->name('form.ubah.cuti');
        Route::post('/tambah-cuti',[CutiManagementController::class,'tambahcuti'])->name('post.tambah.cuti');

        Route::get('/cuti-user/{id}',function(string $id){

            $userCuti = App\Models\User::with('CutiUser')->where('id',$id)->get();
           return $collections = collect($userCuti);
        })->name('show.cuti.user');
    });

    Route::group(['middleware' => 'staff', 'prefix' => 'staff'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboardStaff'])->name('dashboard.staff');
    });

    Route::group(['middleware' => 'dosen', 'prefix' => 'dosen'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboardDosen'])->name('dashboard.dosen');
    });
});
