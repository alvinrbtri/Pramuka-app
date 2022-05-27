<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        //validate inputs
        // $rules = [
        //     'username' => 'required|string',
        //     'password' => 'required|string'
        // ];

        // $req->validate($rules);
        // //find user email in user table
        // $user = User::where('username', $req->username)->first();
        // //if user email found and password is correct
        // if($user) {
        //     $token = $user->createToken('personal access token')->plainTextToken;
        //     $response = ['user' => $user, 'token' => $token];
        //     return response()->json($response, 200);
        // }
        // $response = ['message' => 'incorrect email or password'];
        // return response()->json($response, 400);
        $this->validate($req, [
            "username" => "required",
            "password" => "required" 
        ]);

        $user = User::where("username", $req->username)->first();

        if (!$user) {
            return response()->json(['message' => 'Login failed!'], 401);
        }

        $token = bin2hex(random_bytes(40));

        $user->update([
            'token' => $token
        ]);

        return response()->json($user);
    }
}
