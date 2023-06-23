<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientRegisterController extends Controller
{
    Public function index()
    {
        return view('client.register.index');
    }
}
