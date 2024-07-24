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
                </div>
            </div> <!-- .row -->
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')

@endsection
