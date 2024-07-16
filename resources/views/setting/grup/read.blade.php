@extends('layouts.admin')

@section('title', 'Setting Grup WESAVS')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="left-content">
                        <h2 class="h3 mb-2 mt-4 page-title">Setting Grup</h2>
                        <p>Pengatuan untuk menambah, mengedit, dan menghapus grup</p>
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
                                            <th><strong>Gambar Grup</strong></th>
                                            <th><strong>Nama Grup</strong></th>
                                            <th><strong>Deskripsi Grup</strong></th>
                                            <th><strong>Lokasi</strong></th>
                                            <th><strong>Aksi</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($grups as $item)
                                            <tr>
                                                <th>{{ $no++ }}</th>
                                                <th>
                                                    <div class="avatar">
                                                        <img src="{{ Storage::url($item->image) }}" alt="..."
                                                            class="avatar-img rounded" width="200">
                                                    </div>
                                                </th>
                                                <th>{{ $item->name }}</th>
                                                <th>
                                                    {{ $item->description }}
                                                </th>
                                                <td>
                                                    {{ $item->provinsi . ',' . ' ' . $item->negara }}
                                                </td>
                                                <th>
                                                    <div class="d-flex">
                                                        <div class="left-button">
                                                            <i class="fe fe-edit mx-1 fe-16 text-warning cursor-pointer"
                                                                data-toggle="modal"
                                                                data-target="#blogEditModal-{{ $item->id }}"></i>
                                                        </div>
                                                        <div class="right-button">
                                                            <i
                                                                class="fe fe-trash blog-delete mx-1 fe-16 text-danger cursor-pointer"data-card-id="{{ $item->id }}"></i>
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
                            <h5 class="modal-title" id="blogModalLabel">Tambah Grup</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="grupForm" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="image">Gambar Grup</label>
                                    <input type="file" id="image" class="form-control" name="image" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Grup</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Grup"
                                        name="name" id="name" required>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="provinsi">Provinsi</label>
                                            <input type="text" class="form-control" placeholder="Masukkan Provinsi"
                                                name="provinsi" id="provinsi" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="negara">Negara</label>
                                            <input type="text" class="form-control" placeholder="Masukkan Negara"
                                                name="negara" id="negara" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="content-add">Deskripsi Grup</label>
                                    <textarea name="description" class="form-control" cols="2 0" rows="10" placeholder="Masukkan deskripsi grup"
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
            @foreach ($grups as $item)
                <div class="modal fade" id="blogEditModal-{{ $item->id }}" tabindex="-1"
                    aria-labelledby="blogModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="blogModalLabel">Edit Blog</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="update-form" data-action="{{ url('/setting/grup/update/' . $item->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="image">Gambar Grup</label>
                                        <input type="file" id="image" class="form-control" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Grup</label>
                                        <input type="text" class="form-control" value="{{ $item->name }}"
                                            name="name" id="name" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="provinsi">Provinsi</label>
                                                <input type="text" class="form-control" value="{{ $item->provinsi }}"
                                                    name="provinsi" id="provinsi" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="negara">Negara</label>
                                                <input type="text" class="form-control" value="{{ $item->negara }}"
                                                    name="negara" id="negara" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-add">Deskripsi Grup</label>
                                        <textarea name="description" class="form-control" cols="2 0" rows="10"
                                            placeholder="Masukkan deskripsi grup" required>{{ $item->description }} </textarea>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content-add').summernote();
            // $('#content-edit').summernote();
        });
    </script>

    <script>
        const deleteCredit = document.querySelectorAll('.blog-delete');

        deleteCredit.forEach(button => {
            button.addEventListener('click', function() {
                const cardId = button.dataset.cardId;

                Notiflix.Confirm.show('Konfirmasi', 'Apakah Anda yakin ingin menghapus data ini?', 'Ya',
                    'Batal',
                    function() {
                        fetch(`grup/delete/${cardId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                Notiflix.Notify.success("Data Grup berhasil dihapus!", {
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
            const grupForm = document.getElementById('grupForm');
            grupForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(grupForm);

                fetch(`grup/storeGrup`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        Notiflix.Notify.success("Data grup berhasil dibuat!", {
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
