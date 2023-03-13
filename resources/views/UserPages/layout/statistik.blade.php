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
            <div class="col-md-4">
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
            <div class="col-md-4">
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
            <div class="col-md-4">
                <div class="card mt-4 mx-auto" style="max-width:30rem;">
                    <div class="card-header">
                        <h5>Pekerjaan</h5>
                        <p>Statistik Pekerjaan</p>
                    </div>
                    <div class="card-body">
                        <canvas id="pekerjaan"></canvas>
                    </div>
                </div>
            </div>
        </div>
         <div class="card mx-auto mt-4" style="max-width: 60rem;">
            <div class="card-header">
                <h5>Lahan</h5>
                <p>Data Lahan Desa</p>
            </div>
            <div class="card-body">
                <canvas id="lahan"></canvas>
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
const pekerjaan = document.getElementById('pekerjaan');
const lahan = document.getElementById('lahan');

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
      label: 'Masyarakat',
      data: [12, 19, 3, 5, 2, 0],
      borderWidth: 1
    },
    ],
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
      label: 'Masyarakat',
      data: [12, 19, 3],
      borderWidth: 1
    },
  ],
  },
  
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

new Chart(pekerjaan, {
  type: 'pie',
  data: {
    labels: ['Bekerja', 'Tidak-Bekerja'],
    datasets: [{
      label: 'Masyarakat',
      data: [100,80],
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

new Chart(lahan, {
  type: 'pie',
  data: {
    labels: ['Lain', 'Pertanian','Danau','Perkebunan','Pemukiman'],
    datasets: [{
      label: 'Hektar',
      data: [4,30,20,50,80],
      borderWidth: 1
    }],
  },
  
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    maintainAspectRatio: false
  }
});
</script>
@endpush