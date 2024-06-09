@extends('layouts.admin')

@section('title', 'Tugas WESAVS')

@section('content')
    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h3 mb-2 mt-4 page-title">Tugas</h2>
                        <p>Selesaikan tugas dan dapatkan poin!</p>
                    </div>
                </div> <!-- /.col-12 -->
                <div class="row mb-4">
                    <div class="col-md-7 mb-4">
                        <div class="card shadow">
                            <div class="card-header py-3 my-2">
                                <strong class="card-title">Tugas Terbaru</strong>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush my-n3">
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-3 col-md-2 py-2">
                                                <span class="circle circle-md bg-light">
                                                    <i class="fe fe-user fe-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <strong>Selamat Datang di aplikasi WESAVS</strong>
                                                <div class="my-0 text-muted small">Dapatkan poin untuk user yang baru
                                                    mendaftar</div>
                                            </div>
                                            <div class="col-auto">
                                                <strong>+30 Point</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-3 col-md-2 py-2">
                                                <span class="circle circle-md bg-light">
                                                    <i class="fe fe-refresh-cw fe-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <strong>Terus terhubung dengan aplikasi WESAVS</strong>
                                                <div class="my-0 text-muted small">Login akun anda dan dapatkan poin</div>
                                            </div>
                                            <div class="col-auto">
                                                <strong>+10 Point</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-3 col-md-2 py-2">
                                                <span class="circle circle-md bg-light">
                                                    <i class="fe fe-mail fe-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <strong>Suarakan pendapatmu di grup dan forum</strong>
                                                <div class="my-0 text-muted small">Mengirim 1 pesan di grup dan dapatkan
                                                    poin</div>
                                            </div>
                                            <div class="col-auto">
                                                <strong>+3 Point</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- / .list-group -->
                            </div> <!-- / .card-body -->
                        </div> <!-- / .card -->
                    </div> <!-- / .col-md-3 -->
                </div>
            </div> <!-- .row -->
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')

@endsection
