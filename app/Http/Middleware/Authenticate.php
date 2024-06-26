<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)
    {
        $uri = $request->path();

        if ($request->is('client*')) {
            if (Auth::guard('client')->check()) {
                return redirect('/');
            }
        } else if ($request->is('servicer*')) {
            if (Auth::guard('servicer')->check()) {
                return redirect('/servicer/dashboard');
            }
        }
    }
}