@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pedoman</h1>
</div>

@if (session()->has('berhasil'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('berhasil') }}
</div>
@endif

<div class="table-responsive col-lg-12">
    <a href="/dashboard/infokegiatans/create" class="btn btn-primary mb-3">Informasi Kegiatan baru</a>
      <table class="table table-stripped table-sm" style="strip-color: #795548">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Informasi</th>
          </tr>
        </thead>
        <tbody>
             @foreach ($infokegiatans as $info) 
             <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $info->judul }}</td>
               <td>{!! $info->deskripsi !!}</td>
               {{-- <td>{{ $pdmn->detail}}</td> --}} 
               <td>
                <a href="/dashboard/infokegiatans/{{ $info->slug }}" class="badge 
                  btn-info"><span data-feather="eye"></span></a>
  
                <a href="{{ route('infokegiatans.edit',$info->slug) }}" class="badge btn-warning"><span data-feather="edit"></span></a>
  
                <form action="/dashboard/infokegiatans/{{ $info->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Data ini akan dihapus?')">
                    <span data-feather="x-circle"></button>
                </form>
  
               </td>
             </tr>
             @endforeach
        </tbody>
      </table>
  </div>
@endsection