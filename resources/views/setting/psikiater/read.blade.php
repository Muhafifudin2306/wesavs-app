@extends('layouts.admin')

@section('title', 'Setting Psikiater WESAVS')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">

    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="left-content">
                        <h2 class="h3 mb-2 mt-4 page-title">Setting Psikiater</h2>
                        <p>Pengatuan untuk mengatur konten Psikiater</p>
                    </div>
                    <div class="right-content">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#blogModal"> <i
                                class="fe fe-plus fe-16"></i> Tambah</button>
                    </div>
                </div> <!-- /.col-12 -->
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th><strong>No</strong></th>
                                            <th><strong>Gambar Psikiater</strong></th>
                                            <th><strong>Deskripsi</strong></th>
                                            <th><strong>Jumlah Entry</strong></th>
                                            <th><strong>Jam Layanan</strong></th>
                                            <th><strong>Aksi</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($psikiater as $item)
                                            <tr>
                                                <th>{{ $no++ }}</th>
                                                <th>
                                                    <div class="avatar">
                                                        <img src="{{ Storage::url($item->image) }}" alt="..."
                                                            class="avatar-img rounded" width="200">
                                                    </div>
                                                </th>
                                                <th>
                                                    <p class="font-weight-bold">{{ $item->name }}</p>
                                                    <p>{{ $item->user->email }}</p>
                                                    <hr>
                                                    {{ $item->description }}
                                                </th>
                                                <td>{{ $item->entry }}</td>
                                                <td>{{ date('h:i', strtotime($item->buka)) . ' - ' . date('h:i', strtotime($item->tutup)) . ' WIB' }}
                                                </td>
                                                <th>
                                                    <div class="d-flex">
                                                        <div class="left-button">
                                                            <i class="fe fe-edit mx-1 fe-16 text-warning cursor-pointer"
                                                                data-toggle="modal"
                                                                data-target="#blogEditModal-{{ $item->id }}"></i>
                                                        </div>
                                                        <div class="right-button">
                                                            <i class="fe fe-trash blog-delete mx-1 fe-16 text-danger cursor-pointer"
                                                                data-card-id="{{ $item->id }}"></i>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .row -->
            <div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="blogModalLabel">Tambah Psikiater</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="blogForm" enctype="multipart/form-data">
                            <div class="modal-body">
                                <h6 class="py-3">Informasi Akun</h6>
                                <div class="form-group">
                                    <label for="email">Email Psikiater</label>
                                    <input type="email" class="form-control" id="inputEmail" value="{{ old('email') }}"
                                        name="email" placeholder="example@gmail.com" required autocomplete="email">
                                </div>
                                <div class="form-group">
                                    <label for="email">Password</label>
                                    <input type="password" name="password" required autocomplete="new-password"
                                        placeholder="******" class="form-control" id="inputPassword6" id="password-confirm">
                                </div>
                                <h6 class="py-3">Informasi Umum</h6>
                                <div class="form-group">
                                    <label for="image">Gambar Psikiater</label>
                                    <input type="file" id="image" class="form-control" name="image" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Psikiater</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Psikiater"
                                        name="name" id="name" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="buka">Jam Buka</label>
                                            <input type="time" class="form-control" name="buka" id="buka"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tutup">Jam Tutup</label>
                                            <input type="time" class="form-control" placeholder="Masukkan Nama Psikiater"
                                                name="tutup" id="tutup" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="entry">Jumlah Kuota Dalam Sehari</label> <span>
                                        <div class="fe"></div>
                                    </span>
                                    <input type="number" min="1" class="form-control"
                                        placeholder="Masukkan Jumlah Kuota" name="entry" id="entry" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi Psikiater</label>
                                    <textarea id="content-add" name="description" class="form-control" cols="30" rows="10"
                                        placeholder="Masukkan deskripsi Psikiater" required></textarea>
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
            @foreach ($psikiater as $item)
                <div class="modal fade" id="blogEditModal-{{ $item->id }}" tabindex="-1"
                    aria-labelledby="blogModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="blogModalLabel">Edit Psikiater</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="update-form" data-action="{{ url('/setting/psikiater/update/' . $item->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <h6 class="py-3">Informasi Akun</h6>
                                    <div class="form-group">
                                        <label for="email">Email Psikiater</label>
                                        <input type="email" class="form-control" id="inputEmail"
                                            value="{{ $item->user->email }}" name="email"
                                            placeholder="example@gmail.com" required autocomplete="email">
                                    </div>
                                    <h6 class="py-3">Informasi Umum</h6>
                                    <div class="form-group">
                                        <img src="{{ Storage::url($item->image) }}" alt="..."
                                            class="avatar-img rounded w-100">
                                        <label for="image">Gambar Psikiater</label>
                                        <input type="file" id="image" class="form-control" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Psikiater</label>
                                        <input type="text" value="{{ $item->name }}" class="form-control"
                                            placeholder="Masukkan Nama Psikiater" name="name" id="name" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="buka">Jam Buka</label>
                                                <input type="time" value="{{ $item->buka }}" class="form-control"
                                                    name="buka" id="buka" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tutup">Jam Tutup</label>
                                                <input type="time" value="{{ $item->tutup }}" class="form-control"
                                                    name="tutup" id="tutup" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="entry">Jumlah Kuota Dalam Sehari</label>
                                        <input type="text" value="{{ $item->entry }}" class="form-control"
                                            placeholder="Masukkan entry Psikiater" name="entry" id="entry"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Deskripsi Psikiater</label>
                                        <textarea name="description" class="form-control" cols="30" rows="10"
                                            placeholder="Masukkan Deskripsi Psikiater" required>{{ $item->description }}</textarea>
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
    <script src='{{ asset('js/jquery.dataTables.min.js') }}'></script>
    <script src='{{ asset('js/dataTables.bootstrap4.min.js') }}'></script>

    <script>
        const deleteCredit = document.querySelectorAll('.blog-delete');

        deleteCredit.forEach(button => {
            button.addEventListener('click', function() {
                const cardId = button.dataset.cardId;

                Notiflix.Confirm.show('Konfirmasi', 'Apakah Anda yakin ingin menghapus data ini?', 'Ya',
                    'Batal',
                    function() {
                        fetch(`psikiater/delete/${cardId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                Notiflix.Notify.success("Data Psikiater berhasil dihapus!", {
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const blogForm = document.getElementById('blogForm');
            blogForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(blogForm);

                fetch(`psikiater/storePsikiater`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        Notiflix.Notify.success("Data Psikiater berhasil dibuat!", {
                            timeout: 3000
                        });
                        location.reload();
                    })
                    .catch(error => {
                        Notiflix.Notify.failure('Error:', error);
                    });
            });
        });
    </script>
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
    <script>
        $('#dataTable-1').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
    </script>

@endsection
