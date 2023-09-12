@extends('admin.master')
@section('pageTitle')
    transparansi
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card p-3">
            <h5>Input Data TRANSPARANSI</h5>
            <hr>
            <form action="/admin/transparansi" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" class="form-control" placeholder="nama file" name="nama" required>
                <br>
                <input type="file" name="file" class="form-control" required>
                <button type="submit" class="btn btn-primary mt-4">Tambah TRANSPARANSI</button>
            </form>
            <hr>
            <h5 class="my-4 text-center">Data RKP</h5>
            <table id="transparansi" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">No</th>
                        <th scope="col">Nama File</th>
                        <th scope="col">File</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('js')
<script>
    $(function (){
    let table = $('#transparansi').DataTable({
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
        ajax:"{{ route('admin.transparansi') }}",
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