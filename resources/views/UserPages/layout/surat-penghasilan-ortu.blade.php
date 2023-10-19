
@extends('UserPages.master')
@section('title')
    surat-penghasilan-orang-tua
@endsection
@section('content')
    <div class="container" style="margin-top: 8rem;">
        <div class="card p-3">
       
        <h5 class="text-center">Formulir Pengajuan Surat Penghasilan Orang Tua <br> <sub class="text-danger">*pengaju diharuskan orang tua</sub></h5>
        <hr>
       
        <form action="/surat-penghasilan-orang-tua" method="POST">
            @csrf
            <div class="row">
                <h5 class="text-center">Data Orang Tua</h5>
                <br>
                <div class="col-md-6">
                    <label for="nama" class="mb-2">Nama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nama" value="{{ $profiles->nama }}" readonly required>
                    </div>

                    <label for="ttl">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttl" value="{{ $profiles->tempat_lahir . ', '. $tanggal_lahir }}" readonly required>
                    </div>

                    <label for="agama" class="mb-2">Agama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="agama" value="{{ $profiles->agama }}" readonly required>
                    </div>

                    <label for="jk" class="mb-2">Jenis Kelamin<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="jk" value="{{ $profiles->jk }}" required readonly>
                    </div>

                    <label for="penghasilan" class="mb-2">Penghasilan<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="penghasilan" id="penghasilan" required>
                    </div>

                    <label for="penghasilan" class="mb-2">Penghasilan Dalam Ejaan<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ejaan_penghasilan" placeholder="contoh: Lima Juta Rupiah" required>
                    </div>

                    <label for="anggota" class="mb-2">Jumlah Anggota Keluarga<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="number" class="form-control" name="anggota"  required>
                    </div>

                    <label for="anggota" class="mb-2">Jumlah Anggota Keluarga Dalam Ejaan<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ejaan_anggota" placeholder="contoh: Tiga" required>
                    </div>


                    
                </div>

                <div class="col-md-6">
                    <label for="pekerjaan" class="mb-2">Pekerjaan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan" value="{{ $profiles->jenis_pekerjaan }}" required readonly>
                    </div>

                    <label for="nik" class="mb-2">NIK <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="nik" class="form-control" required value="{{ Crypt::decrypt($profiles->nik) }}" readonly >
                    </div>

                    <label for="kewarganegaraan" class="mb-2">kewarganegaraan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="kewarganegaraan" class="form-control" value="Indonesia" required >
                    </div>
                    <label for="alamat" class="mb-2">Alamat Lengkap Pengaju <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat" class="form-control" id="" cols="30" rows="10" placeholder="mohon ketik alamat sesuai KTP" >{{ $alamat }}</textarea>
                    </div>
                </div>
            </div>

            <hr class="horizontal dark my-5">

            <div class="row">
                <h5 class="text-center">Data Anak</h5>
                <br>
                <div class="col-md-6">
                    <label for="nama_anak" class="mb-2">Nama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nama_anak"   required>
                    </div>

                    <label for="ttl">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttl_anak"   required>
                    </div>


                    <label for="jk" class="mb-2">Jenis Kelamin<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jk_anak" class="form-control" id="">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="pekerjaan" class="mb-2">Pekerjaan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan_anak"  required>
                    </div>

                    <label for="nik" class="mb-2">NIK/Identitas Lain<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="nik_anak" class="form-control" required  >
                    </div>

                    <label for="alamat" class="mb-2">Alamat <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat_anak" class="form-control" id="" cols="30" rows="10" placeholder="mohon ketik alamat sesuai KTP" ></textarea>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-around mt-4">
                <a href="/layanan-desa" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Ajukan Surat!</button>
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