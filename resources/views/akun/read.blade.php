@extends('layouts.admin')

@section('title', 'Profil Pengguna WESAVS')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

    <style>
        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }
    </style>


    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h3 mb-2 mt-4 page-title">Profil Saya</h2>
                        <p>Lihat dan edit informasi akun anda</p>
                        <div class="row mt-5">
                            <div class="col-md-3 text-center mb-5">
                                <div class="avatar">
                                    @if (Auth::user()->image == null)
                                        <img id="profile-image" src="{{ asset('assets/avatars/avatar-1.jpg') }}"
                                            alt="..." class="avatar-img rounded-circle w-100">
                                    @else
                                        <img id="profile-image" src="{{ asset('upload/profile' . $userId->image) }}"
                                            alt="..." class="avatar-img rounded-circle w-100">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <div class="text-field">
                                        <h4 class="mb-1">{{ $userId->name }}</h4>
                                        <div class="number-data">
                                            <span class="text-muted"> <i class="fe fe-phone fe-12 mx-1"></i>
                                                {{ $userId->number ? $userId->number : 'Belum Diatur' }}</span>
                                        </div>
                                        <div class="email-data">
                                            <span class="text-muted"> <i class="fe fe-mail fe-12 mx-1"></i>
                                                {{ $userId->email }}</span>
                                        </div>
                                    </div>
                                    <div class="button-field">
                                        <!-- Button trigger modal -->
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#editModal"><i
                                                class="fe fe-edit fe-12 text-white mx-1"></i>
                                            <span class="d-none d-md-inline">Edit Profil</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow">
                                <div class="card-body my-n3">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-md bg-light">
                                                <i class="fe fe-grid fe-24 text-primary"></i>
                                            </span>
                                        </div> <!-- .col -->
                                        <div class="col-9">
                                            <a href="{{ url('point') }}">
                                                <h3 class="h5 mt-4 mb-1">My Points</h3>
                                            </a>
                                            <p class="text-muted">Lihat poin saya dan tukarkan dengan hadiah menarik
                                            </p>
                                        </div> <!-- .col -->
                                    </div> <!-- .row -->
                                </div> <!-- .card-body -->
                                <div class="card-footer">
                                    <a href="{{ url('point') }}"
                                        class="d-flex justify-content-between text-muted"><span>Jelajahi
                                            Point My Points</span><i class="fe fe-chevron-right"></i></a>
                                </div> <!-- .card-footer -->
                            </div> <!-- .card -->
                        </div> <!-- .col-md-->
                        <div class="col-md-4">
                            <div class="card mb-4 shadow">
                                <div class="card-body my-n3">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-md bg-light">
                                                <i class="fe fe-users fe-24 text-primary"></i>
                                            </span>
                                        </div> <!-- .col -->
                                        <div class="col">
                                            <a href="{{ url('/grup') }}">
                                                <h3 class="h5 mt-4 mb-1">Grup</h3>
                                            </a>
                                            <p class="text-muted">Jelajahi berbagai grup dan komunitas untuk memperluas
                                                koneksi
                                            </p>
                                        </div> <!-- .col -->
                                    </div> <!-- .row -->
                                </div> <!-- .card-body -->
                                <div class="card-footer">
                                    <a href="{{ url('/grup') }}"
                                        class="d-flex justify-content-between text-muted"><span>Jelajahi
                                            Grup</span><i class="fe fe-chevron-right"></i></a>
                                </div> <!-- .card-footer -->
                            </div> <!-- .card -->
                        </div> <!-- .col-md-->
                        <div class="col-md-4">
                            <div class="card mb-4 shadow">
                                <div class="card-body my-n3">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-md bg-light">
                                                <i class="fe fe-file fe-24 text-primary"></i>
                                            </span>
                                        </div> <!-- .col -->
                                        <div class="col">
                                            <a href="{{ url('/tugas') }}">
                                                <h3 class="h5 mt-4 mb-1">Tugas</h3>
                                            </a>
                                            <p class="text-muted">Jelajahi tugas dan dapatkan poin bonus dari setiap
                                                perkembangan
                                            </p>
                                        </div> <!-- .col -->
                                    </div> <!-- .row -->
                                </div> <!-- .card-body -->
                                <div class="card-footer">
                                    <a href="{{ url('/tugas') }}"
                                        class="d-flex justify-content-between text-muted"><span>Jelajahi
                                            Tugas</span><i class="fe fe-chevron-right"></i></a>
                                </div> <!-- .card-footer -->
                            </div> <!-- .card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow">
                                <div class="card-body my-n3">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-md bg-light">
                                                <i class="fe fe-phone fe-24 text-primary"></i>
                                            </span>
                                        </div> <!-- .col -->
                                        <div class="col">
                                            <a href="#">
                                                <h3 class="h5 mt-4 mb-1">Hubungi Kami</h3>
                                            </a>
                                            <p class="text-muted">Berkomunikasi dengan kami secara langsung melalui
                                                whatsapp
                                            </p>
                                        </div> <!-- .col -->
                                    </div> <!-- .row -->
                                </div> <!-- .card-body -->
                                <div class="card-footer">
                                    <a href="" class="d-flex justify-content-between text-muted"><span>Jelajahi
                                            Hubungi Kami</span><i class="fe fe-chevron-right"></i></a>
                                </div> <!-- .card-footer -->
                            </div> <!-- .card -->
                        </div> <!-- .col-md-->
                    </div> <!-- .row-->
                </div> <!-- /.col-12 -->
            </div> <!-- .row -->

            <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="update-form" data-action="{{ url('/akun/updateData/') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Foto Pengguna</label>
                                    <input type="file" class="form-control image">
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $userId->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="number">Nomor Telpon</label>
                                    <input type="text" class="form-control" name="number" id="number"
                                        value="{{ $userId->number }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Alamat Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ $userId->email }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Crop Gambar Sebelum Disimpan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img class="w-100" id="image"
                                            src="https://avatars0.githubusercontent.com/u/3456749">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="crop">Crop</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;

        $("body").on("change", ".image", function(e) {
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "crop-image-upload",
                        data: {
                            'image': base64data
                        },
                        success: function(data) {
                            console.log(data);
                            $modal.modal('hide');
                            $("img#profile-image").attr("src", data.new_image_url);
                        }
                    });
                }
            });
        })
    </script>

    <script>
        const updateForms = document.querySelectorAll('.update-form');
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

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
                            Notiflix.Notify.success("Data user berhasil diperbarui!", {
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
