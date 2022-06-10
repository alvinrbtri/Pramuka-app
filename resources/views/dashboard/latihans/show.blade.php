@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">

                <h1 class="mb-3">{{ $latihan->judul }}</h1>

                <a href="/dashboard/latihans" class="btn btn-success"> <span data-feather="arrow-left"></span>
                    Kembali ke halaman sebelumnya</a>
                <a href="/dashboard/latihans/{{ $latihan->slug }}/edit" class="btn btn-warning"> <span data-feather="edit"></span> Edit </a>
                    <form action="/dashboard/latihans/{{ $latihan->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Data ini akan dihapus?')">
                          <span data-feather="x-circle"></span> Hapus </button>
                    </form>

                @if ($latihan->image)
                <div style="max-height: 300px; weight: 400px; overflow:hidden" class=" img-fluid mt-3">
                    <img src="{{ asset('storage/' . $latihan->image) }}" alt="{{ 
                        $latihan->jenislatihan->name }}" class="img-fluid">
                </div>
                @endif

                <article class="my-3">
                    {!! $latihan->soal !!}
                </article>   
                
            </div>
        </div>
    </div>

@endsection