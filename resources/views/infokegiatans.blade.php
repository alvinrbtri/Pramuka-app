@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row">
    @foreach ($infokegiatans as $informasi)  
    <div class="col-lg-4 mt-3">
        <div class="card bg-dark text-white">
            <img src="https://source.unsplash.com/300x200/?{{ $informasi->deskripsi }}" 
            class="card-img" alt="...">
            {{-- <div class="card-img-overlay d-flex align-items-center p-0">
                <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.8)">{{ $informasi->judul }}</h5>
            </div> --}}
            <div class="card-body">
                <h5 class="card-title">{{ $informasi->judul }}</h5>
                <p class="card-text">{{ $informasi->deskripsi }}</p>
                {{-- <a href="/infokegiatans/{{ $informasi->slug }}">Klik untuk lebih jelas</a> --}}
                <a href="/infokegiatans/{{ $informasi->slug }}" class="d-block mt-3 text-decoration-none text-light d-inline-flex p-2 rounded" 
                    type="button" style="background-color: brown" >Klik untuk detail</a>
              </div>
        </div>
    </div>
    @endforeach
    </div>
</div>
@endsection