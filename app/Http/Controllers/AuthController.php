<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index() {
        $users = User::get();
        return response()-> json (['message' => 'tampil data success', 'data' => $users]);
    }

    public function login(Request $req)
    {
        // Validate Inputs
        $rules = [
            'role' => 'required',
            'email' => 'required',
            'password' => 'required|string',
        ];
        $req->validate($rules);
        // find user email and role in users table
        $user = User::where('email', $req->email)->where('role', $req->role)->first();
        // if user email found and password is correct
        if($user && Hash::check($req->password, $user->password)){
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response=['user'=> $user, 'token'=> $token];
            return response()->json($response, 200);
        }
        $response = ['message'=>'Incorrect role or email or password'];
        return response()->json($response, 400);
    }

    public function utama()
    {
        return view('dashboard.tambah_siswas.index',[
            'users'=>User::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.tambah_siswas.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'required'=> ':attribute tidak boleh kosong',
            'mimes'=>':attribute: harus :type :value'
        ];
        $rules = [
            'role' => 'required',
            'username' => 'required',
            'nis' => 'required',
            'name' => 'required',
            'jeniskelamin'=> 'required',
            'email' => 'required',
            'pangkalan' => 'required',
            'password' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg'
        ];

        $validatedData = $request->validate($rules,$messages);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['image']= $request->file('image')->store('user-image');
        User::create($validatedData);
        return redirect('/dashboard/tambah_siswas');
    }

    public function show(User $user){
        return view('dashboard.tambah_siswas.show', [
            'user'=> $user
        ]);
    }

    public function edit(User $user) 
    {
        return view('dashboard.tambah_siswas.edit', [
            'user' => $user,
            'roles' => User::all()
        ]);
    }

    public function update(Request $request, User $user){
        $messages = [
            'mimes'=>':attribute harus berupa :type :value',
            'required'=>':attribute harus diisi'
        ];
        $rules = [
            'role' => 'required',
            'username' => 'required',
            'nis' => 'required',
            'name' => 'required',
            'jeniskelamin' => 'required',
            'email' => 'required',
            'pangkalan' => 'required',
            'password' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg'
        ];
        $validatedData = $request->validate($rules,$messages);
        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('user-image');
        }
        if (Hash::check($request->password_lama,$user->password)) {
            $validatedData['password'] = Hash::make( $validatedData['password']);
    
            User::where('id', $user->id)
                    ->update($validatedData);
    
            return redirect('/dashboard/tambah_siswas')->with('berhasil', 'Materi berhasil di updated!');
        }
        return redirect()->back()->with('salah','password lama tidak sesuai');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/tambah_siswas')->with('berhasil', 'Fitur telah dihapus!');
    }
}
