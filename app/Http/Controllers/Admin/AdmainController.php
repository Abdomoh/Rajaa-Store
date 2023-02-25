<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AdmainController extends Controller
{
    public function admain()
    {

        $users = User::all();

        return view('admin.admain', compact('users'));
    }
    public function addrole(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();

        if ($request['role_user']) {
            $user->roles()->attach(Role::where('name', 'user')->first());
        }

        if ($request['role_admain']) {
            $user->roles()->attach(Role::where('name', 'admain')->first());
        }
        return redirect()->back();
    }
}
