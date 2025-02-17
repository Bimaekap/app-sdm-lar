<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanCutiStaffController extends Controller
{
    // * Halaman form pengajuan cuti staff
    public function halamanFormCutiStaff($id)
    {
        $user = User::where('id',$id)->first();

        $tableCutiUser = DB::table('cuti_user')->get();
        // dd($tableCutiUser);
        $userCuti =  User::with('CutiUser')->where('id',$id)->get();
        $collections = collect($userCuti);
        return view('staff.contents.cuti-management.forms.form-pengajuan-cuti',['collections'=> $collections,'user' => $user],['tableCutiUser' => $tableCutiUser]);
    }

      // * Halaman Melihat Hasil Pengajuan Cuti User Berdasarkan ID
      public function halamanHistoriCutiStaff($id)
      {
          $pengajuanCutiPerUser =  User::with('pengajuanCutiUser')->where('id',$id)->get();
          return view('staff.contents.cuti-management.halaman-histori-cuti',['pengajuanCutiPerUser' => $pengajuanCutiPerUser]);
      }


}
