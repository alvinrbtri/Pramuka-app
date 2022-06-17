@extends('dashboard.layouts.main')

@section('container')
<br>
<div class="row">
    <div class="col-sm-8 mx-auto">
      <div class="card">
        <img src="{{ asset('storage/'.$user->image) }}" class="rounded-circle mx-auto d-block " height="160" width="160">
        <div class="card-body">
            <form>
                <div class="mb-3">
                  <label for="nis" class="form-label">NIS</label>
                  <input type="text" class="form-control" id="nis" value={{ $user->nis }}>
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="name" value={{ $user->name }}>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" value={{ $user->username }}>
                </div>
                <div class="mb-3">
                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="jeniskelamin" value={{ $user->jeniskelamin }}>
                </div>
                <div class="mb-3">
                    <label for="pangkalan" class="form-label">Pangkalan</label>
                    <input type="text" class="form-control" id="pangkalan" value={{ $user->pangkalan }}>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" value={{ $user->email }}>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection