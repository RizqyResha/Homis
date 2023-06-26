<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ClientHomeController extends Controller
{
    public function index()
    {
        $topcategory = ServiceCategory::all()->take(6);

        return view('client.home.index', [
            'topcategory' => $topcategory,
        ]);
    }
}