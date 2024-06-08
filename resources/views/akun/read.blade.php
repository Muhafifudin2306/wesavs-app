@extends('layouts.admin')

@section('title', 'Profil Pengguna WESAVS')

@section('content')
    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h3 mb-2 mt-4 page-title">Profil Saya</h2>
                        <p>Lihat dan edit informasi akun anda</p>
                        <div class="row mt-5">
                            <div class="col-md-3 text-center mb-5">
                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('assets/avatars/avatar-1.jpg') }}" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <div class="text-field">
                                        <h4 class="mb-1">Muhammad Afifudin</h4>
                                        <div class="number-data">
                                            <span class="text-muted"> <i class="fe fe-phone fe-12 mx-1"></i>
                                                083866678086</span>
                                        </div>
                                        <div class="email-data">
                                            <span class="text-muted"> <i class="fe fe-mail fe-12 mx-1"></i>
                                                muhafifudin2306@gmail.com</span>
                                        </div>
                                    </div>
                                    <div class="button-field">
                                        <!-- Button trigger modal -->
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#editModal"><i
                                                class="fe fe-edit fe-12 text-white mx-1"></i>
                                            <span class="d-none d-md-inline">Edit Profil</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow">
                                <div class="card-body my-n3">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-md bg-light">
                                                <i class="fe fe-grid fe-24 text-primary"></i>
                                            </span>
                                        </div> <!-- .col -->
                                        <div class="col-9">
                                            <a href="#">
                                                <h3 class="h5 mt-4 mb-1">My Points</h3>
                                            </a>
                                            <p class="text-muted">Lihat poin saya dan tukarkan dengan hadiah menarik
                                            </p>
                                        </div> <!-- .col -->
                                    </div> <!-- .row -->
                                </div> <!-- .card-body -->
                                <div class="card-footer">
                                    <a href="" class="d-flex justify-content-between text-muted"><span>Jelajahi
                                            Point My Points</span><i class="fe fe-chevron-right"></i></a>
                                </div> <!-- .card-footer -->
                            </div> <!-- .card -->
                        </div> <!-- .col-md-->
                        <div class="col-md-4">
                            <div class="card mb-4 shadow">
                                <div class="card-body my-n3">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-md bg-light">
                                                <i class="fe fe-users fe-24 text-primary"></i>
                                            </span>
                                        </div> <!-- .col -->
                                        <div class="col">
                                            <a href="#">
                                                <h3 class="h5 mt-4 mb-1">Grup</h3>
                                            </a>
                                            <p class="text-muted">Jelajahi berbagai grup dan komunitas untuk memperluas
                                                koneksi
                                            </p>
                                        </div> <!-- .col -->
                                    </div> <!-- .row -->
                                </div> <!-- .card-body -->
                                <div class="card-footer">
                                    <a href="" class="d-flex justify-content-between text-muted"><span>Jelajahi
                                            Grup</span><i class="fe fe-chevron-right"></i></a>
                                </div> <!-- .card-footer -->
                            </div> <!-- .card -->
                        </div> <!-- .col-md-->
                        <div class="col-md-4">
                            <div class="card mb-4 shadow">
                                <div class="card-body my-n3">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-md bg-light">
                                                <i class="fe fe-file fe-24 text-primary"></i>
                                            </span>
                                        </div> <!-- .col -->
                                        <div class="col">
                                            <a href="#">
                                                <h3 class="h5 mt-4 mb-1">Tugas</h3>
                                            </a>
                                            <p class="text-muted">Jelajahi tugas dan dapatkan poin bonus dari setiap
                                                perkembangan
                                            </p>
                                        </div> <!-- .col -->
                                    </div> <!-- .row -->
                                </div> <!-- .card-body -->
                                <div class="card-footer">
                                    <a href="" class="d-flex justify-content-between text-muted"><span>Jelajahi
                                            Tugas</span><i class="fe fe-chevron-right"></i></a>
                                </div> <!-- .card-footer -->
                            </div> <!-- .card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow">
                                <div class="card-body my-n3">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-md bg-light">
                                                <i class="fe fe-phone fe-24 text-primary"></i>
                                            </span>
                                        </div> <!-- .col -->
                                        <div class="col">
                                            <a href="#">
                                                <h3 class="h5 mt-4 mb-1">Hubungi Kami</h3>
                                            </a>
                                            <p class="text-muted">Berkomunikasi dengan kami secara langsung melalui
                                                whatsapp
                                            </p>
                                        </div> <!-- .col -->
                                    </div> <!-- .row -->
                                </div> <!-- .card-body -->
                                <div class="card-footer">
                                    <a href="" class="d-flex justify-content-between text-muted"><span>Jelajahi
                                            Hubungi Kami</span><i class="fe fe-chevron-right"></i></a>
                                </div> <!-- .card-footer -->
                            </div> <!-- .card -->
                        </div> <!-- .col-md-->
                    </div> <!-- .row-->
                </div> <!-- /.col-12 -->
            </div> <!-- .row -->

            <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Lengkap</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Telpon</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div> <!-- .container-fluid -->
@endsection
