@extends('layouts.main')

@section('container')
    <!-- image slide -->
    <style>
        .carousel-contain{
            color: black;
        }
    </style>
    <div class="container-fluid carousel-contain py-5">
        <div class="container">
            <h1 class="text-center mb-5">Coconut penggalang</h1>
            <div id="carouselExampleIndicators" class="carousel slide col-lg-8 offset-lg-2" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="img/slide1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Materi pramuka 1</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                      </div>
                  </div>
                  <div class="carousel-item">
                    <img src="img/slide2.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Materi pramuka 2</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                      </div>
                  </div>
                  <div class="carousel-item">
                    <img src="img/slide1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Materi pramuka 3</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                      </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
    </div>
@endsection