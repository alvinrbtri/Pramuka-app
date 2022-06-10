@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Latihan baru</h1>
</div> 

<div class="col-lg-8">
    <form method="post" action="/dashboard/latihans" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul Latihan</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" 
          name="judul" required autofocus value="{{ old('judul') }}">
          @error('judul')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="slug" class="form-label">Slug Latihan</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" 
          name="slug" required value="{{ old('slug') }}">
          @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="jenislatihan" class="form-label">Jenis Latihan</label>
          <select class="form-select" name="jenislatihan_id">
            @foreach ($jenislatihans as $jenislatihan)
            @if (old('jenislatihan_id') == $jenislatihan->id)
             <option value="{{ $jenislatihan->id }}" selected>{{ $jenislatihan->jenis }}</option>
            @else
             <option value="{{ $jenislatihan->id }}">{{ $jenislatihan->jenis }}</option>
            @endif
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="soal" class="form-label">soal</label>
          @error('soal')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <textarea name="soal" id="soal" cols="30" rows="10">{{ old('soal') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Upload Latihan</button>
      </form>
</div>

<script>
  const judul = document.queryselector('#judul');
  const slug = document.queryselector('#slug');

  judul.addEventListener('change', function() {
    fetch('/dashboard/latihans/checkSlug?judul=' + judul.value)
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

