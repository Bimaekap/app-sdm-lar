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
        // dd($request->all());
        // $credentials = $request->validate([
        //     'users_id' => $id,
        //     'jenis_cuti' => $request->jenis_cuti,
        //     'file_pengajuan' => $request->file_pengajuan,
        //     'jumlah_cuti' => $request->jumlah_cuti,
        // ]);

        if($request->hasFile('file_pengajuan')){
            $file = $request->file_pengajuan->getClientOriginalName();

            DB::insert('INSERT INTO pengajuan_cuti (users_id, jenis_cuti, file_pengajuan, jumlah_cuti) VALUES (?, ?, ?, ?)', [$id , $request->jenis_cuti , $file, $request->jumlah_cuti]);
           // DB::table('insert into pengajuan_cuti', )
   
        }
        return redirect()->back()->with('messages','Pengajuan Cuti Berhasil');
    }
    
}
