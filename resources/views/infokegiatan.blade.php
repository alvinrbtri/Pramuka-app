@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{!! $infokegiatan->judul !!}</h1>
                <p><b>{!! $infokegiatan->deskripsi !!}</b></p>
                <p>{!! $infokegiatan->informasi !!}</p>
            </div>
        </div>
    </div>

@endsection