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
        $credentials = $request->validated();
        $datacuti = KategoriCuti::select(['jenis_cuti','jumlah_cuti'])->get()->all();
        // #TODO: save 2 model untuk database kategori users dan buat users
        // #TODO: buat modal untuk update semua users ketika hrd menambah data cuti
        $newUser = User::create($credentials);
        if($newUser){
            foreach ($datacuti as $data){
                CutiUser::create([
                    'user_id' => $newUser->id,
                    'jenis_cuti' => $data->jenis_cuti,
                    'jumlah_cuti' => $data->jumlah_cuti
                ]);
            }
        }
       


        return redirect()->route('page.user')->with('messages', 'User Berhasil Di Simpan');
    }
}
