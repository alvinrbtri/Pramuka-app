@extends('layouts.main')

@section('container')
    <!-- image slide -->
    <style>
        .carousel-contain{
            color: black;
        }
    </style>
        <div class="container">
          <br>
          <br>
          <img src="img/i.png" width="350" height="400" class="rounded float-end" alt="..."> 

          <h3>PRAMUKA <span style="color:brown;">PENGGALANG</span></h3>
          <p class="text-start">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Aliquid omnis dicta facilis,
           nostrum minus fuga veritatis? Dolores, <br> pariatur deserunt accusamus iusto, <br>  ullam qui facere, nobis quo natus perspiciatis quis officiis.</p>
           <button class="btn btn-dark">Mari Menjelajah</button>
           <br>
           <br>
           <br>
           <br>
           <img src="img/slide1.png" width="350" height="200" class="rounded float-start" alt="..."> 
           <h3 style="text-align: center">PRAMUKA <span style="color:brown;">PENGGALANG</span></h3>
           <p style="text-align: center">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Aliquid omnis dicta facilis,
            nostrum minus fuga veritatis? Dolores, <br> pariatur deserunt accusamus iusto, <br>  ullam qui facere, nobis quo natus perspiciatis quis officiis.</p>
            <br>
            <br>
            <br>
            <br>
            <h3 class="text-center">Fitur Utama</h3>
            <br>
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <div class="col">
                <div class="card" style="border-radius: 10px;box-shadow: -4px 10px 50px rgb(141, 141, 255); background-color:antiquewhite;">
                  <div class="card-body">
                    <h5 class="card-title">Praktis</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" style="border-radius: 10px;box-shadow: -4px 10px 50px rgb(141, 141, 255); background-color:antiquewhite;">
                  <div class="card-body">
                    <h5 class="card-title">Praktis</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" style="border-radius: 10px;box-shadow: -4px 10px 50px rgb(141, 141, 255); background-color:antiquewhite;">
                  <div class="card-body">
                    <h5 class="card-title">Praktis</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <br>
        <br>
            </div>
        </div>
    </div>
@endsection