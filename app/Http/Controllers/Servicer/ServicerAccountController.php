<?php

namespace App\Http\Controllers\Servicer;

use App\Http\Controllers\Controller;
use App\Models\Servicer;
use Auth;
use Image;
use Illuminate\Http\Request;

class ServicerAccountController extends Controller
{
    public function index()
    {
        if (Auth::guard('servicer')->check()) {
            $data = Servicer::where('id_servicer', Auth::guard('servicer')->user()->id_servicer)->first();
            return view('servicer.accountcenter.index', ['data' => $data]);
        } else {
            return view('servicer.login.index');
        }
    }

    public function edit(Request $request)
    {
        $dataold = Servicer::where('id_servicer', Auth::guard('servicer')->user()->id_servicer)->first();
        if ($request->password == "") {
            if ($dataold->email == $request->email && $dataold->username == $request->username && $dataold->phone_no == $request->phone_no) {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'address' => 'required|max:200',
                ]);
            } elseif ($dataold->username == $request->username && $dataold->phone_no == $request->phone_no) {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'email' => 'required|unique:tbl_servicer|max:50|email',
                    'address' => 'required|max:200',
                ]);
            } elseif ($dataold->email == $request->email && $dataold->phone_no == $request->phone_no) {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'username' => 'required|unique:tbl_servicer|max:50',
                    'address' => 'required|max:200',
                ]);
            } else if ($dataold->email == $request->email && $dataold->username == $request->username) {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'phone_no' => 'required|unique:tbl_servicer|max:20',
                    'address' => 'required|max:200',
                ]);
            } else {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'email' => 'required|unique:tbl_servicer|max:50|email',
                    'username' => 'required|unique:tbl_servicer|max:50',
                    'phone_no' => 'required|unique:tbl_servicer|max:20',
                    'address' => 'required|max:200',
                ]);
            }
        } else {
            if ($dataold->email == $request->email && $dataold->username == $request->username && $dataold->phone_no == $request->phone_no) {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'address' => 'required|max:200',
                    'password' => 'min:6'
                ]);
            } elseif ($dataold->username == $request->username && $dataold->phone_no == $request->phone_no) {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'email' => 'required|unique:tbl_servicer|max:50|email',
                    'address' => 'required|max:200',
                    'password' => 'min:6'
                ]);
            } elseif ($dataold->email == $request->email && $dataold->phone_no == $request->phone_no) {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'username' => 'required|unique:tbl_servicer|max:50',
                    'address' => 'required|max:200',
                    'password' => 'min:6'
                ]);
            } else if ($dataold->email == $request->email && $dataold->username == $request->username) {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'phone_no' => 'required|unique:tbl_servicer|max:20',
                    'address' => 'required|max:200',
                    'password' => 'min:6'
                ]);
            } else {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'email' => 'required|unique:tbl_servicer|max:50|email',
                    'username' => 'required|unique:tbl_servicer|max:50',
                    'phone_no' => 'required|unique:tbl_servicer|max:20',
                    'address' => 'required|max:200',
                    'password' => 'min:6'
                ]);
            }
        }


        $file_loc = public_path('/assets/img/servicer/profile-img');
        if (!empty($request->file_upload)) {

            $img_file = $request->file('file_upload');

            $servicer_name = preg_replace('/\s+/', '', $request->username);

            $img_servicer_name = $servicer_name . time() . '.' . $img_file->getClientOriginalExtension();
            $resize_foto_servicer = Image::make($img_file->getRealPath());
            $resize_foto_servicer->resize(320, 220)->save($file_loc . '/' . $img_servicer_name);



            if ($request->password != "") {
                Servicer::where('id_servicer', Auth::guard('servicer')->user()->id_servicer)
                    ->update([
                        'username' => $request->username,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'phone_no' => $request->phone_no,
                        'address' => $request->address,
                        'profile_image' => $img_servicer_name,
                        'password' => bcrypt($request->password),
                        'updated_at' => now(),
                        'email' => $request->email
                    ]);
            } else {
                Servicer::where('id_servicer', Auth::guard('servicer')->user()->id_servicer)
                    ->update([
                        'username' => $request->username,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'phone_no' => $request->phone_no,
                        'address' => $request->address,
                        'profile_image' => $img_servicer_name,
                        'updated_at' => now(),
                        'email' => $request->email
                    ]);
            }

        } else {
            if ($request->password != "") {
                Servicer::where('id_servicer', Auth::guard('servicer')->user()->id_servicer)
                    ->update([
                        'username' => $request->username,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'phone_no' => $request->phone_no,
                        'address' => $request->address,
                        'password' => bcrypt($request->password),
                        'updated_at' => now(),
                        'email' => $request->email
                    ]);
            } else {
                Servicer::where('id_servicer', Auth::guard('servicer')->user()->id_servicer)
                    ->update([
                        'username' => $request->username,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'phone_no' => $request->phone_no,
                        'address' => $request->address,
                        'updated_at' => now(),
                        'email' => $request->email
                    ]);
            }
        }

        return redirect()->route('servicer.accountcenter')->with('Success', 'Your account information have been Updated');
    }
}