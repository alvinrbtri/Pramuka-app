<?php

namespace App\Http\Controllers;

use App\Models\JenisLatihan;
use Illuminate\Http\Request;

class AdminJenisLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jenislatihans.index', [
            'jenislatihans' => JenisLatihan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jenislatihans.create');
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
            'name' => 'required|max:255',
            'slug' => 'required'
        ]);

        JenisLatihan::create($validatedData);

        return redirect('/dashboard/jenislatihans')->with('berhasil', 'Fitur baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisLatihan  $jenisLatihan
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisLatihan  $jenisLatihan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisLatihan $jenisLatihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisLatihan  $jenisLatihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisLatihan $jenisLatihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisLatihan  $jenisLatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisLatihan $jenisLatihan)
    {
        JenisLatihan::destroy($jenisLatihan->id);
        return redirect('/dashboard/jenislatihans')->with('berhasil', 'Fitur telah dihapus!');
    }
}
