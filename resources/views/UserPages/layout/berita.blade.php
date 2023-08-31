@extends('UserPages.master')
@section('title')
    {{ $slug }}
@endsection
@section('content')
    @foreach ($berita as $item)
    <div class="container-fluid">
            <img class="d-block mx-auto" style="width: 60%"  src="{{ '/storage'.'/'.$item->gambar }}" alt="">
            <br>
            <h5 class="text-center my-2">{{ $item->judul }}</h5>
            <hr>
            <div class="container">
                <p>{!! $item->deskripsi !!}</p>
            </div>
    </div>
    @endforeach
@endsection