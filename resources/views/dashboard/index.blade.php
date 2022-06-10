@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h5 class="text-center">Selamat Datang Di Halaman Dashboard Pramuka SMAN 1 Indramayu</h5>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4" >
    <div class="col">
      <div class="card">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
          <h5 class="card-title">Jumlah Pengguna</h5>
          <h2 class="card-text">2</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
          <h5 class="card-title">Jumlah Admin</h5>
          <h2 class="card-text">2</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
          <h5 class="card-title">Jumlah Materi</h5>
          <h2 class="card-text">2</p>
        </div>
      </div>
    </div>
  </div>
@endsection