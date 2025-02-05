<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FilterUserController extends Controller
{
    //

     /* #TODO 
        [] Filter Button -> status 
    */

    public function filterStatus(Request $request,$data)
    {
        $data['data'] = $data;
        $filterStatus = User::get()->where($request->filter,0);
        dd($data);
        return redirect()->route('page.format.cuti', ['filterStatus' => $filterStatus, 'data' => $data]);
    }
}
