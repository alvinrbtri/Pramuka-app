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
            'jenis' => 'required|max:255',
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
    public function edit($slug)
    {
        $var = JenisLatihan::firstWhere('slug',$slug);
        return view('dashboard.jenislatihans.edit', [
            'jenislatihans' => $var
        ]);
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
        $rules = [
            'jenis' => 'required|max:255',
            'slug' => 'required'
        ];

        if($request->slug != $jenisLatihan->slug) {
            $rules['slug'] = 'required';
        }

        $validatedData = $request->validate($rules);
        
        JenisLatihan::where('id', $request->valId)->update($validatedData);

        return redirect('/dashboard/jenislatihans')->with('berhasil', 'Jenis Latihan baru sudah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisLatihan  $jenisLatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        jenisLatihan::destroy($id);
        return redirect('/dashboard/jenislatihans')->with('berhasil', 'Fitur telah dihapus!');
    }
}
