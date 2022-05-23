@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center"> {{ $judul }} </h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/latihans">
      @if (request('jenislatihan'))
          <input type="hidden" name="jenislatihan" value="{{ request('jenislatihan') }}">
      @endif
      @if (request('author'))
          <input type="hidden" name="jenislatihan" value="{{ request('author') }}">
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari..." name="cari" value="{{ request('cari') }}">
        <button class="btn btn-primary" type="submit" >Cari</button>
      </div>
    </form>
  </div>
</div>

@if ($latihans->count())
    
<div class="card mb-3">
  @if ($latihans[0]->image)
            <div style="max-height: 400px; overflow:hidden">
                <img src="{{ asset('storage/' . $latihans[0]->image) }}" alt="{{ 
                    $latihans[0]->jenislatihan->judul }}" class="img-fluid">
            </div>
            @else
              <img src="https://source.unsplash.com/1200x400/?{{ $latihans[0]->jenislatihan->judul }}" 
              class="card-img-top" alt="{{ $latihans[0]->jenislatihan->judul }}">
  @endif

    <div class="card-body text-center">
      <h3 class="card-title"><a href="/latihans/{{ $latihans[0]->slug }}" 
        class="text-decoration-none text-dark ">{{ $latihans[0]->judul }}</a></h3>

        <p class="card-text">{{ $latihans[0]->deskripsi }}</p>

        <a href="/latihans/{{ $latihans[0]->slug }}" class="text-decoration-none btn btn-primary">Selanjutnya...</a>
      
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($latihans->skip(1) as $latih)

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute px-3 py-2" style="background-color: rgb(0, 0, 0, 0.8)">
                <a href="/latihans?jenislatihan={{ $latih->jenislatihan->slug }}" class="text-white text-decoration-none">
                {{ $latih->jenislatihan->jenis }}</a>
                </div>
                
                @if ($latih->image)
                      <img src="{{ asset('storage/' . $latih->image) }}" alt="{{ 
                        $latih->jenislatihan->jenis }}" class="img-fluid">
                @else
                      <img src="https://source.unsplash.com/1200x400/?{{ 
                      $latih->jenislatihan->jenis }}" alt="{{ $latih->jenislatihan->jenis }}" class="card-img-top" alt="{{ $latih->jenislatihan->name }}">
                @endif
                
                <div class="card-body">
                  <h5 class="card-title">{{ $latih->judul }}</h5>
        
                  <p class="card-text">{{ $latih->deskripsi }}</p>
                  <a href="/latihans/{{ $latih->slug }}" class="btn btn-primary">Selanjutnya...</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

@else
<p class="text-center fs-4">Tidak ada latihan.</p>
@endif

<div class="d-flex justify-content-center">
{{ $latihans->links() }}
</div>

@endsection