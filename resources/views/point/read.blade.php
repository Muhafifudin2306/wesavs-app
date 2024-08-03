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
                        <h2 class="h3 mb-2 mt-4 page-title">My Point</h2>
                        <p>Tukarkan poin anda dengan hadiah dan merchandise menarik di sini!</p>
                    </div>
                </div> <!-- /.col-12 -->
                <div class="row">
                    <div class="col-md-5">
                        <div class="card p-4 bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="content-panel">
                                    <div class="point-panel mb-3">
                                        <h2>{{ $myPoint }} Point</h2>
                                        <h6 class="text-muted">Total Point Didapatkan</h6>
                                    </div>
                                    <div class="exp-panel">
                                        <button class="btn btn-danger"><small>expired:
                                                {{ $endOfYear->format('d-m-Y') }}</small> </button>
                                    </div>
                                </div>
                                <div class="icon-panel">
                                    <i class="fe fe-award fe-64 text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
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
