@extends('UserPages.master')
@section('title')
    Transparansi
@endsection
@section('content')
    <div class="container" style="margin-top: 8rem;">
      <div class="card card-body blur shadow-blur mx-3 mx-md-3">
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card p-3 shadow">
                    <div class="card-header">
                        <h5 class="text-center text-dark">Dokumen Transparansi Publik</h5>
                    </div>
                    <div class="card-body text-dark" style="max-height: 21rem; overflow-y:scroll">
                        <ol type="1">
                           @foreach ($data as $item)
                           <li>
                             <a class="text-info" href="{{ asset('/storage'.'/'.$item->file) }}" target="_blank" rel="noopener noreferrer"><u><li class="mb-2">{{ $item->nama }}</li></u></a>
                           </li>
                           @endforeach
                        </ol>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-4 mt-md-0">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ asset('img/contohAPBDES.JPG') }}" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('img/contohAPBDES.JPG') }}" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('img/contohAPBDES.JPG') }}" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        </div>
      </div>
    </div>
@endsection