@extends('layouts.admin')

@section('title', 'Setting Landing Page WESAVS')

@section('content')
    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="left-content">
                        <h2 class="h3 mb-2 mt-4 page-title">Setting Landing Page</h2>
                        <p>Pengatuan untuk Halaman Landing Page</p>
                    </div>
                </div> <!-- /.col-12 -->
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <form id="blogForm" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <h5>Pengaturan Dasar</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="hero-bg-one">Sampul</label>
                                                    <img src="{{ Storage::url($sectionOneHeroBg) }}" alt="..."
                                                        class="avatar-img rounded w-100"
                                                        style="object-fit: cover;max-width: 100%;height: auto;">
                                                    <input type="file" class="form-control mt-2" name="hero-bg-one"
                                                        id="hero-bg-one">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description-one">Deskripsi Web</label>
                                                    <textarea class="form-control" name="description-one" id="description-one" cols="30"
                                                        placeholder="Masukkan Deskripsi" rows="10">{{ $sectionOneDesc }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="location-four">Alamat</label>
                                                    <textarea class="form-control" name="location-four" id="location-four" cols="30" placeholder="Masukkan Alamat Anda"
                                                        rows="10">{{ $sectionFourLocation }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="number-four">Kontak</label>
                                                    <input type="text" class="form-control" name="number-four"
                                                        id="number-four" placeholder="Masukkan Kontak Anda"
                                                        value="{{ $sectionFourNumber }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email-four">Email</label>
                                                    <input type="text" class="form-control" name="email-four"
                                                        id="email-four" placeholder="Masukkan Email Anda"
                                                        value="{{ $sectionFourEmail }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .row -->
            <div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="blogModalLabel">Tambah Ebook</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="blogForm" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Cover</label>
                                    <input type="file" id="file" class="form-control" name="cover" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">File</label>
                                    <input type="file" id="file" class="form-control" name="file" required>
                                </div>
                                <div class="form-group">
                                    <label for="content">Sumber Ebook</label>
                                    <textarea id="content-add" name="source" class="form-control" id="content" cols="30" rows="10"
                                        placeholder="Masukkan sumber ebook" required></textarea>
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
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const blogForm = document.getElementById('blogForm');
            blogForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(blogForm);

                fetch(`landing/changeValue`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        Notiflix.Notify.success("Data setting berhasil disimpan!", {
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

@endsection
