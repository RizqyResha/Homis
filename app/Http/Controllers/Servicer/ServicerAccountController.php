<?php

namespace App\Http\Controllers\Servicer;

use App\Http\Controllers\Controller;
use App\Models\Servicer;
use App\Models\User;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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

            if ($request->hasFile('file_upload')) {
                // allowed extensions
                $allowed_images = Chatify::getAllowedImages();

                $file = $request->file('file_upload');
                // check file size
                if ($file->getSize() < Chatify::getMaxUploadSize()) {
                    if (in_array(strtolower($file->extension()), $allowed_images)) {
                        // delete the older one
                        if (Auth::user()->avatar != config('chatify.user_avatar.default')) {
                            $avatar = Auth::user()->avatar;
                            if (Chatify::storage()->exists(strval($avatar))) {
                                Chatify::storage()->delete(strval($avatar));
                            }
                        }
                        // upload
                        $avatar = Str::uuid() . "." . $file->extension();
                        $update = User::where('id', Auth::user()->id)->update(['avatar' => $avatar]);
                        $file->storeAs(config('chatify.user_avatar.folder'), $avatar, config('chatify.storage_disk_name'));
                        $success = $update ? 1 : 0;
                    } else {
                        $msg = "File extension not allowed!";
                        $error = 1;
                    }
                } else {
                    $msg = "File size you are trying to upload is too large!";
                    $error = 1;
                }
            }

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
                User::where('user_id', Auth::guard('servicer')->user()->id_servicer)->where('user_type', 'servicer')
                    ->update([
                        'email' => $request->email,
                        'name' => $request->username,
                        'password' => bcrypt($request->password),
                        'updated_at' => now(),
                        'avatar' => $avatar,
                        'messenger_color' => '#4CAF50'
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

                User::where('user_id', Auth::guard('servicer')->user()->id_servicer)->where('user_type', 'servicer')
                    ->update([
                        'email' => $request->email,
                        'name' => $request->username,
                        'updated_at' => now(),
                        'avatar' => $avatar,
                        'messenger_color' => '#4CAF50'
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
                User::where('user_id', Auth::guard('servicer')->user()->id_servicer)->where('user_type', 'servicer')
                    ->update([
                        'email' => $request->email,
                        'name' => $request->username,
                        'password' => bcrypt($request->password),
                        'updated_at' => now(),
                        'messenger_color' => '#4CAF50'
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
                User::where('user_id', Auth::guard('servicer')->user()->id_servicer)->where('user_type', 'servicer')
                    ->update([
                        'email' => $request->email,
                        'name' => $request->username,
                        'updated_at' => now(),
                        'messenger_color' => '#4CAF50'
                    ]);
            }
        }

        return redirect()->route('servicer.accountcenter')->with('Success', 'Your account information have been Updated');
    }
}