<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PengajuanIzinUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanIzinStaffController extends Controller
{
    
    // * Menu Halaman Izin Staff
    public function halamanFormIzinStaff($id){
        $user = User::find($id);
        return view('staff.contents.izin-management.halaman-form-izin',['user' => $user]);
    }

    public function halamanHistoriIzinStaff($id)
    {
        $pengajuanIzinPerUser =  User::with('pengajuanIzinUser')->where('id',$id)->get();
        return view('staff.contents.izin-management.halaman-histori-izin',['pengajuanIzinPerUser' => $pengajuanIzinPerUser]);
    }

    
    public function pengajuanIzin(Request $request)
    {
        /* #TODO:
            [] Buat post pengajuan Izin Disini
        */ 
       $user = User::find(Auth::user()->id);
            $userData = User::where('id',Auth::user()->id)->get()->first();
            $fileStorage = Storage::disk('file_izin');
                $file = $request->file('file_pengajuan');
                $fileName = $file->getClientOriginalName();
                $path = $userData->role . '/' .$userData->name.'/data';
                $fileStorage->putFileAs($userData->role . '/' .$userData->name.'/data', $file,$fileName, 'public');
    
                PengajuanIzinUser::create([
                    'users_id' => Auth::user()->id,
                    'alasan' => $request->alasan,
                    'file_pengajuan' => $fileName,
                ]);
            
            return redirect()->back()->with('success', 'Izin Berhasil Di Ajukan' );
    }
    
}
