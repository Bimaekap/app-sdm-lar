<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanCutiStaffController extends Controller
{
    // * Halaman form pengajuan cuti staff
    public function halamanFormCutiStaff($id)
    {
        $tableCutiUser = DB::table('cuti_user')->get();
        // dd($tableCutiUser);
        $userCuti =  User::with('CutiUser')->where('id',$id)->get();
        $collections = collect($userCuti);
        return view('admin.contents.cuti-management.page-pengajuan-cuti',['collections'=> $collections],['tableCutiUser' => $tableCutiUser]);
    }

      // * Halaman Melihat Hasil Pengajuan Cuti User Berdasarkan ID
      public function halamanHistoriCutiStaff($id)
      {
          $pengajuanCutiPerUser =  User::with('pengajuanCutiUser')->where('id',$id)->get();
          return view('admin.contents.cuti-management.page-pengajuan-cuti-saya',['pengajuanCutiPerUser' => $pengajuanCutiPerUser]);
      }


}
