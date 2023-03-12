@extends('userPages.master')
@section('title')
    Statistik
@endsection
@section('content')
    <div class="container">
        <div class="card mx-auto" style="max-width: 60rem;">
            <div class="card-header">
                <h5>Kependudukan</h5>
                <p>Data Penduduk Berdasarkan Usia</p>
            </div>
            <div class="card-body" >
                <canvas id="kependudukan"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-4 mx-auto" style="max-width:30rem;">
                    <div class="card-header">
                        <h5>Pendidikan</h5>
                        <p>Statistik Pendidikan</p>
                    </div>
                    <div class="card-body">
                        <canvas id="pendidikan"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-4 mx-auto" style="max-width:30rem;">
                    <div class="card-header">
                        <h5>Perkawinan</h5>
                        <p>Statistik Perkawinan</p>
                    </div>
                    <div class="card-body">
                        <canvas id="perkawinan"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const kependudukan = document.getElementById('kependudukan');
const pendidikan = document.getElementById('pendidikan');
const perkawinan = document.getElementById('perkawinan');

new Chart(kependudukan, {
  type: 'bar',
  data: {
    labels: ['0-5 thn', '5-17 thn', '17-30 thn', '30-60 thn', '60+ thn'],
    datasets: [{
      label: 'Laki-Laki',
      data: [12, 19, 3, 5, 2, 3],
      borderWidth: 1
    },
    {
      label: 'Perempuan',
      data: [12, 19, 3, 5, 2, 3],
      borderWidth: 1
    }],
  },
  
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

new Chart(pendidikan, {
  type: 'pie',
  data: {
    labels: ['SD', 'SMP', 'SMA/Sederajat', 'Diploma', 'Sarjana','Tidak Sekolah'],
    datasets: [{
      label: 'Laki-Laki',
      data: [12, 19, 3, 5, 2, 0],
      borderWidth: 1
    },
    {
      label: 'Perempuan',
      data: [12, 19, 3, 5, 2, 0],
      borderWidth: 1
    }],
  },
  
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

new Chart(perkawinan, {
  type: 'pie',
  data: {
    labels: ['Kawin', 'Belum Kawin', 'Cerai Mati'],
    datasets: [{
      label: 'Laki-Laki',
      data: [12, 19, 3],
      borderWidth: 1
    },
    {
      label: 'Perempuan',
      data: [12, 19, 3],
      borderWidth: 1
    }],
  },
  
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>
@endpush