@extends('admin.master')
@section('pageTitle')
    domisili-dalam
@endsection
@section('content')
<div class="card p-3">
    <h5>Data Surat Domisili Dalam Masuk</h5>
    <table id="domisiliDalam" class="table table-hover table-striped">
      <thead>
          <tr>
              <th scope="col"></th>
              <th scope="col">No</th>
              <th scope="col">Nama Pengaju</th>
              <th scope="col">Jenis Kelamin</th>
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
    let table = $('#domisiliDalam').DataTable({
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
        ajax:"{{ route('admin.suratDomisiliDalam') }}",
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'jk', name: 'jk'},
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
    let table = $('#domisiliDalam').DataTable({
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
        ajax:"{{ route('pelayanan.suratDomisiliDalam') }}",
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'jk', name: 'jk'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action'},
        ]
    });
});
</script>
@endpush
@endif