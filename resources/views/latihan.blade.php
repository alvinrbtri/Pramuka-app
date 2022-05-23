@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">

                <h1 class="mb-3">{{ $latihan->judul }}</h1>

                @if ($latihan->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/' . $latihan->image) }}" alt="{{ 
                        $latihan->jenislatihan->name }}" class="img-fluid">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ 
                    $latihan->jenislatihan->name }}" alt="{{ $latihan->jenislatihan->name }}" class="img-fluid">
                @endif

                <article class="my-3">
                    {!! $latihan->deskripsi !!}
                </article>
        
                <a href="/latihans" class="d-block mt-3">Kembali ke halaman sebelumnya</a>
                
            </div>
        </div>
    </div>

@endsection