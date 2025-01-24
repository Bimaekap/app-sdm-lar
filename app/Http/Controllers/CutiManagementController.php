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
    public function pageformatcuti()
    {
        $kategoriCuti = KategoriCuti::get()->all();
        $user_cuti = User::with('CutiUser')->get();
            // dd($kategoriCuti[0]->jumlah_cuti);
        return view('admin.contents.cuti-management.page-format-cuti',['kategoriCuti' => $kategoriCuti]);
    }

    public function pagepengajuancuti()
    {
        return view('admin.contents.cuti-management.page-pengajuan-cuti');
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
