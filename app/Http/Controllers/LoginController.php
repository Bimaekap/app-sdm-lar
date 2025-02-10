<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // ? check who want to login
            if (Auth::user()->role == 'superadmin') {
                return redirect()->route('dashboard.superadmin');
            }
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard.admin');
            }
            if (Auth::user()->role == 'staff') {
                return redirect()->route('dashboard.staff');
            }
            if (Auth::user()->role == 'dosen') {
                return redirect()->route('dashboard.dosen');

            }
        } else {
            return back()->with('login', 'Email Dan Password salah');
        }
        dd('gagal login');
        return redirect()->route('dashboard')->with('message', 'berhasil login');
    }

public function logout(Request $request){
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}
}
