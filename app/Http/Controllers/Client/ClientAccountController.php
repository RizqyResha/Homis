<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class ClientAccountController extends Controller
{
    public function index()
    {
        if (Auth::guard('client')->check()) {
            $data = Client::where('id_client', Auth::guard('client')->user()->id_client)->first();
            return view('client.account.accountcenter.index', ['data' => $data]);
        } else {
            return view('client.login.index');
        }
    }

    public function edit(Request $request)
    {
        $dataold = Client::where('id_client', Auth::guard('client')->user()->id_client)->first();
        // if ($dataold->username == $request->username || $dataold->email == $request->email || $dataold->phone_no == $request->phone_no) {
        //     if ($dataold->username == $request->username) {
        //         if ($request->password != "") {
        //             $request->validate([
        //                 'first_name' => 'required|min:3|max:25',
        //                 'last_name' => 'max:25',
        //                 'email' => 'required|unique:tbl_client|max:50|email',
        //                 'phone_no' => 'required|unique:tbl_client|max:20',
        //                 'address' => 'required|max:200',
        //                 'password' => 'min:6'
        //             ]);
        //         } else {
        //             $request->validate([
        //                 'first_name' => 'required|min:3|max:25',
        //                 'last_name' => 'max:25',
        //                 'email' => 'required|unique:tbl_client|max:50|email',
        //                 'phone_no' => 'required|unique:tbl_client|max:20',
        //                 'address' => 'required|max:200',
        //             ]);
        //         }
        //     }

        //     if ($dataold->email == $request->email) {
        //         if ($request->password != "") {
        //             $request->validate([
        //                 'first_name' => 'required|min:3|max:25',
        //                 'last_name' => 'max:25',
        //                 'username' => 'required|unique:tbl_client|max:50',
        //                 'phone_no' => 'required|unique:tbl_client|max:20',
        //                 'address' => 'required|max:200',
        //                 'password' => 'min:6'
        //             ]);
        //         } else {
        //             $request->validate([
        //                 'first_name' => 'required|min:3|max:25',
        //                 'last_name' => 'max:25',
        //                 'username' => 'required|unique:tbl_client|max:50',
        //                 'phone_no' => 'required|unique:tbl_client|max:20',
        //                 'address' => 'required|max:200',
        //             ]);
        //         }
        //     }


        //     if ($dataold->phone_no == $request->phone_no) {
        //         if ($request->password != "") {
        //             $request->validate([
        //                 'first_name' => 'required|min:3|max:25',
        //                 'last_name' => 'max:25',
        //                 'email' => 'required|unique:tbl_client|max:50|email',
        //                 'username' => 'required|unique:tbl_client|max:50',
        //                 'address' => 'required|max:200',
        //                 'password' => 'min:6'
        //             ]);
        //         } else {
        //             $request->validate([
        //                 'first_name' => 'required|min:3|max:25',
        //                 'last_name' => 'max:25',
        //                 'email' => 'required|unique:tbl_client|max:50|email',
        //                 'username' => 'required|unique:tbl_client|max:50',
        //                 'address' => 'required|max:200',
        //             ]);
        //         }
        //     }


        // } else {
        //     if ($request->password != "") {
        //         $request->validate([
        //             'first_name' => 'required|min:3|max:25',
        //             'last_name' => 'max:25',
        //             'email' => 'required|unique:tbl_client|max:50|email',
        //             'username' => 'required|unique:tbl_client|max:50',
        //             'phone_no' => 'required|unique:tbl_client|max:20',
        //             'address' => 'required|max:200',
        //             'password' => 'min:6'
        //         ]);
        //     } else {
        //         $request->validate([
        //             'first_name' => 'required|min:3|max:25',
        //             'last_name' => 'max:25',
        //             'email' => 'required|unique:tbl_client|max:50|email',
        //             'username' => 'required|unique:tbl_client|max:50',
        //             'phone_no' => 'required|unique:tbl_client|max:20',
        //             'address' => 'required|max:200',
        //         ]);
        //     }

        // }






        // if ($request->email != $dataold->email) {
        //     $request->validate([
        //         'email' => 'required|unique:tbl_client|max:50|email',
        //     ]);
        // }

        // if ($request->username != $dataold->username) {
        //     $request->validate([
        //         'username' => 'required|unique:tbl_client|max:50',
        //     ]);
        // }

        // if ($request->phone_no != $dataold->phone_no) {
        //     $request->validate([
        //         'phone_no' => 'required|unique:tbl_client|max:20',
        //     ]);
        // }

        // if ($request->password != "") {
        //     $request->validate([
        //         'first_name' => 'required|min:3|max:25',
        //         'last_name' => 'max:25',
        //         'address' => 'required|max:200',
        //         'password' => 'min:6'
        //     ]);
        // } else {
        //     $request->validate([
        //         'first_name' => 'required|min:3|max:25',
        //         'last_name' => 'max:25',
        //         'address' => 'required|max:200',
        //     ]);
        // }
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
                    'email' => 'required|unique:tbl_client|max:50|email',
                    'address' => 'required|max:200',
                ]);
            } elseif ($dataold->email == $request->email && $dataold->phone_no == $request->phone_no) {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'username' => 'required|unique:tbl_client|max:50',
                    'address' => 'required|max:200',
                ]);
            } else if ($dataold->email == $request->email && $dataold->username == $request->username) {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'phone_no' => 'required|unique:tbl_client|max:20',
                    'address' => 'required|max:200',
                ]);
            } else {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'email' => 'required|unique:tbl_client|max:50|email',
                    'username' => 'required|unique:tbl_client|max:50',
                    'phone_no' => 'required|unique:tbl_client|max:20',
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
                    'email' => 'required|unique:tbl_client|max:50|email',
                    'address' => 'required|max:200',
                    'password' => 'min:6'
                ]);
            } elseif ($dataold->email == $request->email && $dataold->phone_no == $request->phone_no) {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'username' => 'required|unique:tbl_client|max:50',
                    'address' => 'required|max:200',
                    'password' => 'min:6'
                ]);
            } else if ($dataold->email == $request->email && $dataold->username == $request->username) {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'phone_no' => 'required|unique:tbl_client|max:20',
                    'address' => 'required|max:200',
                    'password' => 'min:6'
                ]);
            } else {
                $request->validate([
                    'first_name' => 'required|min:3|max:25',
                    'last_name' => 'max:25',
                    'email' => 'required|unique:tbl_client|max:50|email',
                    'username' => 'required|unique:tbl_client|max:50',
                    'phone_no' => 'required|unique:tbl_client|max:20',
                    'address' => 'required|max:200',
                    'password' => 'min:6'
                ]);
            }
        }


        $file_loc = public_path('/assets/img/client/profile-img');
        if (!empty($request->file_upload)) {

            $img_file = $request->file('file_upload');

            $client_name = preg_replace('/\s+/', '', $request->username);

            $img_client_name = $client_name . time() . '.' . $img_file->getClientOriginalExtension();
            $resize_foto_client = Image::make($img_file->getRealPath());
            $resize_foto_client->resize(320, 220)->save($file_loc . '/' . $img_client_name);

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
                Client::where('id_client', Auth::guard('client')->user()->id_client)
                    ->update([
                        'username' => $request->username,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'phone_no' => $request->phone_no,
                        'address' => $request->address,
                        'profile_image' => $img_client_name,
                        'password' => bcrypt($request->password),
                        'updated_at' => now(),
                        'email' => $request->email
                    ]);

                User::where('user_id', Auth::guard('client')->user()->id_client)->where('user_type', 'client')
                    ->update([
                        'email' => $request->email,
                        'name' => $request->username,
                        'password' => bcrypt($request->password),
                        'updated_at' => now(),
                        'avatar' => $avatar,
                        'messenger_color' => '#4CAF50'
                    ]);

            } else {
                Client::where('id_client', Auth::guard('client')->user()->id_client)
                    ->update([
                        'username' => $request->username,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'phone_no' => $request->phone_no,
                        'address' => $request->address,
                        'profile_image' => $img_client_name,
                        'updated_at' => now(),
                        'email' => $request->email
                    ]);
                User::where('user_id', Auth::guard('client')->user()->id_client)->where('user_type', 'client')
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
                Client::where('id_client', Auth::guard('client')->user()->id_client)
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
                User::where('user_id', Auth::guard('client')->user()->id_client)->where('user_type', 'client')
                    ->update([
                        'email' => $request->email,
                        'name' => $request->username,
                        'password' => bcrypt($request->password),
                        'updated_at' => now(),
                        'messenger_color' => '#4CAF50'
                    ]);
            } else {
                Client::where('id_client', Auth::guard('client')->user()->id_client)
                    ->update([
                        'username' => $request->username,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'phone_no' => $request->phone_no,
                        'address' => $request->address,
                        'updated_at' => now(),
                        'email' => $request->email
                    ]);

                User::where('user_id', Auth::guard('client')->user()->id_client)->where('user_type', 'client')
                    ->update([
                        'email' => $request->email,
                        'name' => $request->username,
                        'updated_at' => now(),
                        'messenger_color' => '#4CAF50'
                    ]);
            }
        }

        return redirect()->route('client.accountcenter')->with('Success', 'Your account information have been Updated');
    }
}