@extends('UserPages.master')
@section('title')
    Lembaga
@endsection
@section('content')
    <div class="container">
        <h4 class="text-center text-white">Lembaga Desa Sukaharja</h4>
        <hr>
        <div class="container-fluid">
            <div class="row" style="margin-top: 3rem;">
                {{-- Karang Taruna --}}
                <div class="col-6 col-md-4 text-center mb-3">
                    <!-- Button trigger modal -->
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#karangTaruna">
                            <img src="{{ asset('img/logo-karang-taruna.png') }}" style="max-width: 7em" alt="" data-aos="zoom-in" data-aos-delay="30"
                            data-aos-duration="1500">
                        </a>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="karangTaruna" tabindex="-1" aria-labelledby="karangTaruna" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable text-dark">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img class="d-block mx-auto" src="{{ asset('img/logo-karang-taruna.png') }}" style="max-width: 100px" alt="">
                                    <p class="text-center">Karang Taruna</p>
                                    <hr>
                                    <p style="text-align: justify">
                                        Karang Taruna adalah organisasi kepemudaan di Indonesia yang dibentuk oleh masyarakat sebagai wadah generasi muda untuk mengembangkan diri, tumbuh, dan berkembang atas dasar kesadaran serta tanggung jawab sosial dari, oleh, dan untuk generasi muda, yang berorientasi pada tercapainya kesejahteraan sosial bagi masyarakat.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
                
                {{-- POSYANDU --}}
                <div class="col-6 col-md-4 text-center mb-3">
                    <!-- Button trigger modal -->
                    <a class="btn" data-bs-toggle="modal" data-bs-target="#posyandu">
                        <img src="{{ asset('img/posyandu-logo.png') }}" style="max-width: 7em" alt="" data-aos="zoom-in" data-aos-delay="30"
                        data-aos-duration="1500">
                    </a>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="posyandu" tabindex="-1" aria-labelledby="posyandu" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable text-dark">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img class="d-block mx-auto" src="{{ asset('img/posyandu-logo.png') }}" style="max-width: 100px" alt="">
                                <p class="text-center">Posyandu</p>
                                <hr>
                                <p style="text-align: justify">
                                    Posyandu (pos pelayanan terpadu) merupakan upaya pemerintah untuk memudahkan masyarakat Indonesia dalam memperoleh pelayanan kesehatan ibu dan anak. Tujuan utama posyandu adalah mencegah peningkatan angka kematian ibu dan bayi saat kehamilan, persalinan, atau setelahnya melalui pemberdayaan masyarakat. Berbeda dengan puskesmas yang memberikan pelayanan setiap hari, posyandu hanya melayani setidaknya 1 kali dalam sebulan. Lokasi posyandu umumnya mudah dijangkau masyarakat, mulai dari lingkungan desa atau kelurahan hingga RT dan RW.
                                </p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                {{-- PKK --}}
                <div class="col-6 col-md-4 text-center mb-3">
                    <!-- Button trigger modal -->
                    <a class="btn" data-bs-toggle="modal" data-bs-target="#pkk">
                        <img src="{{ asset('img/pkk-logo.png') }}" style="max-width: 7em" alt="" data-aos="zoom-in" data-aos-delay="30"
                        data-aos-duration="1500">
                    </a>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="pkk" tabindex="-1" aria-labelledby="pkk" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable text-dark">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img class="d-block mx-auto" src="{{ asset('img/pkk-logo.png') }}" style="max-width: 100px" alt="">
                                <p class="text-center">Pembinaan Kesejahteraan Keluarga</p>
                                <hr>
                                <p style="text-align: justify">
                                    Pengertian PKK
                                    PKK singkatan dari Pembinaan Kesejahteraan Keluarga, adalah organisasi
                                    kemasyarakatan yang memberdayakan wanita untuk turut berpartisipasi dalam
                                    pembangunan Indonesia. <br>
                                    <br>
                                    <b>Tugas PKK</b>
                                    <br>
                                    PKK Kelurahan mempunyai tugas membantu Pemerintah Lurah dan merupakan
                                    mitra dalam pemberdayaan dan peningkatan kesejahteraan keluarga.
                                    Tugas PKK Kelurahan meliputi :
                                    <br>
                                    <ol style="text-align: justify">
                                        <li>
                                            Menyusun rencana kerja PKK Kelurahan, sesuai dengan basil Rakerda (Rapat
                                            Kerja Daerah) Kabupaten/Kota.
                                        </li>
                                        <li>
                                            Melaksanakan kegiatan sesuai jadwal yang disepakati.
                                        </li>
                                        <li>
                                            Menyuluh dan menggerakkan kelompok-kelompok PKK Dusun/Lingkungan,
                                            RW dan RT agar dapat mewujudkan kegiatan-kegiatan yang telah disusun dan
                                            disepakati.
                                        </li>
                                        <li>
                                            Menggali, menggerakan dan mengembangkan potensi masyarakat, khususnya
                                            keluarga untuk meningkatkan kesejahteraan keluarga sesuai dengan
                                            kebijaksanaan yang telah ditetapkan.
                                        </li>
                                        <li>
                                            Melaksanakan kegiatan penyuluhan kepada keluarga-keluarga yang
                                            mencakup kegiatan bimbingan dan motivasi dalam upaya mencapai keluarga
                                            sejahtera.
                                        </li>
                                        <li>
                                            Mengadakan pembinaan dan bimbingan mengenai pelaksanaan program
                                            kerja.
                                        </li>
                                        <li>
                                            Berpartisipasi dalam pelaksanaan program instansi yang berkaitan dengan
                                             kesejahteraan keluarga di desa/kelurahan.
                                        </li>
                                        <li>
                                            Membuat laporan basil kegiatan kepada Tim Penggerak PKK Kecamatan
                                            dengan tembusan kepada Ketua Dewan Penyantun Tim Penggerak PKK
                                            setempat.
                                        </li>
                                        <li>
                                            Melaksanakan tertib administrasi.
                                        </li>
                                        <li>
                                            Mengadakan konsultasi dengan Ketua Dewan Penyantun Tim Penggerak PKK
                                        setempat.
                                        </li>
                                    </ol>
                                    <b>Fungsi PKK</b>
                                    <br>
                                    a. Penyuluh, motivator dan penggerak masyarakat agar mau dan mampu
                                    melaksanakan program PKK. <br>
                                    b. fasilitator, perencana, pelaksana, pengendali, pembina dan pembimbing
                                    Gerakan PKK.
                                </p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                {{-- BPD --}}
                <div class="col-6 col-md-4 text-center mb-3">
                      <!-- Button trigger modal -->
                      <a class="btn" data-bs-toggle="modal" data-bs-target="#bpd">
                        <img src="{{ asset('img/bpd-logo.png') }}" style="max-width: 7em" alt="" data-aos="zoom-in" data-aos-delay="30"
                        data-aos-duration="1500">
                    </a>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="bpd" tabindex="-1" aria-labelledby="bpd" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable text-dark">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img class="d-block mx-auto" src="{{ asset('img/bpd-logo.png') }}" style="max-width: 100px" alt="">
                                <p class="text-center">Badan Permusyawaratan Desa</p>
                                <hr>
                                <p style="text-align: justify">
                                    Berdasarkan Undang-undang No.6 Tahun 2014 tentang Desa, Badan Permusyawaratan Desa (BPD), adalah lembaga yang melaksanakan fungsi pemerintahan yang anggotanya merupakan wakil dari penduduk desa berdasarkan keterwakilan wilayah dan ditetapkan secara demokratis, demikian yang disebut dalam Pasal 1 angka 4 UU Desa.
                                </p>
                                <b>Fungsi BPD :</b> <br>
                                <ol style="text-align: justify">
                                    <li>
                                        Membahas dan Menyepakati Rancangan Peraturan Desa bersama kepala Desa
                                    </li>
                                    <li>
                                        Menampung dan Menyalurkan Aspirasi Masarakat Desa
                                    </li>
                                    <li>
                                        Melakukan pengawasan kinerja Kepala Desa
                                    </li>
                                </ol>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                {{-- PSM --}}
                <div class="col-6 col-md-4 text-center mb-3">
                    <a class="btn" data-bs-toggle="modal" data-bs-target="#psm">
                        <img src="{{ asset('img/psm-logo.png') }}" style="max-width: 7em" alt="" data-aos="zoom-in" data-aos-delay="30"
                        data-aos-duration="1500">
                    </a>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="psm" tabindex="-1" aria-labelledby="psm" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable text-dark">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img class="d-block mx-auto" src="{{ asset('img/psm-logo.png') }}" style="max-width: 100px" alt="">
                                <p class="text-center">Pekerja Sosial Masyarakat</p>
                                <hr>
                                <p style="text-align: justify">
                                    Menurut Permensos RI no. 01 tahun 2012 adalah “ Seseorang sebagai warga masyarakat yang mempunyai jiwa pengabdian sosial, kemauan, dan kemampuan dalam penyelenggaraan kesejahteraan sosial, serta telah mengikuti bimbingan atau pelatihan di bidang kesejahteraan sosial” jelasnya sebagai seorang PSM tidak hanya sekedar ingin gaya-gaya saja akan tetapi lebih ditekankan pada dedikasi /pengabdian sosial dan kemampuan untuk melaksanakan misi sosialnya.
                                </p>
                                <b>Fungsi PSM : </b> <br>
                                <ol style="text-align: justify">
                                    <li>
                                        Perencana dan inisiator program dalam penyelenggaraan kesos.
                                    </li>
                                    <li>
                                        Pelaksana dan pengorganisasi program dalam penyelenggaraan kesos.
                                    </li>
                                    <li>
                                        Pengembang kemitraan dan peningkatan kerjasana dalam penyelenggaraan kesos.
                                    </li>
                                    <li>
                                        Pengendali progran dalam penyelenggaraan kesos.
                                    </li>
                                </ol>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                {{-- LPM --}}
                <div class="col-6 col-md-4 text-center mb-3">
                    <a class="btn" data-bs-toggle="modal" data-bs-target="#lpm">
                        <img src="{{ asset('img/lpm-logo.png') }}" style="max-width: 7em" alt="" data-aos="zoom-in" data-aos-delay="30"
                        data-aos-duration="1500">
                    </a>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="lpm" tabindex="-1" aria-labelledby="lpm" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable text-dark">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img class="d-block mx-auto" src="{{ asset('img/lpm-logo.png') }}" style="max-width: 100px" alt="">
                                <p class="text-center">Lembaga Pemberdayaan Masyarakat</p>
                                <hr>
                                <p style="text-align: justify">
                                    Lembaga Pemberdayaan Masyarakat berdasarkan Peraturan Daerah Nomor 13 Tahun 2006 Tentang Lembaga Kemasyarakatan dan Lembaga Adat menyebutkan bahwa “Pengertian Lembaga Pemberdayaan Masyarakat yang selanjutnya disingkat (LPM) adalah lembaga, organisasi atau wadah yang dibentuk atas prakarsa masyarakat sebagai mitra pemerintah desa dalam menampung dan mewujudkan aspirasi dan kebutuhan masyarakat di bidang pembangunan.
                                </p>
                                <b>Fungsi LPM : </b> <br>
                                <ol style="text-align: justify">
                                    <li>
                                        Penampung dan penyalur aspirasi masyarakat dalam pembangunan.
                                    </li>
                                    <li>
                                        Penanaman dan pemupukan rasa persatuan dan kesatuan masyarakat dalam rangka memperkokoh Negara Kesatuan Republik Indonesia.
                                    </li>
                                    <li>
                                        Peningkatan kualitas dan percepatan pelayanan pemerintah kepada masyarakat.
                                    </li>
                                    <li>
                                        Penyusunan rencana, pelaksana, pengendali, pelestarian dan pengembangan hasil-hasil pembangunan secara partisipatif.
                                    </li>
                                    <li>
                                        Penumbuhkembangan dan penggerak prakarsa dan partisipasi, serta swadaya gotong royong masyarakat.
                                    </li>
                                    <li>
                                        Penggali, pendayagunaan dan pengembangan potensi sumberdaya serta keserasian lingkungan hidup.
                                    </li>
                                </ol>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                {{-- BUMDES --}}
            <div class="col-6 col-md-4 text-center mb-3">
                <a class="btn" data-bs-toggle="modal" data-bs-target="#bumdes">
                    <img src="{{ asset('img/bumdes-logo.png') }}" style="max-width: 7em" alt="" data-aos="zoom-in" data-aos-delay="30"
                    data-aos-duration="1500">
                </a>
                
                <!-- Modal -->
                <div class="modal fade" id="bumdes" tabindex="-1" aria-labelledby="bumdes" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable text-dark">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img class="d-block mx-auto" src="{{ asset('img/bumdes-logo.png') }}" style="max-width: 100px" alt="">
                            <p class="text-center">Badan Usaha Milik Desa</p>
                            <hr>
                            <p style="text-align: justify">
                                Badan Usaha Milik Desa (atau diakronimkan menjadi Bumdes) merupakan usaha desa yang dikelola oleh Pemerintah Desa, dan berbadan hukum. Pemerintah Desa dapat mendirikan Badan Usaha Milik Desa sesuai dengan kebutuhan dan potensi Desa. Pembentukan Badan Usaha Milik Desa ditetapkan dengan Peraturan Desa. Kepengurusan Badan Usaha Milik Desa terdiri dari Pemerintah Desa dan masyarakat desa setempat.
                                <br>
                                Permodalan Badan Usaha Milik Desa dapat berasal dari Pemerintah Desa, tabungan masyarakat, bantuan Pemerintah, Pemerintah Provinsi dan Pemerintah Kabupaten/Kota, pinjaman, atau penyertaan modal pihak lain atau kerja sama bagi hasil atas dasar saling menguntungkan. Badan Usaha Milik Desa dapat melakukan pinjaman, yang dapat dilakukan setelah mendapat persetujuan BPD.
                            </p>
                            <b>Jenis Usaha BUMDES : </b> <br>
                            <ol style="text-align: justify">
                                <li>
                                    Bisnis Sosial/ Serving.
                                </li>
                                <li>
                                    Keuangan/Banking.
                                </li>
                                <li>
                                    Bisnis Penyewaan/Renting.
                                </li>
                                <li>
                                    Lembaga Perantara/Brokering.
                                </li>
                                <li>
                                    Perdagangan/Trading.
                                </li>
                                <li>
                                    Usaha Bersama/Holding.
                                </li>
                                <li>
                                    Kontraktor/Contracting.
                                </li>
                            </ol>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            {{-- LINMAS --}}
            <div class="col-6 col-md-4 text-center mb-3">
                <a class="btn" data-bs-toggle="modal" data-bs-target="#linmas">
                    <img src="{{ asset('img/linmas-logo.png') }}" style="max-width: 7em" alt="" data-aos="zoom-in" data-aos-delay="30"
                    data-aos-duration="1500">
                </a>
                
                <!-- Modal -->
                <div class="modal fade" id="linmas" tabindex="-1" aria-labelledby="linmas" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable text-dark">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img class="d-block mx-auto" src="{{ asset('img/linmas-logo.png') }}" style="max-width: 100px" alt="">
                            <p class="text-center">Satuan Perlindungan Masyarakat</p>
                            <hr>
                            <p style="text-align: justify">
                                Pengertian Satlinmas secara lengkap seperti apa yang tertuang dalam pasal 1 ayat 3 Permendagri 84/2014 adalah Organisasi yang dibentuk oleh pemerintah Kalurahan/Kelurahan dan beranggotakan warga masyarakat yang disiapkan dan dibekali pengetahuan serta keterampilan untuk melaksanakan kegiatan penanganan bencana guna mengurangi dan memperkecil akibat bencana, serta ikut memelihara keamanan, ketenteraman dan ketertiban masyarakat, kegiatan sosial kemasyarakatan
                            </p>
                            <b>Tupoksi Linmas : </b> <br>
                            <ol style="text-align: justify">
                                <li>
                                    Membantu dalam penanggulangan bencana.
                                </li>
                                <li>
                                    Membantu keamanan, ketenteraman dan ketertiban masyarakat.
                                </li>
                                <li>
                                    Membantu dalam kegiatan sosial kemasyarakatan.
                                </li>
                                <li>
                                    Membantu penanganan ketenteraman, ketertiban dan keamanan dalam penyelenggaraan pemilu.
                                </li>
                                <li>
                                    Membantu upaya pertahanan Negara.
                                </li>
                            </ol>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection