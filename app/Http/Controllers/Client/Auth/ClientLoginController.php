<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ClientLoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::guard('client')->check()) {
            return redirect()->route('home');
        } else {
            return view('client.login.index');
        }

    }

    public function postLogin(Request $request)
    {

        // validasi
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password]) && Auth::guard('web')->attempt(['user_type' => 'client', 'email' => $request->email, 'password' => $request->password])) {
            // Pindah ke halaman dashboard
            return redirect()->intended('/');
        } else {
            return redirect()->route('client.login')->with('Failed', 'Wrong password or Email');
        }

    }

    public function logout()
    {
        if (Auth::guard('client')->check()) {
            Auth::guard('client')->logout();
        }
        return redirect('/login');
    }
}