<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanCutiDosenController extends Controller
{
    public function halamanFormCutiDosen($id)
    {
        // ! ambil data table cuti_user
        $tableCutiUser = DB::table('cuti_user')->get();
        // dd($tableCutiUser);
        $userCuti =  User::with('CutiUser')->where('id',$id)->get();
        $collections = collect($userCuti);
        return view('admin.contents.cuti-management.page-pengajuan-cuti',['collections'=> $collections],['tableCutiUser' => $tableCutiUser]);
    }

     // * Halaman Melihat Hasil Pengajuan Cuti User Berdasarkan ID
    public function halamanHistoriCutiDosen($id)
    {
        $pengajuanCutiPerUser =  User::with('pengajuanCutiUser')->where('id',$id)->get();
        return view('admin.contents.cuti-management.page-pengajuan-cuti-saya',['pengajuanCutiPerUser' => $pengajuanCutiPerUser]);
    }

    

}
