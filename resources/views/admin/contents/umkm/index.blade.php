@extends('admin.master')
@section('pageTitle')
    umkm-desa
@endsection
@section('content')
<div class="card p-3">
    <h5 class="text-center">Data Pengajuan UMKM</h5>
    @if (auth()->user()->role == 'admin')
    <a href="/admin/umkm/create" class="btn btn-primary mb-3" style="width: 130px">Tambah Data<sup>+</sup></a>
    @endif
    <table id="umkm-table" class="table table-hover table-striped">
     @if (auth()->user()->role != 'kades')
     <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Pemilik</th>
            <th>Nama UMKM</th>
            <th>No WhatsApp</th>
            <th>Action</th>
        </tr>
    </thead>
     @else
     <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Pemilik</th>
            <th>Nama UMKM</th>
            <th>No WhatsApp</th>
        </tr>
    </thead>
     @endif
  </table>
</div>
<hr>
<div class="card p-3">
    <h5 class="text-center">Data UMKM</h5>
    <table id="umkm-validasi-table" class="table table-hover table-striped">
     @if (auth()->user()->role != 'kades')
     <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Pemilik</th>
            <th>Nama UMKM</th>
            <th>No WhatsApp</th>
            <th>Action</th>
        </tr>
    </thead>
     @else
     <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Pemilik</th>
            <th>Nama UMKM</th>
            <th>No WhatsApp</th>
        </tr>
    </thead>
     @endif
  </table>
</div>

@endsection
 @if (auth()->user()->role == 'admin')
 @push('js')
 <script>
  $(function (){
    let table = $('#umkm-table').DataTable({
        processing:true,
        serverSide:true,
        responsive:{
            details:{
                type:'column'
            }
        },
        columnDefs:[{
            className:'dtr-control',
            orderable:false,
            targets:0
        }],
        ajax:"{{ route('umkm.json') }}",
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'nik', name: 'nik'},
            {data: 'nama_pemilik', name: 'nama_pemilik'},
            {data: 'nama_umkm', name: 'nama_umkm'},
            {data: 'nohp', name: 'nohp'},
            {data: 'action', name: 'action'},
        ]
    });
});
  $(function (){
    let table = $('#umkm-validasi-table').DataTable({
        processing:true,
        serverSide:true,
        responsive:{
            details:{
                type:'column'
            }
        },
        columnDefs:[{
            className:'dtr-control',
            orderable:false,
            targets:0
        }],
        ajax:"{{ route('validasiUMKM.json') }}",
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'nik', name: 'nik'},
            {data: 'nama_pemilik', name: 'nama_pemilik'},
            {data: 'nama_umkm', name: 'nama_umkm'},
            {data: 'nohp', name: 'nohp'},
            {data: 'action', name: 'action'},
        ]
    });
});
 </script>
@endpush
 @elseif(auth()->user()->role == 'kades')
 @push('js')
 <script>
  $(function (){
    let table = $('#umkm-table').DataTable({
        processing:true,
        serverSide:true,
        responsive:{
            details:{
                type:'column'
            }
        },
        columnDefs:[{
            className:'dtr-control',
            orderable:false,
            targets:0
        }],
        ajax:"{{ route('kades.umkm.json') }}",
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'nik', name: 'nik'},
            {data: 'nama_pemilik', name: 'nama_pemilik'},
            {data: 'nama_umkm', name: 'nama_umkm'},
            {data: 'nohp', name: 'nohp'},
        ]
    });
});
  $(function (){
    let table = $('#umkm-validasi-table').DataTable({
        processing:true,
        serverSide:true,
        responsive:{
            details:{
                type:'column'
            }
        },
        columnDefs:[{
            className:'dtr-control',
            orderable:false,
            targets:0
        }],
        ajax:"{{ route('kades.validasiUMKM.json') }}",
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'nik', name: 'nik'},
            {data: 'nama_pemilik', name: 'nama_pemilik'},
            {data: 'nama_umkm', name: 'nama_umkm'},
            {data: 'nohp', name: 'nohp'},
        ]
    });
});
 </script>
@endpush
 @endif