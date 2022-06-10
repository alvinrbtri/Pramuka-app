@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Informasi</h1>
</div> 

<div class="col-lg-8">
    <form method="post" action="{{ route('infokegiatans.update',$infokegiatan->id) }}" class="mb-5">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Informasi</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" 
          name="judul" required autofocus value="{{ old('judul', $infokegiatan->judul) }}">
          @error('judul')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="slug" class="form-label">Slug Informasi</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" 
          name="slug" required value="{{ old('slug', $infokegiatan->slug) }}">
          @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="deskripsi" class="form-label">deskripsi</label>
          @error('deskripsi')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <textarea name="deskripsi" id="deskripsi" cols="30" rows="10">{{ old('deskripsi', $infokegiatan->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
          <label for="informasi" class="form-label">Informasi</label>
          @error('informasi')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <textarea name="informasi" id="informasi" cols="30" rows="10">{{ old('informasi', $infokegiatan->informasi) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Pedoman</button>
      </form>
</div>

<script>
  const judul = document.queryselector('#judul');
  const slug = document.queryselector('#slug');

  judul.addEventListener('change', function() {
    fetch('/dashboard/pedomans/checkSlug?judul=' + judul.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

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

