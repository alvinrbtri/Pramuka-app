@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Siswa</h1>
</div> 

<div class="col-lg-8">
    <form method="POST" action="/dashboard/tambah_siswas/update/{{ $user->nis }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="role">
          
            @if ( $user->role==0 )
            <option value="0" selected> User </option>
            @elseif ( $user->role==1 )
            <option value="1" selected> Super Admin </option>
            @elseif ( $user->role==2 )
            <option value="2" selected> Admin </option>
            @endif
          
          <option value="0">User</option>
          <option value="1">Super Admin</option>
          <option value="2">Admin</option>
        </select>
        <div class="mb-5">
          <label for="nis" class="form-label">NIS</label>
          <input type="number" class="form-control @error('nis') is-invalid @enderror" id="nis" 
          name="nis" required autofocus value="{{ old('nis', $user->nis) }}">
          @error('nis')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="name" class="form-label">Nama Siswa</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
          name="name" required autofocus value="{{ old('name', $user->name) }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" 
          name="username" required value="{{ old('username', $user->username) }}">
          @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" 
          name="email" required value="{{ old('email', $user->email) }}">
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="kelas" class="form-label">Kelas</label>
          <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" 
          name="kelas" required value="{{ old('kelas', $user->kelas) }}">
          @error('kelas')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        
        <div class="mb-3">
          @if (Session::has('salah'))
          <div class="invalid-feedback alert">
            {{ session('salah') }}
          </div>
          @endif
          <label for="password_lama" class="form-label">Password lama</label>
          <input type="password" class="form-control @error('password_lama') is-invalid @enderror" id="password_lama" 
          name="password_lama" required>
          {{-- @error('password_lama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror --}}
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" 
          name="password" required value="123">
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <input type="hidden" name="oldImage" value="{{ $user->image }}">
        <div class="mb-3">
            <img src="{{ asset('storage/' . $user->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
          <label for="image" class="form-label">Upload Gambar</label>
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" 
          name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Tambah Siswa</button>
      </form>
</div>

<script>
  const judul = document.queryselector('#judul');
  const slug = document.queryselector('#slug');

  judul.addEventListener('change', function() {
    fetch('/dashboard/materis/checkSlug?judul=' + judul.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

  function previewImage() {
    const image = document.queryselector('#image');
    const imgPreview = document.queryselector('.img-preview');

    imgPreview.styp.display = 'block'; 

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection

