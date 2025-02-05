<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\KategoriCuti;
use Illuminate\Http\Request;
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

    public function pagepengajuancuti($name)
    {

        $userCuti =  User::with('CutiUser')->where('name',$name)->get();
        $collections = collect($userCuti);
        return view('admin.contents.cuti-management.page-pengajuan-cuti',['collections'=> $collections]);
    }
    
    public function formubahcuti()
    {
        $kategoriCuti = KategoriCuti::get()->all();

        return view('admin.contents.cuti-management.forms.form-format-cuti',['kategoriCuti' => $kategoriCuti]);
    }

    public function tambahcuti(Request $request) : RedirectResponse
    {
        $request->validate([
            'jenis_cuti' => 'required|unique:kategori_cuti',
            'jumlah_cuti' => 'required'
        ],);
        
        KategoriCuti::create([
            'jenis_cuti' => Str::title($request->jenis_cuti),
            'jumlah_cuti' => $request->jumlah_cuti,
            'status' => 1
        ]);

        $namaCuti = Str::title($request->jenis_cuti);
        return redirect()->back()->with('messages','Jenis Cuti '.$namaCuti.' Disimpan');
    }

    public function showcuti(string $id): RedirectResponse
    {
        // $userBaseOnId = User::find($id);
        return redirect()->back()->with(['userBaseOnId' => $userBaseOnId]);

    }
}
