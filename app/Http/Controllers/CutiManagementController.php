<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\KategoriCuti;
use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TambahJenisCutiRequest;

  /*  #TODO: 
     [] show fitur show user
     [] edit fitur user
    */

class CutiManagementController extends Controller
{
    public function pageformatcuti(Request $request)
    {
        $kategoriCuti = KategoriCuti::get()->all();
        $data = User::with('CutiUser')->get()->all();
            $users = collect($data);
        return view('admin.contents.cuti-management.page-format-cuti',['kategoriCuti' => $kategoriCuti,'users' => $users]);
    }

    // * halaman form pengajuan cuti admin
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
    
    public function formtambahcuti(Request $request)
    {
        return view('admin.contents.cuti-management.forms.form-tambah-cuti');
    }

    // * Function Tambah Cuti Baru
    public function tambahcuti(Request $request) : RedirectResponse
    {
        /*  #TODO: Prioritas 
         [x] Buat fitur otomatis untuk menambahkan kategori_cuti ke semua users yang terdaftar pada table cuti_user
         [x] Buat Validasi Message Berhasil Buat Cuti Baru
         []  buatvalidasi message berhasil dan gagal buat cuti
         [] Terima data kategori cuti yang sudah pasti untuk form validasi dari hrd
        */
        $cuti = new KategoriCuti();

        // * Sebelumnya
        
        $validator = $request->validate([
            'jenis_cuti' => 'required|unique:kategori_cuti',
            'jumlah_cuti' => 'required'
        ],
        [
            'jenis_cuti.required' => 'Jenis cuti tidak boleh kosong',
            'jenis_cuti.unique' => 'Jenis cuti ini sudah tersedia',
            'jumlah_cuti.required' => 'Jumlah cuti tidak boleh kosong'
        ]);
        
        if(!empty($request->all())){
            KategoriCuti::create([
                'jenis_cuti' => Str::title($request->jenis_cuti),
                'jumlah_cuti' => $request->jumlah_cuti,
                'status' => 1
            ]);
        }
      
        $users = collect(User::all('id'));

        foreach($users as $userId){
            DB::table('cuti_user')->insert([
                'user_id' => $userId->id,
                'jenis_cuti' => $request->jenis_cuti,
                'jumlah_cuti' => $request->jumlah_cuti,
            ]);
        }

        // * Function Mengawali Alphabet pada setiap kalimat
        $namaCuti = Str::title($request->jenis_cuti);
        // -----------------------------------------
        // !NOTE
        return redirect()->back()->with('messages', 'Jenis Cuti '.$namaCuti.' Disimpan');
        
    }

    // * Menu Sidebar Pengajuan Cuti User
    //  * Berfungsi Untuk Menampilkan hasil semua data dari table pengajuan_cuti
    public function showListCuti(){
        $listCutiUser = PengajuanCuti::all();
        return view('superadmin.contents.pengajuan-cuti-user');
    }

    // * Menu Sidebar Pengajuan Cuti User > Action Show
    // * Berfungsi Untuk Menampilkan hasil data cuti berdasarkan id(user)
    public function lembarCutiUser(){
        return view('superadmin.contents.cuti.halaman-lembar-cuti');
    }

    // * Menu Show Cuti Apakah Sudah di approve atau belum
    public function showcuti(string $id): RedirectResponse
    {
        return view('admin.contents.cuti-management.crud.tambah-cuti');
    }

}
