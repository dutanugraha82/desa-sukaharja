@extends('UserPages.master')
@section('title')
    prestasi-desa
@endsection
@section('content')
    <div class="container-fluid card p-3" style="margin-top: 8rem;">
        @foreach ($prestasi as $item)
        <div class="card mx-auto shadow-lg mb-5" style="max-width: 90vw;;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('/storage'.'/'.$item->foto) }}" class="img-fluid rounded-start" alt="foto-prestasi">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->judul }}</h5>
                  <p class="card-text" style="text-align: justify">{{ $item->deskripsi }}</p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
    </div>
@endsection