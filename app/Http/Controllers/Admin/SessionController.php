<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Role;
use App\Models\User;

class SessionController extends Controller
{


    public function create()
    {
        return view('admin.users.login');
    }

    public function store()
    {
        if (!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors(['massage' => 'الايميل او الباسورد غير صحيحين']);
        }
        if (auth::user()->hasRole('admain')) {
            toastr()->success('تم تسجيل الدخول');
            return redirect()->to('dashboard');
        } else {
            return redirect()->intended('/');
        }
    }


    public function destory()
    {
        auth()->logout();
        return redirect('../login');
    }
}
