<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Latihan;

class LatihanController extends Controller
{
    public function index() {
        return view('latihans',[
            "judul" => "Latihans",
            "active" => 'latihans',
            "latihans" => Latihan::latest()->filter(request(['cari', 'jenislatihan', 'author']))
            ->paginate(7)->withQueryString()
        ]);
    }

    public function show(Latihan $latihan)
    {
        return view('latihan',[
            "judul" => "Single Latihan",
            "active" => 'latihan',
            "latihan" => $latihan
        ]);
    }
}
