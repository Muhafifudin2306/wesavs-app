@extends('layouts.admin')

@section('title', 'Setting Tugas WESAVS')

@section('content')
    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h3 mb-2 mt-4 page-title">Manajemen Tugas</h2>
                        <p>Atur tugas dan jumlah poin yang didapatkan peserta!</p>
                    </div>
                </div> <!-- /.col-12 -->
                <div class="row mb-4">
                    <div class="col-md-9 mb-4">
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
                                                <div class="col-auto">
                                                    <button type="button" class="btn btn-outline-warning"
                                                        data-toggle="modal" data-target="#editModal-{{ $item->id }}">
                                                        <i class="fe fe-edit fe-16 mx-1"></i> Edit Point
                                                    </button>
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
            <!-- Modal -->
            @foreach ($points as $item)
                <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $item->title }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="update-form" data-action="{{ url('setting/tugas/updateData/' . $item->id) }}"
                                method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="point">Point</label>
                                        <input type="number" class="form-control" name="point" id="point"
                                            value="{{ $item->point }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
