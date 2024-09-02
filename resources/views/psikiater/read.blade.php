@extends('layouts.admin')

@section('title', 'Ebook WESAVS')

@section('content')
    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h3 mb-2 mt-4 page-title">Layanan Konsultasi</h2>
                        <p>Cari psikiater favorit anda dan mulai berkonsultasi di waktu yang tertera</p>
                    </div>
                </div> <!-- /.col-12 -->
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card profile shadow">
                            <div class="card-body my-4">
                                <div class="row align-items-center">
                                    <div class="col-md-3 text-center mb-5">
                                        <a href="#!" class="avatar avatar-xl">
                                            <img src="./assets/avatars/face-3.jpg" alt="..."
                                                class="avatar-img rounded-circle">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <div class="row align-items-center">
                                            <div class="col-md-7">
                                                <h4 class="mb-1">Muhammad Afifudin, S.Kom</h4>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-7">
                                                <p class="text-muted"> Professional dalam pembuatan aplikasi berbasis
                                                    website dan mobile </p>
                                            </div>
                                            <div class="col">
                                                <p class="small mb-0">Kuota Peserta Layanan : </p>
                                                <p class="small mb-0">2 dari 5 kuota peserta telah terpenuhi</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-7 mb-2">
                                                <strong><span class="small mb-0">Jam Layanan : 09.00 - 12.00
                                                        WIB</span></strong>
                                            </div>
                                            <div class="col mb-2">
                                                <button type="button" class="btn btn-primary">Konsultasi Sekarang</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- / .row- -->
                            </div> <!-- / .card-body - -->
                        </div> <!-- / .card- -->
                    </div> <!-- / .col- -->
                </div>
            </div> <!-- .row -->
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
@endsection
