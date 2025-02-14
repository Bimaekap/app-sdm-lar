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
    // * Halaman Melihat Semua Data Page User
    public function pageuser()
    {
        $user = User::query()->paginate(10);
        return view('superadmin.contents.users-management.page-user',['user' => $user]);
    }

    // * Halaman Form Untuk Create User
    public function pagecreateuser(){

        return view('superadmin.contents.users-management.crud.create-user');
    }

    // * Function Buat User Baru
    public function create(CreateUserRequest $request): RedirectResponse
    {
        /*
        #TODO : 
        [x] Berikan Status Validasi :default 0 ketika selesai membuat akun user baru.
        [] Ketika buat users otomatis semua cuti otomatis ditambah pada tabel cuti_user
        [] save 2 model untuk database kategori users dan buat users
        [] buat modal untuk update semua users ketika hrd menambah data cuti
        [] Buat Validasi Message Ketika berhasil tambah user
        */

        $datacuti = KategoriCuti::select(['jenis_cuti','jumlah_cuti'])->get()->all();
        $newUser = new User();
        $newUser['name'] = $request->name;
        $newUser['email'] = $request->email;
        $newUser['NIP'] = $request->NIP;
        $newUser['jabatan'] = $request->jabatan;
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
      // * Halaman Melihat User berdasarkan Id
      public function showUser($id)
      {
          $user = User::find($id);
          return view('superadmin.contents.users-management.crud.show-user',['user' => $user]);
      }
    // * Function Edit User
    public function editUser(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->NIP = $request->NIP;
        $user->jabatan = $request->jabatan;
        $user->role = $request->role;
        $user->password = $request->password;
        $user->status_validasi = $user->status_validasi;
        $user->save();
        return redirect()->back()->with('messages','berhasil edit user');
    }

    // * Halaman Profile User Berdasarkan ID
    public function profileUser(Request $request, $id)
    {
        $user = User::find($id);
        return view('profile-user',['user',$user]);
    }

    // * Hapus Data User Berdasarkan Data Id
    public function destroy($id)
    {
        /*
        #TODO :
        [] buat validasi message hapus
        */
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('delete-message ',$user->name .'berhasil di hapus');
    }

}
