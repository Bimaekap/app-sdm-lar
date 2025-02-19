<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use App\Models\validasiCutiUser;
use App\Models\PengajuanIzinUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PengajuanCutiRequest;


/* #TODO : Prioritas 
    [] buat pengajuan izin untuk seluruh staff
*/

class PengajuanCutiController extends Controller
{

    // * Admim
    public function pengajuanIzin(Request $request)
    {
        /* #TODO:
            [x] Buat post pengajuan Izin Disini
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
                    'alasan' => $request->jenis_cuti,
                    'file_pengajuan' => $fileName,
                ]);
            
            return redirect()->back()->with('success', 'Izin Berhasil Di Ajukan' );
    }
    public function pengajuanCuti(Request $request)
    {
        /* #TODO: Fitur Prioritas
        [x] buat input file optional
        [] buat notifikasi ke seluruh kepala untuk approve pengajuan cuti
        [] buat validasi ketika jatah_cuti telah habis, dan hilangkan data cuti nya
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
    $userData = User::where('id',Auth::user()->id)->get()->first();
    $kepalaDivisi = User::where('name', $request->kepala_divisi)->first();
            if($request->has('file_pengajuan')){
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

                    validasiCutiUser::create([
                        'user_id' => $kepalaDivisi->id,
                        'nama_pimpinan' => $kepalaDivisi->name,
                        'nama_pengaju' => Auth::user()->name,
                        'jenis_cuti' => $request->jenis_cuti,
                        'jumlah_cuti' => $request->jumlah_cuti,
                        'jenis_pengajuan' => 'Cuti',
                        'status_validasi' => 0,
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
        }else{
            PengajuanCuti::create([
                'users_id' => Auth::user()->id,
                'jenis_cuti' => $request->jenis_cuti,
                'jumlah_cuti' => $request->jumlah_cuti,
            ]);

            validasiCutiUser::create([
                'user_id' => $kepalaDivisi->id,
                'nama_pimpinan' => $kepalaDivisi->name,
                'nama_pengaju' => Auth::user()->name,
                'jenis_cuti' => $request->jenis_cuti,
                'jumlah_cuti' => $request->jumlah_cuti,
                'jenis_pengajuan' => 'Cuti',
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
        }
        return redirect()->back()->with('success', 'Cuti Berhasil Dipakai' );
    }

    // * Pengajuan Cuti Untuk Superadmin
    public function formPengajuanCuti($name)
    {
        $user = User::where('name',$name)->first();
        // * Mengambil data dari cuti user
        $userCuti =  User::with('CutiUser')->where('name',$name)->get();
        $collections = collect($userCuti);
        $pengajuanCutiPerUser =  User::with('pengajuanCutiUser')->where('name',$name)->get();
        return view('admin.contents.cuti-management.forms.form-pengajuan-cuti',['pengajuanCutiPerUser' => $pengajuanCutiPerUser,'collections' => $collections],['user' => $user],[]);
    }
        
}
