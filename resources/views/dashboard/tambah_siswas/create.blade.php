@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Siswa baru</h1>
</div> 

<div class="col-lg-8">
    <form method="post" action="/dashboard/tambah_siswas/store" class="mb-5" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="role" value="0">
        <div class="mb-3">
          <label for="nis" class="form-label">NIS</label>
          <input type="number" class="form-control @error('nis') is-invalid @enderror" id="nis" 
          name="nis" required autofocus value="{{ old('nis') }}">
          @error('nis')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="name" class="form-label">Nama Siswa</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
          name="name" required autofocus value="{{ old('name') }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" 
          name="username" required value="{{ old('username') }}">
          @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="role">
        
          <option >Perempuan</option>
          <option >Laki-laki</option>
  
        </select>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" 
          name="email" required value="{{ old('email') }}">
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="pangkalan" class="form-label">Pangkalan</label>
          <input type="text" class="form-control @error('pangkalan') is-invalid @enderror" id="pangkalan" 
          name="pangkalan" required value="{{ old('pangkalan') }}">
          @error('pangkalan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" 
          name="password" required value="{{ old('password') }}">
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Upload Gambar</label>
          <img class="img-preview img-fluid mb-3 col-sm-5">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" 
          name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Upload Tambah Siswa</button>
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

