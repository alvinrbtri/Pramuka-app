<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;

class MateriController extends Controller
{
    public function index()
    {
        $materi = MATERI::all();
        return response()->json(['message' => 'success','data'=>$materi]);
    }

    // public function show($id)
    // {
    //     $materi = MATERI::find($id);
    //     return response()->json(['message' => 'success','data' => $materi]);
    // }
}
