@extends('admin.master')
@section('pageTitle')
    kartu-keluarga
@endsection
@section('content')
<div class="card p-3">
    <h5>Data Kartu Keluarga</h5>
    <a href="/admin/kk/create" class="btn btn-primary my-4" style="width: 150px">Tambah Data <sup>+</sup></a>
    <table id="kk_table" class="table table-hover table-striped">
      <thead>
          <tr>
              <th scope="col">No</th>
              <th scope="col">No KK</th>
              <th scope="col">Nama Kepala Keluarga</th>
              <th scope="col">Alamat</th>
              <th scope="col">Rt</th>
              <th scope="col">Rw</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
  </table>
</div>
@endsection
@push('js')
    <script>
        $(function (){
        let table = $('#kk_table').DataTable({
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
            ajax:"{{ route('kk.json') }}",
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'no_kk', name: 'no_kk'},
                {data: 'nama_kepala_keluarga', name: 'nama_kepala_keluarga'},
                {data: 'alamat', name: 'alamat'},
                {data: 'rt', name: 'rt'},
                {data: 'rw', name: 'rw'},
                {data: 'action', name: 'action'},
            ]
        });
    });
    </script>
@endpush