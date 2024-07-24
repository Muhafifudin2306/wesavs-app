@extends('layouts.admin')

@section('title', ' Manajemen Pengguna WESAVS')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">

    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h3 mb-2 mt-4 page-title">Manajemen Pengguna</h2>
                        <p>Lihat daftar, buat data, edit, dan hapus pengguna WESAVS</p>
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
                                            <th><strong>Foto</strong></th>
                                            <th><strong>Nama</strong></th>
                                            <th><strong>Email</strong></th>
                                            <th><strong>Role</strong></th>
                                            <th><strong>Nomor Telpon</strong></th>
                                            <th><strong>Dibuat Pada</strong></th>
                                            <th><strong>Aksi</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($users as $item)
                                            <tr>
                                                <th>{{ $no++ }}</th>
                                                <th>
                                                    @if ($item->image == null)
                                                        <div class="avatar avatar-md">
                                                            <img src="{{ asset('assets/avatars/avatar-1.jpg') }}"
                                                                alt="..." class="avatar-img rounded-circle">
                                                        </div>
                                                    @else
                                                        <div class="avatar avatar-md">
                                                            <img src="{{ asset('upload/profile' . $item->image) }}"
                                                                alt="..." class="avatar-img rounded-circle">
                                                        </div>
                                                    @endif
                                                </th>
                                                <th>{{ $item->name }}</th>
                                                <th>{{ $item->email }}</th>
                                                <th>
                                                    @foreach ($item->roles as $role)
                                                        @if ($role->name == 'user')
                                                            <span class="text-primary">
                                                                {{ $role->name }}
                                                            </span>
                                                        @elseif($role->name == 'admin')
                                                            <span class="text-danger">
                                                                {{ $role->name }}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                </th>
                                                <th>{{ $item->number }}</th>
                                                <td>
                                                    {{ $item->updated_at->format('d F Y') }}
                                                </td>
                                                <th>
                                                    <div class="d-flex">
                                                        <div class="left-button">
                                                            <i class="fe fe-edit mx-1 fe-16 text-warning cursor-pointer"
                                                                data-toggle="modal"
                                                                data-target="#userModal{{ $item->id }}"></i>
                                                        </div>
                                                        <div class="right-button">
                                                            <i
                                                                class="fe fe-trash user-delete mx-1 fe-16 text-danger cursor-pointer"data-card-id="{{ $item->id }}"></i>
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
                @foreach ($users as $item)
                    <div class="modal fade" id="userModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="update-form" data-action="{{ url('/user/updateData/' . $item->id) }}"
                                        method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ $item->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="number">Nomor Telpon</label>
                                                <input type="text" class="form-control" name="number" id="number"
                                                    value="{{ $item->number }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Alamat Email</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    value="{{ $item->email }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> <!-- .row -->
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
    <script>
        const deleteCredit = document.querySelectorAll('.user-delete');

        deleteCredit.forEach(button => {
            button.addEventListener('click', function() {
                const cardId = button.dataset.cardId;

                Notiflix.Confirm.show('Konfirmasi', 'Apakah Anda yakin ingin menghapus data ini?', 'Ya',
                    'Batal',
                    function() {
                        fetch(`/user/delete/${cardId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                Notiflix.Notify.success("Data User berhasil dihapus!", {
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
    <script src='{{ asset('js/jquery.dataTables.min.js') }}'></script>
    <script src='{{ asset('js/dataTables.bootstrap4.min.js') }}'></script>
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
