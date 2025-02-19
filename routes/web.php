<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Http\Controllers\FilterUserController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\PengajuanCutiController;
use App\Http\Controllers\PengajuanIzinController;
use App\Http\Controllers\CutiManagementController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\PengajuanCutiDosenController;
use App\Http\Controllers\PengajuanCutiStaffController;
use App\Http\Controllers\PengajuanIzinDosenController;
use App\Http\Controllers\PengajuanIzinStaffController;
use App\Http\Controllers\PengajuanPermohonanCutiIzinUser;

// * Index / Login
Route::get('/',  function () {
    return view('index');
}); 

// * Authenticate
Route::post('post.login', [LoginController::class, 'login'])->name('post.login');
Route::post('post.logout', [LoginController::class, 'logout'])->name('post.logout');

/**
 * #TODO 
 * [] buat route profile untuk semua role
 * 
 * 
 */

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'superadmin', 'prefix' => 'superadmin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboardSuperAdmin'])->name('dashboard.superadmin');
        Route::get('/users-management', [UserManagementController::class, 'pageuser'])->name('page.user');
        
        // * Users Management Create
        Route::get('create-newuser',[UserManagementController::class,'pagecreateuser'])->name('page.create.user');
        Route::post('create-user', [UserManagementController::class, 'create'])->name('create.user');
        // --------------------------------
        // * List Cuti User
        Route::get('/list-cuti-users',[CutiManagementController::class,'showListCuti'])->name('get.list.cuti.user');
        Route::get('/halaman-file-users',[CutiManagementController::class,'lembarCutiUser'])->name('get.lembar.cuti.user');
        // ---------------------------------    
    });

    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
        // * Dashboard
        Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin');
        // -------------------------------
        // * Format Cuti
        Route::get('/format-cuti',[CutiManagementController::class,'pageformatcuti'])->name('page.format.cuti');
        Route::get('/pengajuan-cuti/{id}',[CutiManagementController::class,'pagepengajuancuti'])->name('page.pengajuan.cuti');
        Route::get('/cuti/{id}',[UserManagementController::class,'pengajuanCutiPerUser'])->name('pengajuan.cutiper.user');
        // * Get Cuti base on name
        Route::get('/showcuti/{name}', [CutiManagementController::class,'showcuti'])->name('get.form.cuti');
        Route::get('/form-ubah-cuti',[CutiManagementController::class,'formubahcuti'])->name('form.ubah.cuti');
        // -----------------------------
        // * Crud User Admin
        Route::get('show-user/{id}',[UserManagementController::class,'showUser'])->name('show.user');
        Route::post('edit-user',[UserManagementController::class,'editUser'])->name('edit.user');
        // * Hapus User
        Route::post('destroy-user/{id}',[UserManagementController::class,'destroy'])->name('destroy.user');
        // #TODO: Ubah route di bawah khusus untuk role admin
        // Route::get('/users-management', [UserManagementController::class, 'pageuser'])->name('page.user');
        // Route::get('/list-cuti-users',[CutiManagementController::class,'showListCuti'])->name('get.list.cuti.user');
        Route::get('/tambah-cuti', [CutiManagementController::class,'formTambahCuti'])->name('form.tambah.cuti');
        Route::post('/tambah-cuti',[CutiManagementController::class,'tambahcuti'])->name('post.tambah.cuti');
        // * Tabel users management
        //  #TODO: Perbaiki route dibawah
        Route::any('/status-filter',[FilterUserController::class, 'filterStatus'])->name('filter.status');    
        Route::get('/cuti-user/{id}',function(string $id){
            $userCuti = App\Models\User::with('CutiUser')->where('id',$id)->get();
           return $collections = collect($userCuti);
        })->name('show.cuti.user');

        // * Post Route pengajuan cuti
        Route::post('pengajuan-cuti', [PengajuanCutiController::class,'pengajuanCuti'] )->name('post.pengajuan.cuti');
        // * Get Route Halaman Form Pengajuan CUti
        Route::get('form-pengajuan-cuti/{name}', [PengajuanCutiController::class,'formPengajuanCuti'])->name('form.pengajuan.cuti');
        // -------------------------------
    });
    
    Route::group(['middleware' => 'staff', 'prefix' => 'staff'], function () {
        // * Dashboard
        Route::get('/dashboard', [DashboardController::class, 'dashboardStaff'])->name('dashboard.staff');
        // ------------------------
        // * Halaman Pengajuan Cuti
        Route::get('/cuti-staff/{name}',[PengajuanCutiStaffController::class,'halamanFormCutiStaff'])->name('halaman.form.cuti.staff');
        Route::get('/history-cuti-staff/{id}',[PengajuanCutiStaffController::class,'halamanHistoriCutiStaff'])->name('halaman.histori.cuti.staff');
        // * CRUD
        Route::post('pengajuan-cuti', [PengajuanCutiStaffController::class,'pengajuanCuti'] )->name('post.pengajuan.cuti.staff');

        // -----------------
        // * Halaman Pengajuan Izin
        Route::get('/izin-staff/{name}',[PengajuanIzinStaffController::class,'halamanFormIzinStaff'])->name('halaman.form.izin.staff');
        Route::get('/history-izin-staff/{name}',[PengajuanIzinStaffController::class,'halamanHistoriIzinStaff'])->name('halaman.histori.izin.staff');
        // ------------------------
            // * Halaman permohonan cuti anggota
            Route::get('/validasi-cuti-anggota-staff',[PengajuanPermohonanCutiIzinUser::class,'halamanPengajuanPermohonanStaff'])->name('halaman.permohonan.validasi.staff');
            // -----------------
        // * CRUD
        Route::post('/create-izin', [PengajuanIzinStaffController::class,'pengajuanIzin'])->name('post.pengajuan.izin.staff');

    });

    Route::group(['middleware' => 'dosen', 'prefix' => 'dosen'], function () {
        // * Dashboard
        Route::get('/dashboard', [DashboardController::class, 'dashboardDosen'])->name('dashboard.dosen');
        // -----------------------
        // * Halaman Pengajuan Cuti Dosen 
        Route::get('/cuti-dosen/{name}',[PengajuanCutiDosenController::class,'halamanFormCutiDosen'])->name('halaman.form.cuti.dosen');
        Route::get('/history-cuti-dosen/{id}',[PengajuanCutiDosenController::class,'halamanHistoriCutiDosen'])->name('halaman.histori.cuti.dosen');

        // * Halaman Pengajuan Izin
        Route::get('/izin-dosen/{name}',[PengajuanIzinDosenController::class,'halamanFormIzinDosen'])->name('halaman.form.izin.dosen');
        Route::get('/history-dosen/{name}',[PengajuanIzinDosenController::class,'halamanHistoriIzinDosen'])->name('halaman.histori.izin.dosen');
        // -------------------------
        // * Halaman permohonan cuti anggota
        Route::get('/validasi-cuti-anggota-dosen',[PengajuanPermohonanCutiIzinUser::class,'halamanPengajuanPermohonanDosen'])->name('halaman.permohonan.validasi.dosen');
        // ! Validasi
        Route::post('/validasi-dosen',[PengajuanPermohonanCutiIzinUser::class,'terimaPengajuanPermohonanUser'])->name('post.validasi.permohonan');
        // -----------------
        
        // * CRUD
        Route::post('/create-izin', [PengajuanIzinDosenController::class,'pengajuanIzin'])->name('post.pengajuan.izin.dosen');
    });

});
