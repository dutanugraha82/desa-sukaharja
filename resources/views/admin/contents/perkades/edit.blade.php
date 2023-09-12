@extends('admin.master')
@section('pageTitle')
    edit perkades
@endsection
@section('content')
    <div class="container-fluid" style="height: 100vh">
        <div class="card p-3" style="height: 100%">
            <h5 class="text-center">Edit Data</h5>
            @foreach ($data as $item)
            <form action="/admin/perkades/{{ $item->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="">Nama File</label>
                <input type="text" class="form-control" name="nama" value="{{ $item->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="">File Baru</label>
                <input type="file" class="form-control" name="newFile">
                <input type="hidden" class="form-control" name="oldFile" value="{{ $item->file }}">
            </div>
            <div class="my-4 d-flex">
                <a href="/admin/perkades" class="btn btn-warning mr-3" style="width: 150px;">Kembali</a>
                <button type="submit" class="btn btn-primary" style="width: 150px;" onclick="return confirm('Ingin merubah data {{ $item->nama }} ?')">Update Data</button>
            </div>
            <div class="my-4">
                <label for="">File Sekarang</label>
                <iframe style="width: 80%; height: 80vh" class="d-block mx-auto" src="{{ asset('/storage'.'/'.$item->file) }}" frameborder="0"></iframe>
            </div>
            </form>
            @endforeach
        </div>
    </div>
@endsection