<?php

namespace App\Http\Controllers\Servicer\Auth;

use App\Http\Controllers\Controller;
use App\Models\Servicer;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ServicerRegisterController extends Controller
{
    public function index()
    {
        if (Auth::guard('servicer')->check()) {
            return redirect('/servicer/dashboard');
        } else {
            return view('servicer.register.index');
        }

    }

    public function process(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:3|max:25',
            'last_name' => 'max:25',
            'gender' => 'required',
            'email' => 'required|unique:tbl_servicer|max:50|email',
            'username' => 'required|unique:tbl_servicer|max:50',
            'password' => 'min:6|required_with:confirm-password|same:confirm-password',
            'confirm-password' => 'min:6'
        ]);

        $servicer_id = Servicer::insertGetId([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([
            'user_id' => $servicer_id,
            'user_type' => 'servicer',
            'email' => $request->email,
            'name' => $request->username,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now(),
            'active_status' => 0,
            'avatar' => 'noimg',
            'dark_mode' => 0,
            'messenger_color' => '#4CAF50'

        ]);
        return redirect()->route('servicer.login')->with('regis', 'Berhasil Daftar, Silahkan login');
    }
}