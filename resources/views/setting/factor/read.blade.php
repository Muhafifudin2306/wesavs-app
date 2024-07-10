@extends('layouts.admin')

@section('title', 'Setting Factor WESAVS')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="left-content">
                        <h2 class="h3 mb-2 mt-4 page-title">Setting Faktor</h2>
                        <p>Pengatuan untuk mengatur konten dalam Faktor</p>
                    </div>
                    <div class="right-content d-flex">
                        @if ($factor)
                            <button data-toggle="modal" data-target="#FactorEditModal-{{ $factor->id }}" type="button"
                                class="btn btn-warning mx-1">Edit</button>
                            <button type="button" class="btn Factor-delete btn-danger"
                                data-card-id="{{ $factor->id }}">Delete</button>
                        @else
                            <button class="btn btn-primary" data-toggle="modal" data-target="#FactorModal"> <i
                                    class="fe fe-plus fe-16"></i> Tambah</button>
                        @endif
                    </div>

                </div> <!-- /.col-12 -->
                @if (!$factor)
                    <div class="row my-4">
                        <div class="col-md-12">
                            <div class="alert alert-info text-center">
                                Konten Faktor-Faktor Belum Dibuat
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    {!! $factor->content !!}
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                @endif

            </div> <!-- .row -->
            <div class="modal fade" id="FactorModal" tabindex="-1" aria-labelledby="FactorModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="FactorModalLabel">Tambah Faktor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="factorForm">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="content">Konten Faktor-Faktor</label>
                                    <textarea id="content-add" name="content" class="form-control" id="content" cols="30" rows="10"
                                        placeholder="Masukkan konten factor" required></textarea>
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
            @if ($factor)
                <div class="modal fade" id="FactorEditModal-{{ $factor->id }}" tabindex="-1"
                    aria-labelledby="FactorModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="FactorModalLabel">Edit Faktor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="update-form" data-action="{{ url('/setting/factor/update/' . $factor->id) }}"
                                method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="content">Konten Faktor-Faktor</label>
                                        <textarea id="content-edit" name="content" class="form-control" cols="30" rows="10"
                                            placeholder="Masukkan konten Factor" required>{{ $factor->content }}</textarea>
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
            @endif
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        const deleteCredit = document.querySelectorAll('.Factor-delete');

        deleteCredit.forEach(button => {
            button.addEventListener('click', function() {
                const cardId = button.dataset.cardId;

                Notiflix.Confirm.show('Konfirmasi', 'Apakah Anda yakin ingin menghapus data ini?', 'Ya',
                    'Batal',
                    function() {
                        fetch(`factor/delete/${cardId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                Notiflix.Notify.success("Data Factor berhasil dihapus!", {
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
        $(document).ready(function() {
            $('#content-add').summernote();
            $('#content-edit').summernote();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const factorForm = document.getElementById('factorForm');
            factorForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(factorForm);

                fetch(`factor/storeFactor`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        Notiflix.Notify.success("Data Faktor berhasil dibuat!", {
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
