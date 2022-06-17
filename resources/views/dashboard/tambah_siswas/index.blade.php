@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Siswa</h1>
</div>    

@if (session()->has('berhasil'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('berhasil') }}
</div>
@endif

<div class="table-responsive col-lg-8">

  <a href="/dashboard/tambah_siswas/create" class="btn btn-primary mb-3">Tambah Siswa</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Role</th>
          <th scope="col">NIS</th>
          <th scope="col">Name</th>
          <th scope="col">Username</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        
          @foreach ($users as $user)
           <tr>
             <td>{{ $loop->iteration }}</td>
             <td>
              @if ( $user->role == 0)
              user
              @elseif ($user->role == 1)
              superadmin
              @elseif ($user->role == 2)
              admin
              @endif 
             </td>
             <td>{{ $user->nis }}</td>
             <td>{{ $user->name }}</td>
             <td>{{ $user->username }}</td>
             <td>
              <a href="/dashboard/tambah_siswas/show/{{ $user->nis }}" class="badge 
                btn-info"><span data-feather="eye"></span></a>

              <a href="/dashboard/tambah_siswas/edit/{{ $user->nis }}" class="badge btn-warning"><span data-feather="edit"></span></a>

              <form action="/dashboard/tambah_siswas/delete/{{ $user->nis }}" method="post" class="d-inline">
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