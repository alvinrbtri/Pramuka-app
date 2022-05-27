<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function store (Request $request)
    {
        // dd($request);
        // $validatedData = $request -> validate([
        //     'name' => 'required|max:255',
        //     'username' => ['required', 'max:255', 'min:5', 'unique:users'],
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|max:255|min:5'
        // ]);

        // $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($request->all());

        return response()->json("register berhasil");
    }
}
