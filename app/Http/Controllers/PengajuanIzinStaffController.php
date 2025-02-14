<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanIzinStaffController extends Controller
{
    
    // * Menu Halaman Izin Staff
    public function halamanFormIzinStaff($id){
        $user = User::find($id);
        return view('staff.cont\ents.izin-management.halaman-form-izin',['user' => $user]);
    }

    public function halamanHistoriIzinDosen($name){
        
    }
    
}
