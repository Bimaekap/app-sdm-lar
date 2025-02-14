<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanIzinDosenController extends Controller
{
    // * Menu Halaman Izin Dosen
    public function halamanFormIzinDosen($id){
        $user = User::find($id);
        return view('dosen.contents.izin-management.halaman-form-izin',['user' => $user]);
    }
}
