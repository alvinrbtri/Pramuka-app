<?php

namespace App\Http\Controllers;

use App\Models\InfoKegiatan;
use Illuminate\Http\Request;

class AdminInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.infokegiatans.index', [
            'infokegiatans' => InfoKegiatan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.infokegiatans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required',
            'deskripsi' => 'required',
            'informasi' => 'required'
        ]);

        InfoKegiatan::create($validatedData);

        return redirect('/dashboard/infokegiatans')->with('berhasil', 'Pedoman baru berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InfoKegiatan  $infoKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(InfoKegiatan $infoKegiatan)
    {
        echo $infoKegiatan;
        return false;
        $judul='';
        return view('dashboard.infokegiatans.show', [
            'judul'=> $judul,
            'active' => 'infokegiatan',
            'infokegiatan' => $infoKegiatan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfoKegiatan  $infoKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $info = InfoKegiatan::firstWhere('slug', $slug);
        // echo $info->informasi;
        // return false;
        return view('dashboard.infokegiatans.edit', [
            'infokegiatan' => $info
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InfoKegiatan  $infoKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoKegiatan $infoKegiatan)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required',
            'deskripsi' => 'required',
            'informasi' => 'required'
        ]);

        InfoKegiatan::where('id', $infoKegiatan->slug)
                ->update($validatedData);
        return redirect('/dashboard/infokegiatans')->with('berhasil', 'Informasi berhasil di updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfoKegiatan  $infoKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoKegiatan $infoKegiatan)
    {
        InfoKegiatan::destroy($infoKegiatan->id);

        return redirect('/dashboard/pedomans')->with('berhasil', 'Data pedoman berhasil di hapus ');
    }
}
