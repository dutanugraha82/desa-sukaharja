@extends('admin.master')
@section('pageTitle')
    berita-desa
@endsection
@section('content')
<div class="card p-3">
    <h5>Daftar Berita</h5>
    <a href="/admin/berita/create" class="btn btn-primary mb-3" style="width: 130px">Buat Berita <sup>+</sup></a>
    <table id="berita-table" class="table table-hover table-striped">
      <thead>
          <tr>
              <th scope="col">No</th>
              <th scope="col">Judul</th>
              <th scope="col">Dibuat</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
  </table>
</div>

@endsection
 @push('js')
     <script>
      $(function (){
        let table = $('#berita-table').DataTable({
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
            ajax:"{{ route('berita.json') }}",
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'judul', name: 'judul'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action'},
            ]
        });
    });
     </script>
 @endpush