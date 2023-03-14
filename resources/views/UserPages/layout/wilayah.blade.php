@extends('UserPages.master')
@section('title')
    Wilayah
@endsection
@push('css')
    <style>
        .jumbotron{
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 0%, rgba(1,192,231,0.2862394957983193) 0%);
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="container mb-4">
            <div class="card p-2 jumbotron">
                <h4 class="text-center">Data Informasi Wilayah</h4>
                <hr>
                <div class="text-center mb-4 d-block d-md-none">
                    <span class="fs-1" id="count1m"></span><span>Ha</span>
                     <p>Luas Wilayah</p>
                </div>
                        
                <div class="row mb-3 p-3">
                    <div class="col-md-3 text-center d-none d-md-block">
                        <span class="fs-1" id="count1d"></span><span class="fs-6">Ha</span>
                        <p>Luas Wilayah</p>
                    </div>
                    <div class="col-4 col-md-3  text-center">
                        <span class="fs-1 " id="count2"></span>
                        <p>Dusun</p>
                    </div>
                    <div class="col-4 col-md-3 text-center">
                        <span class="fs-1 " id="count3"></span>
                        <p>RW</p>
                    </div>
                    <div class="col-4 col-md-3 text-center">
                        <span class="fs-1" id="count4">90</span>
                        <p>RT</p>
                    </div>
                </div>
            </div>
        </div>
                <h4 class="text-center mt-4">Peta Wilayah Desa Sukaharja</h4>
                <br>
                <div class="row mt-4">
                    <div class="col-md-7 mb-4 mb-md-0" style="max-width:60rem; height:20rem">
                        <iframe class="d-md-block mx-md-auto overflow-scroll" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15862.250198285246!2d107.28303517407777!3d-6.321044926806237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6977d5bd5bec8d%3A0xafd7f683b9fbbf79!2sSukaharja%2C%20Telukjambe%20Timur%2C%20Karawang%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1678723213178!5m2!1sen!2sid"  frameborder="0" width="100%" height="100%"  loading="lazy"></iframe>
                    </div>
                    <div class="col-md-5">
                        <p class=" d-flex align-items-center justify-content-center" style="text-align: justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi assumenda at suscipit libero, pariatur dignissimos accusantium magnam ratione eaque quis ut tempore veniam excepturi, itaque maiores sunt perspiciatis necessitatibus eveniet.</p>
                    </div>
                   
                </div>
    </div>
@endsection
@push('js')
<script>
   document.addEventListener("DOMContentLoaded", () => {
 function counter(id, start, end, duration) {
  let obj = document.getElementById(id),
   current = start,
   range = end - start,
   increment = end > start ? 1 : -1,
   step = Math.abs(Math.floor(duration / range)),
   timer = setInterval(() => {
    current += increment;
    obj.textContent = current;
    if (current == end) {
     clearInterval(timer);
    }
   }, step);
 }
 counter("count1m", 1000, 1500, 3000);
 counter("count1d", 1000, 1500, 3000);
 counter("count2", 0, 7, 3000);
 counter("count3", 0, 10, 3000);
 counter("count4", 0, 90, 3000);
});
</script>
@endpush