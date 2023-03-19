@extends('UserPages.master')
@section('title')
    (Nama Produk)
@endsection
@section('content')
    <div class="container">
        <div class="row p-2">
            <div class="col-md-6 mb-3 mb-md-0">
                <img src="{{ asset('img/produk-umkm.png') }}" class="d-block mx-auto" style="max-width:20rem" alt="foto-produk" >
            </div>
            <div class="col-md-6 align-self-center">
                <h4>Gulsus</h4>
                <h5>Rp 25,000</h5>
                <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia quaerat a excepturi laboriosam beatae et atque? Quaerat ut esse quidem nihil minima magni, quae nisi beatae maxime vel, laborum odit?</p>
                <div class="card">
                    <div class="card-header">
                        <p>Info Penjual</p>
                    </div>
                    <div class="d-flex gap-5 p-2">
                        <a class="text-success" href="">
                            <i class='bx bxl-whatsapp fs-icon'></i>
                        </a>
                        <p>Alamat : Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid, deserunt.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection