@extends('layouts.admin')

@section('title', 'Setting Hadiah WESAVS')

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
                        <h2 class="h3 mb-2 mt-4 page-title">Setting Hadiah</h2>
                        <p>Pengatuan untuk mengatur konten hadiah</p>
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
                                            <th><strong>Gambar Hadiah</strong></th>
                                            <th><strong>Deskripsi</strong></th>
                                            <th><strong>Jumlah Point</strong></th>
                                            <th><strong>Dibuat Pada</strong></th>
                                            <th><strong>Aksi</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($gift as $item)
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
                                                    <hr>
                                                    {!! $item->description !!}
                                                </th>
                                                <td>
                                                    {{ $item->updated_at->format('d F Y') }}
                                                </td>
                                                <td>{{ $item->point }}</td>
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
                            <h5 class="modal-title" id="blogModalLabel">Tambah Hadiah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="blogForm" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Gambar Hadiah</label>
                                    <input type="file" id="file" class="form-control" name="cover" required>
                                </div>
                                <div class="form-group">
                                    <label for="title">Nama Hadiah</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Judul Blog"
                                        name="title" id="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="title">Jumlah Point</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Judul Blog"
                                        name="title" id="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="content">Deskripsi Hadiah</label>
                                    <textarea id="content-add" name="content" class="form-control" id="content" cols="30" rows="10"
                                        placeholder="Masukkan konten blog" required></textarea>
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
            @foreach ($gift as $item)
                <div class="modal fade" id="blogEditModal-{{ $item->id }}" tabindex="-1"
                    aria-labelledby="blogModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="blogModalLabel">Edit Hadiah</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="update-form" data-action="{{ url('/setting/home/update/' . $item->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <img src="{{ Storage::url($item->image) }}" alt="..."
                                            class="avatar-img rounded w-100">
                                        <label for="name">Gambar Hadiah</label>
                                        <input type="file" id="file" class="form-control" name="cover">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Nama Hadiah</label>
                                        <input type="text" value="{{ $item->name }}" class="form-control"
                                            placeholder="Masukkan Judul Blog" name="title" id="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Jumlah Point</label>
                                        <input type="text" value="{{ $item->point }}" class="form-control"
                                            placeholder="Masukkan Judul Blog" name="title" id="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Deskripsi Hadiah</label>
                                        <textarea id="content-edit" name="content" class="form-control" cols="30" rows="10"
                                            placeholder="Masukkan konten blog" required>{{ $item->description }}</textarea>
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
            $('#content-edit').summernote();
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
                        fetch(`home/delete/${cardId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                Notiflix.Notify.success("Data Blog berhasil dihapus!", {
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

                fetch(`home/storeBlog`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        Notiflix.Notify.success("Data blog berhasil dibuat!", {
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
