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
                        <h2 class="h3 mb-2 mt-4 page-title">Konsultasi Saya</h2>
                        <p>Lihat status konsultasi saya dan tunggu psikiater menghubungi saya</p>
                    </div>
                </div> <!-- /.col-12 -->
                <div class="row">
                    @foreach ($consultation as $item)
                        <div class="col-md-12 mb-4">
                            <div class="card profile shadow">
                                <div class="card-body my-4">
                                    <div class="row align-items-center">
                                        <div class="col-md-3 text-center mb-5">
                                            <a href="#!" class="avatar avatar-xl">
                                                <img src="{{ Storage::url($item->psikiater->image) }}" alt="..."
                                                    class="avatar-img rounded-circle">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center">
                                                <div class="col-md-7">
                                                    <h4 class="mb-1">{{ $item->psikiater->name }}</h4>
                                                </div>
                                                <div class="col">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-7">
                                                    <p class="text-muted"> {{ $item->psikiater->description }} </p>
                                                </div>
                                            </div>
                                            <strong><span class="small mb-0">Jam Layanan :
                                                    {{ date('h:i', strtotime($item->psikiater->buka)) . ' - ' . date('h:i', strtotime($item->psikiater->tutup)) . ' WIB' }}</span></strong>
                                            <div class="button-status pt-3">
                                                @if ($item->status == 'Pending')
                                                    <button type="button" class="btn btn-warning">Pending</button>
                                                @elseif($item->status == 'Selesai')
                                                    <button type="button" class="btn btn-success">Selesai</button>
                                                @endif
                                            </div>

                                        </div>
                                    </div> <!-- / .row- -->
                                </div> <!-- / .card-body - -->
                            </div> <!-- / .card- -->
                        </div> <!-- / .col- -->
                    @endforeach
                </div>
            </div> <!-- .row -->
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
@endsection
