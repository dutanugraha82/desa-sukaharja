@extends('admin.master')
@section('pageTitle')
    Pengaturan Akun
@endsection
@section('content')
<div class="container-fluid">
    <form action="/{{ auth()->user()->role }}/akun/{{ auth()->user()->id }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="{{ $akun->username }}" required>
        </div>
        <div class="mb-3">
            <label for="username">Password Baru</label>
            <input type="text" class="form-control" name="password">
        </div>
        <a href="/{{ auth()->user()->role }}" class="btn btn-warning">Kembali</a>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin ingin sunting akun?')">Sunting Akun</button>
    </form>
</div>
@endsection