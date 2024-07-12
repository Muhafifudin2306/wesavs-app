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
                                <strong class="card-title">Daftar Tugas</strong>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush my-n3">
                                    @foreach ($points as $item)
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-3 col-md-2 py-2">
                                                    <span class="circle circle-md bg-light">
                                                        <i class="fe fe-{{ $item->icon }} fe-24 text-primary"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <strong>{{ $item->title }}</strong>
                                                    <div class="my-0 text-muted small">{{ $item->desc }}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <strong>+{{ $item->point }} Point</strong>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
