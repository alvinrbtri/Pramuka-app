<?php

namespace App\Http\Controllers;
use App\Models\Pedoman;

use Illuminate\Http\Request;

class PedomanController extends Controller
{
    public function index()
    {
        return view('pedomans', [
            "judul" => "Pedomans",
            "active" => "pedomans",
            'pedomans' => Pedoman::all()
        ]);
    }

    public function show(Pedoman $pedoman)
    {
        return view('pedoman',[
            "judul" => "SKU",
            "active" => 'pedoman',
            "pedoman" => $pedoman
        ]);
    }
}
