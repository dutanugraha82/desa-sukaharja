@extends('UserPages.master')
@section('title')
    Statistik
@endsection
@section('content')
    <div class="container" style="margin-top: 7rem">
      <br>
        <div class="card mx-auto" style="max-width: 83rem;">
            <div class="card-header text-dark text-center">
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
                    <div class="card-header text-dark text-center">
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
                    <div class="card-header text-dark text-center">
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
                    <div class="card-header text-dark text-center">
                        <h5>Pekerjaan</h5>
                        <p>Statistik Pekerjaan</p>
                    </div>
                    <div class="card-body">
                        <canvas id="pekerjaan"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <br>
        <br>
        <hr>
         <div class="card mx-auto mt-4" style="max-width: 83rem;">
            <div class="card-header text-dark text-center">
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

var p05 = {{ Js::from($p05) }}
var p517 = {{ Js::from($p517) }}
var p1730 = {{ Js::from($p1730) }}
var p3060 = {{ Js::from($p3060) }}
var p60 = {{ Js::from($p60) }}

var l05 = {{ Js::from($l05) }}
var l517 = {{ Js::from($l517) }}
var l1730 = {{ Js::from($l1730) }}
var l3060 = {{ Js::from($l3060) }}
var l60 = {{ Js::from($l60) }}

var ts = {{ Js::from($tidakSekolah) }}
var sd = {{ Js::from($sd) }}
var smp = {{ Js::from($smp) }}
var sma = {{ Js::from($sma) }}
var diploma = {{ Js::from($diploma) }}
var sarjana = {{ Js::from($sarjana) }}

var belumKawin = {{ Js::from($belumKawin) }}
var kawin = {{ Js::from($kawin) }}
var cerai = {{ Js::from($cerai) }}
var ceraiMati = {{ Js::from($ceraiMati) }}

var bekerja = {{ Js::from($bekerja) }}
var tidakBekerja = {{ Js::from($tidakBekerja) }}
new Chart(kependudukan, {
  type: 'bar',
  data: {
    labels: ['0-5 thn', '5-17 thn', '17-30 thn', '30-60 thn', '60+ thn'],
    datasets: [{
      label: 'Laki-Laki',
      data: [l05, l517, l1730, l3060, l60],
      borderWidth: 1
    },
    {
      label: 'Perempuan',
      data: [p05, p517, p1730, p3060, p60],
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
    labels: ['SD', 'SMP', 'SMA/Sederajat', 'Diploma', 'S1/S2/S3','Tidak Sekolah'],
    datasets: [{
      label: 'Masyarakat',
      data: [sd, smp, sma, diploma, sarjana, ts],
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
    labels: ['Kawin', 'Belum Kawin', 'Cerai', 'Cerai Mati'],
    datasets: [{
      label: 'Masyarakat',
      data: [kawin, belumKawin, cerai, ceraiMati],
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
      data: [bekerja, tidakBekerja],
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
    labels: ['Badan Air', 'Kebun Campuran','Ladang','Lahan Terbangun','Sawah','Semak','Tanah Terbuka'],
    datasets: [{
      label: 'Hektar',
      data: [7,25,18,167,41,2,13],
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