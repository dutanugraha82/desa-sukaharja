@extends('admin.master')
@section('pageTitle')
    rpjm
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card p-3">
           
           @if (auth()->user()->role == 'admin')
           <h5>Input Data RPJM</h5>
           <hr>
           <form action="/admin/rpjm" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" class="form-control" placeholder="nama file" name="nama" required>
            <br>
            <input type="file" name="file" class="form-control" required>
            <button type="submit" class="btn btn-primary mt-4">Tambah RPJM</button>
        </form>
           @endif
            <hr>
            <h5 class="my-4 text-center">Data RPJM</h5>
            <table id="rpjm" class="table table-hover table-striped">
                @if (auth()->user()->role == 'admin')
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">No</th>
                        <th scope="col">Nama File</th>
                        <th scope="col">File</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @else
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">No</th>
                        <th scope="col">Nama File</th>
                        <th scope="col">File</th>
                    </tr>
                </thead>
                @endif
            </table>
        </div>
    </div>
@endsection
@if (auth()->user()->role == 'admin')
@push('js')
<script>
    $(function (){
    let table = $('#rpjm').DataTable({
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
        ajax:"{{ route('admin.rpjm') }}",
        columns: [
            {data: 'DT_RowIndex', name:'DT_RowIndex'},
            {data: 'DT_RowIndex', name:'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'file', name: 'file'},
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
    let table = $('#rpjm').DataTable({
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
        ajax:"{{ route('kades.rpjm') }}",
        columns: [
            {data: 'DT_RowIndex', name:'DT_RowIndex'},
            {data: 'DT_RowIndex', name:'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'file', name: 'file'},
        ]
    });
});
</script>
@endpush
@endif