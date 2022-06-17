@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-4">

      @if (session()->has('berhasil'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('berhasil') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
            <form action="/masuk" method="post">
              @csrf
              <img class="mb-4 mx-auto d-block" src="img/pao2.png" alt="" width="200" height="150">
          
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" 
                placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" 
                placeholder="Password" required>
                <label for="password">Password</label>
              </div>
 
              {{-- <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button> --}}
              <button class="w-100 btn btn-lg btn-primary text-decoration-none text-light  p-2 rounded" 
                type="submit" style="background-color: brown" > Masuk
              </button>
            </form>
            <small class="d-block text-center mt-3 " > Belum Registrasi? <a href="/register" style="text-decoration: none;"> 
                Registrasi sekarang!!</a></small>
        </main>
    </div>
</div>


@endsection