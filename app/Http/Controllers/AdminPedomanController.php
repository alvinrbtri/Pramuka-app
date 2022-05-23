<?php

namespace App\Http\Controllers;

use App\Models\Pedoman;
use Illuminate\Http\Request;

class AdminPedomanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pedomans.index', [
            'pedomans' => Pedoman::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pedomans.create');
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
            'detail' => 'required'
        ]);

        Pedoman::create($validatedData);

        return redirect('/dashboard/pedomans')->with('berhasil', 'Pedoman baru berhasil di tambahakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedoman  $pedoman
     * @return \Illuminate\Http\Response
     */
    public function show(Pedoman $pedoman)
    {
        // return view('dashboard.pedomans.show', [
        //     'pedoman' => $pedoman
        // ]);
        $judul='';
        return view('dashboard.pedomans.show', [
            'judul'=> $judul,
            'active' => 'pedoman',
            'pedoman' => $pedoman
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedoman  $pedoman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedoman $pedoman)
    {
        return view('dashboard.pedomans.edit', [
            'pedoman' => $pedoman
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedoman  $pedoman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedoman $pedoman)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required',
            'deskripsi' => 'required',
            'detail' => 'required'
        ]);

        Pedoman::where('id', $pedoman->id)
                ->update($validatedData);
        return redirect('/dashboard/pedomans')->with('berhasil', 'Materi berhasil di updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedoman  $pedoman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedoman $pedoman)
    {
        Pedoman::destroy($pedoman->id);

        return redirect('/dashboard/pedomans')->with('berhasil', 'Data pedoman berhasil di hapus ');
    }
}
