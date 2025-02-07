<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Http\Controllers\FilterUserController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\PengajuanCutiController;
use App\Http\Controllers\CutiManagementController;
use App\Http\Controllers\UserManagementController;

// Login
Route::get('/',  function () {
    return view('index');
}); 

// Authenticate

Route::post('post.login', [LoginController::class, 'login'])->name('post.login');
Route::post('post.logout', [LoginController::class, 'logout'])->name('post.logout');

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'superadmin', 'prefix' => 'superadmin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboardSuperAdmin'])->name('dashboard.superadmin');
        Route::get('/users-management', [UserManagementController::class, 'pageuser'])->name('page.user');


        // * Users Management
        Route::get('create-newuser',[UserManagementController::class,'pagecreateuser'])->name('page.create.user');
        Route::post('create-user', [UserManagementController::class, 'create'])->name('create.user');
           
    });

    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin');
        Route::get('/format-cuti',[CutiManagementController::class,'pageformatcuti'])->name('page.format.cuti');
        Route::get('/pengajuan-cuti/{id}',[CutiManagementController::class,'pagepengajuancuti'])->name('page.pengajuan.cuti');
        Route::get('/cuti/{id}',[UserManagementController::class,'pengajuanCutiPerUser'])->name('pengajuan.cutiper.user');
        
        // * Forms
        Route::get('/form-ubah-cuti',[CutiManagementController::class,'formubahcuti'])->name('form.ubah.cuti');
        Route::post('/tambah-cuti',[CutiManagementController::class,'tambahcuti'])->name('post.tambah.cuti');

         // * Tabel users management
        //  #TODO: Perbaiki route dibawah
        Route::any('status-filter',[FilterUserController::class, 'filterStatus'])->name('filter.status');

        // #NOTE: function hasil semua data cuti user ada di sini 
        Route::get('/cuti-user/{id}',function(string $id){

            $userCuti = App\Models\User::with('CutiUser')->where('id',$id)->get();
           return $collections = collect($userCuti);

        })->name('show.cuti.user');

        // * Post Route pengajuan cuti
        Route::post('pengajuan-cuti', [PengajuanCutiController::class,'pengajuanCuti'] )->name('post.pengajuan.cuti');
        // * Get Route Halaman Form Pengajuan CUti
        Route::get('form-pengajuan-cuti/{name}', [PengajuanCutiController::class,'formPengajuanCuti'])->name('form.pengajuan.cuti');
    });
    
    Route::group(['middleware' => 'staff', 'prefix' => 'staff'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboardStaff'])->name('dashboard.staff');
    });

    Route::group(['middleware' => 'dosen', 'prefix' => 'dosen'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboardDosen'])->name('dashboard.dosen');
    });
});
