<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\validasiCutiUser;

class PengajuanPermohonanCutiIzinUser extends Controller
{
    public function halamanPengajuanPermohonanDosen()
    {
        $dataPermohonanCuti = validasiCutiUser::all();
        return view('dosen.contents.kepala-divisi-page.halaman-permohonan',['dataPermohonanCuti' => $dataPermohonanCuti]);
    }

    public function halamanPengajuanPermohonanStaff()
    {
        return view('staff.contents.kepala-divisi-page.halaman-permohonan');
    }

    // ! POST
    public function terimaPengajuanPermohonanUser()
    {
        // #TODO: Validasi Izin Untuk Dosen
        $user = 
        dd('ok');
    }
    
}
