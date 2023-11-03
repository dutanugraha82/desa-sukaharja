@extends('admin.master')
@section('pageTitle')
    surat-ktm
@endsection
@section('content')
<div class="card p-3">
    <h5>Data Surat KTM Masuk</h5>
    <table id="ktm-table" class="table table-hover table-striped">
      <thead>
          <tr>
              <th scope="col"></th>
              <th scope="col">No</th>
              <th scope="col">Nama Pengaju</th>
              <th scope="col">Nama Anak</th>
              <th scope="col">Tujuan Sekolah</th>
              <th scope="col">Tanggal Diajukan</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
  </table>
</div>
@endsection
@if (auth()->user()->role == 'admin')
@push('js')
<script>
    $(function (){
    let table = $('#ktm-table').DataTable({
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
        ajax:"{{ route('ktm.json') }}",
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'DT_RowIndex'},
            {data: 'nama_ortu', name: 'nama_ortu'},
            {data: 'nama_anak', name: 'nama_anak'},
            {data: 'sekolah', name: 'sekolah'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action'},
        ]
    });
});
</script>
@endpush
@elseif(auth()->user()->role == 'pelayanan')
@push('js')
<script>
    $(function (){
    let table = $('#ktm-table').DataTable({
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
        ajax:"{{ route('pelayanan.ktm.json') }}",
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'DT_RowIndex'},
            {data: 'nama_ortu', name: 'nama_ortu'},
            {data: 'nama_anak', name: 'nama_anak'},
            {data: 'sekolah', name: 'sekolah'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action'},
        ]
    });
});
</script>
@endpush
@endif