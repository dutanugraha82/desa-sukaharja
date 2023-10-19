@extends('admin.master')
@section('pageTitle')
    surat-penghasilan-orang-tua
@endsection
@section('content')
<div class="card p-3">
    <h5>Data Surat Penghasilan Orang Tua Masuk</h5>
    <table id="suratPenghasilanOrtu" class="table table-hover table-striped">
      <thead>
          <tr>
              <th scope="col"></th>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Pekerjaan</th>
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
        let table = $('#suratPenghasilanOrtu').DataTable({
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
            ajax:"{{ route('admin.suratPenghasilanOrtu') }}",
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'DT_RowIndex'},
                {data: 'nama', name: 'nama'},
                {data: 'jk', name: 'jk'},
                {data: 'pekerjaan', name: 'pekerjaan'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action'},
            ]
        });
    });
    </script>
@endpush