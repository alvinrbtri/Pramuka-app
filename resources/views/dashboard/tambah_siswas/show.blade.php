@extends('dashboard.layouts.main')

@section('container')
<br>
<div class="row">
    <div class="col-sm-4">
      <div class="card" style="background-color: blueviolet; width: 340px; height:250px">
        <div class="card-body">
            <img src="../../../../img/man.png" class="rounded mx-auto d-block" alt="..." height="100" width="100">
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="card">
        <div class="card-body">
            <form>
                <div class="mb-3">
                  <label for="nis" class="form-label">NIS</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" readonly value="2003018" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text"  readonly value="Alvi Nurbaetri" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Username</label>
                    <input type="text"  readonly value="alvi123" class="form-control" id="exampleInputPassword1">
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection