<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PengajuanCutiRequest;

class PengajuanCutiController extends Controller
{
    public function pengajuanCuti(Request $request)
    {
        /* #TODO: Fitur
        [x] buat file upload dan disimpan ke file storage
        [x] buat file storage berdasarkan nama folder:file_pengajuan_cuti/role/nama/data
        [x] buat pengurangan ketika users berhasil menggunakan cuti
        [x] buat validasi ketika jatah_cuti telah habis, dan hilangkan data cuti nya
        [] buat dan sesusaikan limit user ketika menggunakan sisa cuti, dan ketika jumlah cuti sudah 0 tidak dapat memakai cuti lagi
        [] aktifkan hasil validasi message sukses
        ? Optional :
        [] buat kolom input kepala divisi untuk staff dan dosen memilih kepala divisinya
        */
    // ! variabel mengambil data user dari tabel relationship cuti user
    $userCuti =  User::with('CutiUser')->where('id',Auth::user()->id)->get();
    $collections = collect($userCuti);
    // ! varibel untuk mengambil langsung ke data cuti user
    $user = User::find(Auth::user()->id);
    $cuti = $user->CutiUser()->where('jenis_cuti',$request->jenis_cuti)->first();
        $userData = User::where('id',Auth::user()->id)->get()->first();
        $fileStorage = Storage::disk('file_cuti');
            $file = $request->file('file_pengajuan');
            $fileName = $file->getClientOriginalName();
            $path = $userData->role . '/' .$userData->name.'/data';
            $fileStorage->putFileAs($userData->role . '/' .$userData->name.'/data', $file,$fileName, 'public');

            PengajuanCuti::create([
                'users_id' => Auth::user()->id,
                'jenis_cuti' => $request->jenis_cuti,
                'file_pengajuan' => $fileName,
                'jumlah_cuti' => $request->jumlah_cuti,
            ]);
        foreach($collections as $items){
            foreach($items->cutiUser as $item){
                if($item->jenis_cuti  == $request->jenis_cuti ){;
                $cuti = $user->CutiUser()->where('jenis_cuti',$request->jenis_cuti)->first();
                    if($cuti->jumlah_cuti >= 1 ) {
                        $jumlahCutiUpdate = ($item->jumlah_cuti - $request->jumlah_cuti);
                        // * update jumlah cuti
                        DB::table('cuti_user')->where('user_id',$user->id)->where('jenis_cuti',$request->jenis_cuti)->update(array(
                            'jumlah_cuti'=>$jumlahCutiUpdate,
                        ));
                    }
                    if($cuti->jumlah_cuti == 0){
                        // ! Cek jumlah cuti jika 0 return back
                        return redirect()->back()->with('jumlah_cuti', ['sisa sudah terpakai semua'] );
                    }
            }  
        }
        }
        return redirect()->back()->with('success', 'Cuti Berhasil Dipakai' );
    }
    
    public function formPengajuanCuti($name)
    {
        $user = User::where('name',$name)->first();

        // * Mengambil data dari cuti user
        $userCuti =  User::with('CutiUser')->where('name',$name)->get();
        $collections = collect($userCuti);
        $pengajuanCutiPerUser =  User::with('pengajuanCutiUser')->where('name',$name)->get();
        return view('admin.contents.cuti-management.forms.form-pengajuan-cuti',['pengajuanCutiPerUser' => $pengajuanCutiPerUser,'collections' => $collections],['user' => $user],[]);
    }

    public function formPengajuanCutiStaff($name)
    {
        $user = User::where('name',$name)->first();

        // * Mengambil data dari cuti user
        $userCuti =  User::with('CutiUser')->where('name',$name)->get();
        $collections = collect($userCuti);
        $pengajuanCutiPerUser =  User::with('pengajuanCutiUser')->where('name',$name)->get();
        return view('admin.contents.cuti-management.forms.form-pengajuan-cuti',['pengajuanCutiPerUser' => $pengajuanCutiPerUser,'collections' => $collections],['user' => $user],[]);
    }

    public function formPengajuanCutiDosen($name)
    {
        $user = User::where('name',$name)->first();

        // * Mengambil data dari cuti user
        $userCuti =  User::with('CutiUser')->where('name',$name)->get();
        $collections = collect($userCuti);
        $pengajuanCutiPerUser =  User::with('pengajuanCutiUser')->where('name',$name)->get();
        return view('admin.contents.cuti-management.forms.form-pengajuan-cuti',['pengajuanCutiPerUser' => $pengajuanCutiPerUser,'collections' => $collections],['user' => $user],[]);
    }

        
}
