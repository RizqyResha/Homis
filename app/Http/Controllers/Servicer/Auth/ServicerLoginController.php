<?php

namespace App\Http\Controllers\Servicer\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class ServicerLoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::guard('servicer')->check()) {
            return redirect()->route('servicer.dashboard');
        } else {
            return view('servicer.login.index');
        }

    }

    public function postLogin(Request $request)
    {

        // validasi
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('servicer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Pindah ke halaman dashboard
            return redirect()->intended('/servicer/dashboard');
        } else {
            return redirect()->route('servicer.login')->with('Failed', 'Wrong password or Email');
        }

    }

    public function logout()
    {
        if (Auth::guard('servicer')->check()) {
            Auth::guard('servicer')->logout();
        }
        return redirect('/servicer/login');
    }
}