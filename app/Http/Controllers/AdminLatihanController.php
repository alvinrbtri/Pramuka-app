<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Latihan;
use App\Models\JenisLatihan;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class AdminLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.latihans.index', [
            'latihans' => Latihan::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.latihans.create', [
            'jenislatihans' => JenisLatihan::all()
        ]);
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
            'jenislatihan_id' => 'required',
            'image' => 'image|file|max:1024',
            'deskripsi' => 'required',
            'soal' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('latihan-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['deskripsi'] = Str::limit(strip_tags($request->body), 250);

        Latihan::create($validatedData);

        return redirect('/dashboard/latihans')->with('berhasil', 'Latihan berhasil di upload!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Latihan $latihan)
    {
        return view('dashboard.latihans.show', [
            'judul' => 'latihan',
            'active' => 'latihan',
            'latihan' => $latihan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Latihan $latihan)
    {
        return view('dashboard.latihans.edit', [
            'latihan' => $latihan,
            'jenislatihans' => JenisLatihan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Latihan $latihan)
    {
        $rules = [
            'judul' => 'required|max:255',
            'jenislatihan_id' => 'required',
            'image' => 'image|file|max:1024',
            'soal' => 'required'
        ];

        if($request->slug != $latihan->slug) {
            $rules['slug'] = 'required|unique:latihans';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('latihan-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['deskripsi'] = Str::limit(strip_tags($request->body), 250);

        Latihan::where('id', $latihan->id)
                ->update($validatedData);

        return redirect('/dashboard/latihans')->with('berhasil', 'Latihan berhasil di updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Latihan $latihan)
    {
        if($latihan->image) {
            Storage::delete($latihan->image);
        }
        latihan::destroy($latihan->id);
        return redirect('/dashboard/latihans')->with('berhasil', 'Latihan berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

}
