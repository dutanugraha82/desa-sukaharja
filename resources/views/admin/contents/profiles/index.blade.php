@extends('admin.master')
@section('pageTitle')
 daftar-warga
@endsection
@section('content')
<div class="card p-3">
    <h5>Data Warga Desa</h5>
    <a href="/admin/profiles/create" class="btn btn-primary my-4" style="width: 150px">Tambah Data <sup>+</sup></a>
    <table id="warga-table" class="table table-hover table-striped">
      <thead>
          <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Warga</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Pendidikan</th>
              <th scope="col">Agama</th>
              <th scope="col">Pekerjaan</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
  </table>
</div>
@endsection
@push('js')
    <script>
        $(function (){
        let table = $('#warga-table').DataTable({
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
            ajax:"{{ route('warga.json') }}",
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'nama', name: 'nama'},
                {data: 'jk', name: 'jk'},
                {data: 'pendidikan', name: 'pendidikan'},
                {data: 'agama', name: 'agama'},
                {data: 'jenis_pekerjaan', name: 'jenis_pekerjaan'},
                {data: 'status_perkawinan', name: 'status_perkawinan'},
                {data: 'action', name: 'action'},
            ]
        });
    });
    </script>
@endpush