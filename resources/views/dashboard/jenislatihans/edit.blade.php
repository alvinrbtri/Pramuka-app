@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Jenis Latihan</h1>
</div>  

<a href="/dashboard/jenislatihans" class="btn btn-success"> <span data-feather="arrow-left"></span>
    Kembali ke halaman sebelumnya</a>
    <form action="/dashboard/jenislatihans/{{ $jenislatihans->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Data ini akan dihapus?')">
          <span data-feather="x-circle"></span> Hapus </button>
    </form>

<div class="col-lg-8">
    <form method="post" action="{{ url('dashboard/jenislatihans/'.$jenislatihans->slug) }}" class="mb-5 mt-3" 
        enctype="multipart/form-data">
        @method('put')
            @csrf
            <div class="mb-3">
                <label for="jenis" class="form-label">jenis Latihan</label>
                <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" 
                name="jenis" required autofocus value="{{ old('jenis', $jenislatihans->jenis) }}">
                <input type="hidden" value="{{ $jenislatihans->id }}" name="valId">
                @error('jenis')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug Latihan</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" 
                name="slug" required value="{{ old('slug', $jenislatihans->slug) }}">
                @error('slug')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>

        <button type="submit" class="btn btn-primary">Tambah jenis latihan</button>
    </form>
</div>

@endsection