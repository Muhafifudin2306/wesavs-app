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
                                                    <div class="d-inline d-md-none">
                                                        <strong>+{{ $item->point }} Point</strong>
                                                    </div>
                                                </div>
                                                <div class="col-auto d-none d-md-inline">
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

                <h2 class="h3 mb-2 page-title">Tukarkan Poin Saya</h2>

                <div class="row">
                    @foreach ($gifts as $item)
                        <div class="col-md-4">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="mt-2">
                                        <a href="">
                                            <img src="{{ Storage::url($item->image) }}" alt="..."
                                                class="avatar-img rounded w-100">
                                        </a>
                                    </div>
                                    <div class="card-text my-1">
                                        <h5 class="mt-3 mb-2">
                                            <strong class="card-title my-0">{{ $item->name }}</strong>
                                        </h5>
                                        <p class="small"><span>{!! $item->description !!}</span></p>
                                    </div>
                                </div> <!-- ./card-text -->
                                <div class="card-footer">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto">
                                            <small>
                                                <span class="dot dot-lg bg-success mr-1"></span> {{ $item->point }} Point
                                            </small>
                                        </div>
                                        <div class="col-auto">
                                            <div class="file-action">
                                                @if ($myPoint >= $item->point)
                                                    <button class="btn btn-info" data-toggle="modal"
                                                        data-target="#giftModal-{{ $item->id }}">Tukarkan Poin</button>
                                                @else
                                                    <button class="btn btn-secondary" disabled> Poin Belum Cukup</button>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.card-footer -->
                            </div>
                        </div> <!-- .col -->
                    @endforeach
                </div> <!-- .row -->
            </div> <!-- .row -->
            @foreach ($gifts as $item)
                <div class="modal fade" id="giftModal-{{ $item->id }}" tabindex="-1" aria-labelledby="blogModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="blogModalLabel">Tukarkan Poin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="update-form" data-action="{{ url('order/add/' . $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="mt-2">
                                                    <a href="">
                                                        <img src="{{ Storage::url($item->image) }}" alt="..."
                                                            class="avatar-img rounded w-100">
                                                    </a>
                                                </div>
                                                <div class="card-text my-1">
                                                    <h5 class="mt-3 mb-2">
                                                        <strong class="card-title my-0">{{ $item->name }}</strong>
                                                    </h5>
                                                    <p class="small"><span>{!! $item->description !!}</span></p>
                                                    <small>
                                                        <span class="dot dot-lg bg-success mr-1"></span>
                                                        {{ $item->point }} Point
                                                    </small>
                                                </div>
                                            </div> <!-- ./card-text -->

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Nama Penerima</label>
                                                <input type="text" value="{{ Auth::user()->name }}" class="form-control"
                                                    placeholder="Masukkan Nama" name="name" id="name" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Nomor WA Penerima</label>
                                                <input type="text" value="{{ Auth::user()->number }}"
                                                    class="form-control" placeholder="Masukkan Nomor" name="number"
                                                    id="number" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Alamat Tujuan</label>
                                                <textarea id="content-edit" name="location" class="form-control" cols="30" rows="10"
                                                    placeholder="Masukkan alamat" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Order Sekarang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const updateForms = document.querySelectorAll('.update-form');

            updateForms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    const formData = new FormData(form);

                    fetch(form.getAttribute('data-action'), {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            Notiflix.Notify.success("Pemesanan Berhasil!", {
                                timeout: 3000
                            });

                            location.reload();
                        })
                        .catch(error => {
                            Notiflix.Notify.failure('Error:', error);
                        });
                });
            });
        });
    </script>
@endsection
