@extends('admin.master')
@section('pageTitle')
    berita-desa
@endsection
@section('content')
<div class="card p-3">
    <h5>Daftar Berita</h5>
    <a href="/admin/berita/create" class="btn btn-primary mb-3" style="width: 130px">Buat Berita <sup>+</sup></a>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
</div>

@endsection