<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\KategoriCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TambahJenisCutiRequest;

class CutiManagementController extends Controller
{
    public function pageformatcuti(Request $request)
    {
        $kategoriCuti = KategoriCuti::get()->all();
        $data = User::with('CutiUser')->get()->all();
            $users = collect($data);
        // foreach($users as $data){
        //     // echo $collections;
        //     // echo $data->CutiUser;
        //     // dd($data->CutiUser);
        //     // dd('ok');
        // }
        return view('admin.contents.cuti-management.page-format-cuti',['kategoriCuti' => $kategoriCuti,'users' => $users]);
    }

    public function pagepengajuancuti($id)
    {
        // ! ambil data table cuti_user
        $tableCutiUser = DB::table('cuti_user')->get();
        // dd($tableCutiUser);
        $userCuti =  User::with('CutiUser')->where('id',$id)->get();
        $collections = collect($userCuti);
        return view('admin.contents.cuti-management.page-pengajuan-cuti',['collections'=> $collections],['tableCutiUser' => $tableCutiUser]);
    }

    public function formubahcuti()
    {
        $kategoriCuti = KategoriCuti::get()->all();
        return view('admin.contents.cuti-management.forms.form-format-cuti',['kategoriCuti' => $kategoriCuti]);
    }

    // #TODO: buat halaman form cuti
    
    public function formtambahcuti(Request $request)
    {
        return view('admin.contents.cuti-management.forms.form-tambah-cuti');
    }
    // Creat Cuti
    public function tambahcuti(Request $request) : RedirectResponse
    {

       $validator = $request->validate([
            'jenis_cuti' => 'required|unique:kategori_cuti',
            'jumlah_cuti' => 'required'
        ],
        [
            'jenis_cuti.required' => 'Jenis cuti tidak boleh kosong',
            'jenis_cuti.unique' => 'Jenis cuti ini sudah tersedia',
            'jumlah_cuti.required' => 'Jumlah cuti tidak boleh kosong'
        ]);
        KategoriCuti::create([
            'jenis_cuti' => Str::title($request->jenis_cuti),
            'jumlah_cuti' => $request->jumlah_cuti,
            'status' => 1
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }


        $namaCuti = Str::title($request->jenis_cuti);
        session()->flash('messages', 'Jenis Cuti '.$namaCuti.' Disimpan');

        return redirect()->back();
        
    }

    public function showcuti(string $id): RedirectResponse
    {
        dd('ok');
        return view('admin.contents.cuti-management.crud.tambah-cuti');
    }
}
