@extends('UserPages.master')
@section('title')
    data-penduduk
@endsection
@section('content')
<div class="container" style="margin-top: 8rem">
    <div class="card p-3">
        <h5 class="text-center text-dark">Data Penduduk</h5>
        <table class="table text-dark table-hover" id="warga-table">
            <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Status</th>
                  <th scope="col">Pekerjaan</th>
              </tr>
            </thead>
          </table>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
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
          ajax:"{{ route('data-penduduk') }}",
          columns: [
              {data: 'DT_RowIndex'},
              {data: 'nama', name: 'nama'},
              {data: 'jk', name: 'jk'},
              {data: 'status_perkawinan', name: 'status_perkawinan'},
              {data: 'jenis_pekerjaan', name: 'jenis_pekerjaan'},
          ]
      });
  });
   </script>
    @endpush