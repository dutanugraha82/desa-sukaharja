@extends('admin.master')
@section('pageTitle')
    dashboard
@endsection
@section('content')
     <!-- Content Row -->
     <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="nav-link" href="/{{ auth()->user()->role }}/profiles">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Data Penduduk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $penduduk }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="nav-link" href="/{{ auth()->user()->role }}/umkm">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    UMKM</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $umkm }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
           <a class="nav-link" href="/{{ auth()->user()->role }}/berita">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Berita
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $berita }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
           </a>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="nav-link" href="/{{ auth()->user()->role }}/saran">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Saran dan Masukan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $saran }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Content Row -->

    <div class="container-fluid card p-3">
        <div class="d-flex p-2 justify-content-between">
            <h5>Prestasi Desa</h5>
            @if (auth()->user()->role == 'admin')
            <a href="/{{ auth()->user()->role }}/prestasi/create" class="btn btn-primary">Tambah <sup>+</sup></a>
            @endif
        </div>
        <table id="prestasi" class="table table-hover">
            @if (auth()->user()->role == 'admin')
                <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            @else
                <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Dibuat</th>
              </tr>
            </thead>
            @endif
          </table>
               
    </div>
@endsection
@if (auth()->user()->role == 'admin')
@push('js')
<script>
    $(function (){
      let table = $('#prestasi').DataTable({
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
          ajax:"{{ route('admin.dashboard') }}",
          columns: [
              {data: 'DT_RowIndex'},
              {data: 'DT_RowIndex'},
              {data: 'judul', name: 'judul'},
              {data: 'created_at', name: 'created_at'},
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
      let table = $('#prestasi').DataTable({
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
          ajax:"{{ route('kades.dashboard') }}",
          columns: [
              {data: 'DT_RowIndex'},
              {data: 'DT_RowIndex'},
              {data: 'judul', name: 'judul'},
              {data: 'created_at', name: 'created_at'},
          ]
      });
   });
   </script>
@endpush
@elseif(auth()->user()->role == 'sekdes')
@push('js')
<script>
    $(function (){
      let table = $('#prestasi').DataTable({
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
          ajax:"{{ route('sekdes.dashboard') }}",
          columns: [
              {data: 'DT_RowIndex'},
              {data: 'DT_RowIndex'},
              {data: 'judul', name: 'judul'},
              {data: 'created_at', name: 'created_at'},
              {data: 'action', name: 'action'},
          ]
      });
   });
   </script>
@endpush
@elseif(auth()->user()->role == 'pelayanan')
@push('js')
<script>
    $(function (){
      let table = $('#prestasi').DataTable({
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
          ajax:"{{ route('pelayanan.dashboard') }}",
          columns: [
              {data: 'DT_RowIndex'},
              {data: 'DT_RowIndex'},
              {data: 'judul', name: 'judul'},
              {data: 'created_at', name: 'created_at'},
          ]
      });
   });
   </script>
@endpush
@endif