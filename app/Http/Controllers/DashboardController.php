<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardSuperAdmin()
    {
        return view('superadmin.contents.dashboard');
    }

    public function dashboardAdmin()
    {
        return view('admin.contents.dashboard');
    }

    public function dashboardDosen()
    {
        return view('dosen.contents.dashboard');
    }

    public function dashboardStaff()
    {
        return view('staff.contents.dashboard');
    }
}
