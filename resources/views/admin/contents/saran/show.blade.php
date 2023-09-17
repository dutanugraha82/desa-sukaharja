@extends('admin.master')
@section('pageTitle')
    saran-desa
@endsection
@section('content')
<div class="card p-3">
   <div class="container">
    <div class="mb-3">
        <p>Nama : {{ $data->nama }}</p>
    </div>
    <div class="mb-3">
        <p>NIK : {{ Crypt::decrypt($data->nik) }}</p>
    </div>
    <div class="mb-3">
        <p>No HP : {{ $data->nohp }}</p>
    </div>
    <div class="mb-3">
        <p>Saran dan Masukan :</p>
        <p style="text-align: justify">{{ $data->saran }}</p>
    </div>
   </div>
</div>
@endsection
 