@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Jenis Latihan</h1>
</div>  

<div class="col-lg-8">
    <form method="post" action="/dashboard/jenislatihans">
        @csrf
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Latihan</label>
            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" 
            name="jenis" required value="{{ old('jenis') }}">
            @error('jenis')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug Latihan</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" 
            name="slug" required value="{{ old('slug') }}">
            @error('slug')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah jenislatihan</button>
    </form>
</div>

@endsection