@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $pedoman->judul }}</h1>

                <a href="/dashboard/pedomans" class="btn btn-success"> <span data-feather="arrow-left"></span>
                Kembali ke halaman sebelumnya</a>
                <a href="/dashboard/pedomans/{{ $pedoman->slug }}/edit" class="btn btn-warning"> <span data-feather="edit"></span> Edit </a>
                <form action="/dashboard/pedomans/{{ $pedoman->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Data ini akan dihapus?')">
                <span data-feather="x-circle"></span> Hapus </button>
                </form>

        <p class="my-4"><b>{!! $pedoman->deskripsi  !!}</b></p>
        <p>{!! $pedoman->detail !!}</p>
      
        </div>
    </div>
</div>

@endsection