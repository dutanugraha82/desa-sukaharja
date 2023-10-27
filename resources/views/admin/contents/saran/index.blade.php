@extends('admin.master')
@section('pageTitle')
    saran-desa
@endsection
@section('content')
<div class="card p-3">
    <h5>Saran dan Masukan</h5>
    <table id="saran-table" class="table table-hover table-striped">
      <thead>
          <tr>
              <th scope="col"></th>
              <th scope="col">No</th>
              <th scope="col">NIK</th>
              <th scope="col">Nama</th>
              <th scope="col">No HP</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
  </table>
</div>

@endsection
@if (auth()->user()->role == 'sekdes')
@push('js')
<script>
 $(function (){
   let table = $('#saran-table').DataTable({
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
       ajax:"{{ route('sekdes.berita') }}",
       columns: [
                {data: 'DT_RowIndex'},
                {data: 'DT_RowIndex'},
                {data: 'nik', name: 'nik'},
                {data: 'nama', name: 'nama'},
                {data: 'nohp', name: 'nohp'},
                {data: 'action', name: 'action'},
       ]
   });
});
</script>
@endpush
@elseif(auth()->user()->role == 'admin')
@push('js')
     <script>
      $(function (){
        let table = $('#saran-table').DataTable({
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
            ajax:"{{ route('admin.saran') }}",
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'DT_RowIndex'},
                {data: 'nik', name: 'nik'},
                {data: 'nama', name: 'nama'},
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
        let table = $('#saran-table').DataTable({
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
            ajax:"{{ route('kades.saran') }}",
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'DT_RowIndex'},
                {data: 'nik', name: 'nik'},
                {data: 'nama', name: 'nama'},
                {data: 'nohp', name: 'nohp'},
                {data: 'action', name: 'action'},
            ]
        });
    });
     </script>
 @endpush 
@endif
 