@extends('UserPages.master')
@section('title')
    {{ $slug }}
@endsection
@section('content')
    @foreach ($berita as $item)
    <div class="card card-body blur shadow-blur mx-3 mx-md-4" style="margin-top:8rem;">
        <section class="pt-3 pb-4">
            <div class="container-fluid">
                    <img class="d-block mx-auto" style="width: 70%"  src="{{ '/storage'.'/'.$item->gambar }}" alt="">
                    <br>
                    <h2 class="text-center my-2">{{ $item->judul }}</h2>
                    <div class="container">
                        <p class="lead">{!! $item->deskripsi !!}</p>
                    </div>
            </div>
        </section>
    </div>
    @endforeach
@endsection