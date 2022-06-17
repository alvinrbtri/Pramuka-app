<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle(Request $request, Closure $next)
    {
        $role = Auth::user()->role;
        switch ($role) {
            case '1':
                return redirect()->route( route: 'dashboard');
                break;
            case '2':
                return redirect()->route( route: 'dashboard');
                break;
            case '0':
                return redirect()->route( route: 'home');
                break;
            default:
                return redirect( to: "/");
                break;
        }
    }
}
