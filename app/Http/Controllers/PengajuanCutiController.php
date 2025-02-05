<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PengajuanCutiRequest;

class PengajuanCutiController extends Controller
{
    public function pengajuanCuti(Request $request, $id)

    {
    /* #TODO: Fitur

    [x] buat file upload dan disimpan ke file storage
    [x] buat file storage berdasarkan nama folder:file_pengajuan_cuti/role/nama/data
    [] buat pengurangan ketika users berhasil menggunakan cuti

    */
    // ! variabel mengambil data user dari tabel relationship cuti user
    $userCuti =  User::with('CutiUser')->where('id',$id)->get();
    $collections = collect($userCuti);
    // ! varibel untuk mengambil langsung ke data cuti user
    $user = User::findOrFail($id);
    $cuti = $user->CutiUser()->where('jenis_cuti',$request->jenis_cuti)->first();
        // ! looping data cutiuser
        foreach($collections as $items){
            foreach($items->cutiUser as $item){
                if($item->jenis_cuti  == $request->jenis_cuti ){;
                $jumlahCutiUpdate = ($item->jumlah_cuti - $request->jumlah_cuti);
                // * update jumlah cuti
                $cuti->update(['jumlah_cuti',$jumlahCutiUpdate]);
                dd('berhasil kurang');
                }
            }
            
        }

        $request->validate([
            'users_id' => 'required',
            'jenis_cuti' => 'required',
            'file_pengajuan' => 'required',
            'jumlah_cuti' => 'required',
        ]);

        $userData = User::where('id',$id)->get();
        $fileStorage = Storage::disk('file_cuti');
        if($request->hasFile('file_pengajuan')){
            $file = $request->file('file_pengajuan');
            $fileName = $file->getClientOriginalName();
            $path = $userData->role . '/' .$userData->name.'/data';
            $fileStorage->putFileAs($userData->role . '/' .$userData->name.'/data', $file,$fileName, 'public');
            DB::insert('INSERT INTO pengajuan_cuti (users_id, jenis_cuti, file_pengajuan, jumlah_cuti) VALUES (?, ?, ?, ?)', [$id , $request->jenis_cuti , $fileName, $request->jumlah_cuti]);
            
            // DB::table('insert into pengajuan_cuti', )
        }
        return redirect()->back()->with('messages','Pengajuan Cuti Berhasil');
    }
    
}
