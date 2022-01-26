@extends('layouts.customer')

@section('main-content')

<div class="row row-cols-1 row-cols-md-3 g-2">
  <div class="col-sm-4">
    <div class="card shadow">
      <img class="card-img" src="{{asset('img/doc.jpg')}}">
      <div class="card-img-overlay">
        <div class="card-body text-center">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
            aria-expanded="false" aria-controls="collapseExample">
            <i class="bi bi-upload"></i> Upload
          </button>

        </div>
      </div>
      <div class="collapse" id="collapseExample">
        <div class="card-body">
          <div class="input-group">
            <label class="input-group-text bg-dark text-white" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
            <input type="file" class="form-control" id="inputGroupFile01">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card shadow">
      <img src="{{asset('img/store.jpg')}}" alt="" class="card-img">
      <div class="card-img-overlay">
        <div class="card-body text-center">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="{{route('presclist')}}" class="btn btn-primary">uploaded Prescriptions</a>
        </div>
      </div>
    </div>
  </div>
</div>












{{-- 
  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div> --}}



@endsection