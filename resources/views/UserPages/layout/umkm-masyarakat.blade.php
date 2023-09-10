@extends('UserPages.master')
@section('title')
    UMKM Masyarakat
@endsection

@section('content')
    <div class="container" style="margin-top: 8rem;">
      <div class="card card-body blur shadow-blur mx-3 mx-md-4">
        <h4 class="text-center">UMKM Masyarakat Desa Sukaharja</h4>
        <hr class="my-4">
        <div class="row">
            @foreach ($umkm as $item)
            <div class="col-6 col-md-4 mb-3">
              <div class="card mx-auto" style="width: 18rem;">
                  <img src="{{ asset('/storage'.'/'.$item->logo) }}" style="max-width: 15rem;" class="card-img-top d-block mx-auto" alt="logo">
                  <div class="card-body">
                    <h5 class="card-title">{{ $item->nama_umkm }}</h5>
                    <p class="card-text">{{ $item->alamat }}</p>
                  </div>
                  <div class="card-body">
                    <a class="btn btn-info d-block" href="/umkm-masyarakat/{{ $item->id }}">Detail UMKM</a>
                  </div>
                </div>
          </div>
            @endforeach
        </div>
      </div>
    </div>
@endsection