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

    public function create(CreateUserRequest $request): RedirectResponse
    {
        /*
        #TODO : 
        [x]  Berikan Status Validasi :default 0 ketika selesai membuat akun user baru.
        [] save 2 model untuk database kategori users dan buat users
        []buat modal untuk update semua users ketika hrd menambah data cuti
        */
        $datacuti = KategoriCuti::select(['jenis_cuti','jumlah_cuti'])->get()->all();
        $newUser = new User();
        $newUser['name'] = $request->name;
        $newUser['email'] = $request->email;
        $newUser['role'] = $request->role;
        $newUser['password'] = $request->password;
        $newUser->save();
        if($newUser){
            foreach ($datacuti as $data){
               $userData =  CutiUser::create([
                'user_id' => $newUser->id,
                'jenis_cuti' => $data->jenis_cuti,
                'jumlah_cuti' => $data->jumlah_cuti
            ]);

        }
        // * CREATE Validasi Cuti Users
        DB::insert('INSERT INTO validasi_cuti_users ( users_id, status_cuti_user) VALUES (?, ?)', [$newUser->id,0]);
        }
        return redirect()->route('page.user')->with('messages', 'User Berhasil Di Simpan');
    }
}
