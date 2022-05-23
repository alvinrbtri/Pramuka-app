@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit pedoman</h1>
</div> 

<div class="col-lg-8">
    <form method="post" action="{{ route('pedomans.update',$pedoman) }}" class="mb-5">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul Pedoman</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" 
          name="judul" required autofocus value="{{ old('judul', $pedoman->judul) }}">
          @error('judul')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="slug" class="form-label">Slug Pedoman</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" 
          name="slug" required value="{{ old('slug', $pedoman->slug) }}">
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
          <textarea name="deskripsi" id="deskripsi" cols="30" rows="10">{{ old('deskripsi', $pedoman->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
          <label for="detail" class="form-label">detail</label>
          @error('detail')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <textarea name="detail" id="detail" cols="30" rows="10">{{ old('detail', $pedoman->detail) }}</textarea>
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

