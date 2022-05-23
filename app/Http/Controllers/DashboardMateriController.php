<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Materi;
use App\Models\Kategori;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.materis.index', [
            'materis' => Materi::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.materis.create', [
            'kategories' => Kategori::all()
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
            'kategori_id' => 'required',
            'image' => 'image|file|max:1024|mimes:png,jpeg,jpg',
            'file' => 'file|mimes:docx,pdf,xlsx,zip|max:5000',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('materi-images');
        }

        if($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('files');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 250);

        Materi::create($validatedData);

        return redirect('/dashboard/materis')->with('berhasil', 'Materi berhasil di upload!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        return view('dashboard.materis.show', [
            'materi' => $materi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        return view('dashboard.materis.edit', [
            'materi' => $materi,
            'kategories' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        $rules = [
            'judul' => 'required|max:255',
            'kategori_id' => 'required',
            'image' => 'image|file|max:1024|mimes:png,jpeg,jpg',
            'file' => 'file|mimes:docx,pdf,xlsx,zip|max:5000',

            'body' => 'required'
        ];

        if($request->slug != $materi->slug) {
            $rules['slug'] = 'required|unique:materis';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('materi-images');
        }

        if($request->file('file')) {
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validatedData['file'] = $request->file('file')->store('files');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 250);

        Materi::where('id', $materi->id)
                ->update($validatedData);

        return redirect('/dashboard/materis')->with('berhasil', 'Materi berhasil di updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        if($materi->image) {
            Storage::delete($materi->image);
        }
        Materi::destroy($materi->id);
        return redirect('/dashboard/materis')->with('berhasil', 'Materi berhasil dihapus!');

        if($materi->file) {
            Storage::delete($materi->file);
        }
        Materi::destroy($materi->id);
        return redirect('/dashboard/materis')->with('berhasil', 'Materi berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

}
