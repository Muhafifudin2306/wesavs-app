@extends('layouts.admin')

@section('title', 'Konsultasi Psikiater WESAVS')

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
                    @foreach ($psikiater as $item)
                        <div class="col-md-12 mb-4">
                            <div class="card profile shadow">
                                <div class="card-body my-4">
                                    <div class="row align-items-center">
                                        <div class="col-md-3 text-center mb-5">
                                            <a href="#!" class="avatar avatar-xl">
                                                <img src="{{ Storage::url($item->image) }}" alt="..."
                                                    class="avatar-img rounded-circle">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center">
                                                <div class="col-md-7">
                                                    <h4 class="mb-1">{{ $item->name }}</h4>
                                                </div>
                                                <div class="col">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-7">
                                                    <p class="text-muted"> {{ $item->description }} </p>
                                                </div>
                                                <div class="col">
                                                    <p class="small mb-0">Kuota Peserta Layanan :
                                                        {{ $item->entry }} peserta/hari</p>
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-md-7 mb-2">
                                                    <strong><span class="small mb-0">Jam Layanan :
                                                            {{ date('h:i', strtotime($item->buka)) . ' - ' . date('h:i', strtotime($item->tutup)) . ' WIB' }}</span></strong>
                                                </div>
                                                <div class="col mb-2">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#blogEditModal-{{ $item->id }}">Order
                                                        Layanan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- / .row- -->
                                </div> <!-- / .card-body - -->
                            </div> <!-- / .card- -->
                        </div> <!-- / .col- -->
                    @endforeach
                </div>
            </div> <!-- .row -->
            @foreach ($psikiater as $item)
                <div class="modal fade" id="blogEditModal-{{ $item->id }}" tabindex="-1"
                    aria-labelledby="blogModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="blogModalLabel">Order Layanan Psikiater</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="update-form" data-action="{{ url('/consultation/storeOrder') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Nama Psikiater</label>
                                        <select name="id_psikiater" class="form-control" id="" required>
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Telpon Anda</label>
                                        <input type="text" name="number" class="form-control"
                                            value="{{ Auth::user()->number }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="entry">Tanggal Pemesanan</label>
                                        <input type="date" class="form-control" name="date" id="entry" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="problem">Deskripsi Masalah</label>
                                        <textarea name="problem" class="form-control" cols="30" rows="10" placeholder="Masukkan Deskripsi Psikiater"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                            Notiflix.Notify.success("Data berhasil diperbarui!", {
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
