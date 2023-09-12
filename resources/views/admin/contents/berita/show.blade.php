@extends('admin.master')
@section('pageTitle')
    {{ $berita->slug }}
@endsection
@section('content')
    <div class="card card-body blur shadow-blur mx-3 mx-md-4">
        <section class="pt-3 pb-4">
            <div class="container-fluid">
                    <img class="d-block mx-auto" style="width: 70%"  src="{{ '/storage'.'/'.$berita->gambar }}" alt="">
                    <br>
                    <h2 class="text-center my-2">{{ $berita->judul }}</h2>
                    <div class="container">
                        <p class="lead">{!! $berita->deskripsi !!}</p>
                    </div>
            </div>
        </section>
        <a href="/{{ auth()->user()->role }}/berita" style="width:70vw" class="btn btn-warning d-block mx-auto">Kembali</a>
    </div>
@endsection