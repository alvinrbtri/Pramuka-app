<?php

namespace App\Http\Controllers;

use App\Models\InfoKegiatan;
use Illuminate\Http\Request;

class InfoKegiatanController extends Controller
{
    public function index()
    {
        return view('infokegiatans', [
            "judul" => "Infokegiatans",
            "active" => "infokegiatans",
            'infokegiatans' => InfoKegiatan::all()
        ]);
    }

    public function show(InfoKegiatan $infokegiatan)
    {
        return view('infokegiatan',[
            "judul" => "Infokegiatan",
            "active" => 'infokegiatan',
            "infokegiatan" => $infokegiatan
        ]);
    }
}
