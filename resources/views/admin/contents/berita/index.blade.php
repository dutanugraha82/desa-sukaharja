@extends('admin.master')
@section('pageTitle')
    berita-desa
@endsection
@section('content')
<div class="card p-3">
    <h5>Daftar Berita</h5>
    @if (auth()->user()->role == 'admin')
    <a href="/admin/berita/create" class="btn btn-primary mb-3" style="width: 130px">Buat Berita <sup>+</sup></a>
    @endif
    <table id="berita-table" class="table table-hover table-striped">
     @if (auth()->user()->role != 'kades')
     <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Dibuat</th>
            <th scope="col">Status Validasi</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
        
    @else
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Dibuat</th>
            <th scope="col">Status Validasi</th>
        </tr>
    </thead>
     @endif
  </table>
</div>

@endsection
@if (auth()->user()->role == 'sekdes')
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
       ajax:"{{ route('sekdes.berita.json') }}",
       columns: [
           {data: 'DT_RowIndex'},
           {data: 'DT_RowIndex'},
           {data: 'judul', name: 'judul'},
           {data: 'created_at', name: 'created_at'},
           {data: 'status_validasi', name: 'status_validasi'},
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
                {data: 'DT_RowIndex'},
                {data: 'judul', name: 'judul'},
                {data: 'created_at', name: 'created_at'},
                {data: 'status_validasi', name: 'status_validasi'},
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
            ajax:"{{ route('kades.berita.json') }}",
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'DT_RowIndex'},
                {data: 'judul', name: 'judul'},
                {data: 'created_at', name: 'created_at'},
                {data: 'status_validasi', name: 'status_validasi'},
            ]
        });
    });
     </script>
 @endpush
@endif

 