@extends('admin.master')
@section('pageTitle')
    sunting-data-penduduk
@endsection
@section('content')
    <div class="container">
        <div class="card p-3">
            @if ($errors->any())
            <div class="alert alert-danger" id="message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <h5>Sunting Data Penduduk</h5>
            <hr>
            @foreach ($data as $item)
            <form action="/{{ auth()->user()->role }}/profiles/{{ $item->id }}" method="POST">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $item->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">NIK</label>
                            <input type="text" class="form-control" name="nik" value="{{ Crypt::decrypt($item->nik) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Jenis Kelamin</label>
                           <select name="jk" class="form-control" required>
                            <option value="{{ $item->jk }}">{{ $item->jk }}</option>
                            @if ($item->jk == 'Laki-Laki')
                            <option value="Perempuan">Perempuan</option>
                            @else
                            <option value="Laki-Laki">Laki-Laki</option>   
                            @endif  
                           </select>
                        </div>
                        @endforeach
                        <div class="mb-3">
                            <label for="nama">No KK</label><br>
                            <select name="kartu_keluarga_id" class="form-control" id="kk" required>
                                <option value="{{ $item->kartu_keluarga_id }}">{{ Crypt::decrypt($item->no_kk) }}</option>
                                @foreach ($kk as $item)
                                <option value="{{ $item->id }}">{{ Crypt::decrypt($item->no_kk )}}</option>
                                @endforeach
                            </select>
                        </div>
                        @foreach ($data as $item)
                        <div class="mb-3">
                            <label for="nama">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempatLahir" value="{{ $item->tempat_lahir }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Tanggak Lahir</label>
                            <input type="date" class="form-control" name="tanggalLahir" value="{{ $item->tanggal_lahir }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama">Agama</label>
                            <input type="text" class="form-control" name="agama" value="{{ $item->agama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Pendidikan</label>
                            <input type="text" class="form-control" name="pendidikan" value="{{ $item->pendidikan }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama">Jenis Pekerjaan</label>
                            <input type="text" class="form-control" name="jenisPekerjaan" value="{{ $item->jenis_pekerjaan }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama">Status Perkawinan</label>
                            <input type="text" class="form-control" name="status_perkawinan" value="{{ $item->status_perkawinan }}">
                        </div>
                        <div class="mb-3">
                            <label for="status">Status Hubungan Dalam Keluarga</label>
                            <input type="text" class="form-control" name="status_hubungan_dalam_keluarga" value="{{ $item->status_hubungan_dalam_keluarga }}">
                        </div>
                        <div class="mb-3">
                            <label for="namaAyah">Nama Ayah</label>
                            <input type="text" class="form-control" name="nama_ayah" value="{{ Crypt::decrypt($item->nama_ayah) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="namaIbu">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu" value="{{ Crypt::decrypt($item->nama_ibu) }}" required>
                        </div>
                        @endforeach
                        
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4 d-block ml-auto" onclick="return confirm('Yakin ingin merubah data?')">Update Data</button>
            </form>
           
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
        $('#kk').select2();
        });
        setTimeout(() => {
            let message = document.getElementById('message');
            message.style.display = 'none';
        }, 3000);
    </script>
@endpush