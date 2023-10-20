@extends('admin.master')
@section('pageTitle')
    sku-dalam
@endsection
@section('content')
<div class="card p-3">
    <h5>Data Surat SKU Dalam Masuk</h5>
    <table id="sku-dalam-table" class="table table-hover table-striped">
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
@push('js')
    <script>
        $(function (){
        let table = $('#sku-dalam-table').DataTable({
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
            ajax:"{{ route('sku-dalam.json') }}",
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'DT_RowIndex'},
                {data: 'nama', name: 'nama'},
                {data: 'jenis_usaha', name: 'jenis_usaha'},
                {data: 'penghasilan', name: 'penghasilan'},
                {data: 'tahun', name: 'tahun'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action'},
            ]
        });
    });
    </script>
@endpush