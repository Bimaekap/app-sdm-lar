<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CutiUser;
use App\Models\KategoriCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreateUserRequest;

class UserManagementController extends Controller
{
    public function pageuser()
    {
        $user = User::query()->paginate(10);
        return view('superadmin.contents.users-management.page-user',['user' => $user]);
    }

    public function pagecreateuser(){

        return view('superadmin.contents.users-management.crud.create-user');
    }

    public function create(CreateUserRequest $request): RedirectResponse
    {
        
        /*
        #TODO : 
        [x] Berikan Status Validasi :default 0 ketika selesai membuat akun user baru.
        [] Ketika buat users otomatis semua cuti otomatis ditambah pada tabel cuti_user
        [] save 2 model untuk database kategori users dan buat users
        [] buat modal untuk update semua users ketika hrd menambah data cuti
        */
        $datacuti = KategoriCuti::select(['jenis_cuti','jumlah_cuti'])->get()->all();
        $newUser = new User();
        $newUser['name'] = $request->name;
        $newUser['email'] = $request->email;
        $newUser['role'] = $request->role;
        $newUser['password'] = $request->password;
        $newUser['status_validasi'] = 0;
        $newUser->save();

        if($newUser){
            foreach ($datacuti as $data){
               CutiUser::create([
                'user_id' => $newUser->id,
                'jenis_cuti' => $data->jenis_cuti,
                'jumlah_cuti' => $data->jumlah_cuti
            ]);
        }

        // * CREATE Validasi Cuti Users
        DB::insert('INSERT INTO validasi_cuti_users ( user_id, status_validasi) VALUES (?, ?)', [$newUser->id,0]);

    }
        return redirect()->route('page.user')->with('messages', 'User Berhasil Di Simpan');
    }
   public function pengajuanCutiPerUser($id)
   {
    $pengajuanCutiPerUser =  User::with('pengajuanCutiUser')->where('id',$id)->get();
    return view('admin.contents.cuti-management.page-pengajuan-cuti-saya',['pengajuanCutiPerUser' => $pengajuanCutiPerUser]);
    }

    public function profileUse(Request $request, $id)
    {
        $user = User::find($id);
        return view('profile-user',['user',$user]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        session()->flash('messages',$user->name .'berhasil di hapus');

        return redirect()->back();
    }

}
