@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
            
                <h1 class="mb-3">{!! $pedoman->judul !!}</h1>
                <p><b>{!! $pedoman->deskripsi !!}</b></p>
                <p>{!! $pedoman->detail !!}</p>
            </div>
        </div>
    </div>

@endsection