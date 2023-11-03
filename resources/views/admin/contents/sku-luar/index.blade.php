@extends('admin.master')
@section('pageTitle')
    sku-luar
@endsection
@section('content')
<div class="card p-3">
    <h5>Data Surat SKU LUAR Masuk</h5>
    <table id="sku-luar-table" class="table table-hover table-striped">
      <thead>
          <tr>
              <th scope="col"></th>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Jenis Usaha</th>
              <th scope="col">Penghasilan</th>
              <th scope="col">Tahun</th>
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
    let table = $('#sku-luar-table').DataTable({
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
        ajax:"{{ route('admin.sku-luar') }}",
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'jenis_usaha', name: 'jenis_usaha'},
            {data: 'penghasilan', name: 'penghasilan'},
            {data: 'tahun_berdiri', name: 'tahun_berdiri'},
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
    let table = $('#sku-luar-table').DataTable({
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
        ajax:"{{ route('pelayanan.sku-luar') }}",
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'jenis_usaha', name: 'jenis_usaha'},
            {data: 'penghasilan', name: 'penghasilan'},
            {data: 'tahun_berdiri', name: 'tahun_berdiri'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action'},
        ]
    });
});
</script>
@endpush
@endif