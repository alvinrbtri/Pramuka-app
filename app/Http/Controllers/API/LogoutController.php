<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LogoutController extends Controller
{
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'you have successfully logged out'
        ];
    }
}
