<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientRegisterController extends Controller
{
    public function index()
    {
        return view('client.register.index');
    }

    public function process(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:3|max:25',
            'last_name' => 'max:25',
            'gender' => 'required',
            'email' => 'required|unique:tbl_client|max:50|email',
            'username' => 'required|unique:tbl_client|max:50',
            'password' => 'min:6|required_with:confirm-password|same:confirm-password',
            'confirm-password' => 'min:6'
        ]);

        Client::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('client.login')->with('regis', 'Berhasil Daftar, Silahkan login');
    }
}