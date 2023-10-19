
@extends('admin.master')
@section('pageTitle')
    edit-surat-penghasilan-orang-tua
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card p-3">
       
        <h5 class="text-center">Update Data Surat {{ $data->nama }}</h5>
        <hr>
        <form action="/{{ auth()->user()->role }}/surat-penghasilan-orang-tua/{{ $data->id }}" method="POST">
            @csrf
            @method('put')
            <h5 class="text-center">Data Orang Tua</h5>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="nama" class="mb-2">Nama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nama" value="{{ $data->nama }}"  required>
                    </div>

                    <label for="ttl">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttl" value="{{ $data->ttl }}"  required>
                    </div>

                    <label for="agama" class="mb-2">Agama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="agama" value="{{ $data->agama }}"  required>
                    </div>

                    <label for="jk" class="mb-2">Jenis Kelamin<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jk" class="form-control" id="" required>
                            <option value="{{ $data->jk }}">{{ $data->jk }}</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <label for="penghasilan" class="mb-2">Penghasilan<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="penghasilan" id="penghasilan" value="{{ $data->penghasilan }}"  required>
                    </div>

                    <label for="penghasilan" class="mb-2">Penghasilan Dalam Ejaan<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ejaan_penghasilan" value="{{ $data->ejaan_penghasilan }}"  required>
                    </div>

                    <label for="anggota" class="mb-2">Jumlah Anggota Keluarga<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="anggota" value="{{ $data->anggota }}"  required>
                    </div>

                    <label for="anggota" class="mb-2">Jumlah Anggota Keluarga Dalam Ejaan<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ejaan_anggota" value="{{ $data->ejaan_anggota }}" required>
                    </div>



                    
                </div>

                <div class="col-md-6">
                    <label for="pekerjaan" class="mb-2">Pekerjaan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan" value="{{ $data->pekerjaan }}" required >
                    </div>

                    <label for="nik" class="mb-2">NIK <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="nik" class="form-control" required value="{{ $data->nik }}"  >
                    </div>

                    <label for="kewarganegaraan" class="mb-2">kewarganegaraan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="kewarganegaraan" class="form-control" value="{{ $data->kewarganegaraan }}" required >
                    </div>
                    <label for="alamat" class="mb-2">Alamat Lengkap Pengaju <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat" class="form-control" id="" cols="30" rows="10" placeholder="mohon ketik alamat sesuai KTP" >{{ $data->alamat }}</textarea>
                    </div>
                </div>
            </div>

            <hr class="my-5">

            <h5 class="text-center">Data Anak</h5>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="nama_anak" class="mb-2">Nama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nama_anak" value="{{ $data->nama_anak }}"  required>
                    </div>

                    <label for="ttl">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttl_anak" value="{{ $data->ttl_anak }}"  required>
                    </div>


                    <label for="jk" class="mb-2">Jenis Kelamin<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jk_anak" class="form-control" id="" required>
                            <option value="{{ $data->jk_anak }}">{{ $data->jk_anak }}</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="pekerjaan" class="mb-2">Pekerjaan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan_anak" value="{{ $data->pekerjaan_anak }}"  required>
                    </div>

                    <label for="nik" class="mb-2">NIK/Identitas Lain<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="nik_anak" class="form-control" value="{{ $data->nik_anak }}" required>
                    </div>

                    <label for="alamat" class="mb-2">Alamat <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat_anak" class="form-control" id="" cols="30" rows="10" >{{ $data->alamat_anak }}</textarea>
                    </div>
                </div>

            </div>
            <div class="mt-4">
                <a style="width: 70vw" href="/{{ auth()->user()->role }}/surat-penghasilan-orang-tua" class="btn btn-warning">Kembali</a><br>
                <button style="width: 70vw; margin-top:10px" type="submit" onclick="return confirm('Yakin Ingin Merubah Data Ini?')" class="btn btn-primary">Update Surat!</button>
            </div>
        </form>
             
    </div>
    </div>
@endsection
@push('js')
    <script>
       var rupiah = document.getElementById('penghasilan');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
    </script>
@endpush