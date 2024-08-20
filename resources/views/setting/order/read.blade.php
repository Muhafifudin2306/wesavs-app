@extends('layouts.admin')

@section('title', 'Pesanan User WESAVS')

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
                        <h2 class="h3 mb-2 mt-4 page-title">Manajemen Order</h2>
                        <p>Menu untuk manajemen status pengiriman hadiah</p>
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
                                            <th><strong>Pesanan</strong></th>
                                            <th><strong>Pemesan</strong></th>
                                            <th><strong>Kontak</strong></th>
                                            <th><strong>Alamat</strong></th>
                                            <th><strong>Status</strong></th>
                                            <th><strong>Aksi</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($order as $item)
                                            <tr>
                                                <th>{{ $no++ }}</th>
                                                <th>
                                                    <p class="font-weight-bold">{{ $item->product->name }}</p>
                                                </th>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->number }}</td>
                                                <td>{{ $item->location }}</td>
                                                <td>
                                                    @if ($item->status == 'Pending')
                                                        <span
                                                            class="badge badge-pill badge-warning px-3 py-2"><strong>{{ $item->status }}</strong>
                                                        </span>
                                                    @endif
                                                    @if ($item->status == 'Dikirim')
                                                        <span
                                                            class="badge badge-pill badge-info px-3 py-2"><strong>{{ $item->status }}</strong>
                                                        </span>
                                                    @endif
                                                    @if ($item->status == 'Selesai')
                                                        <span
                                                            class="badge badge-pill badge-success px-3 py-2"><strong>{{ $item->status }}</strong>
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm dropdown-toggle more-horizontal"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @if ($item->status == 'Pending')
                                                            <span class="dropdown-item change-status" data-status="dikirim"
                                                                data-id="{{ $item->id }}">Dikirim</span>
                                                            <span class="dropdown-item change-status" data-status="selesai"
                                                                data-id="{{ $item->id }}">Selesai</span>
                                                        @endif

                                                        @if ($item->status == 'Dikirim')
                                                            <span class="dropdown-item change-status" data-status="pending"
                                                                data-id="{{ $item->id }}">Pending</span>
                                                            <span class="dropdown-item change-status" data-status="selesai"
                                                                data-id="{{ $item->id }}">Selesai</span>
                                                        @endif

                                                        @if ($item->status == 'Selesai')
                                                            <span class="dropdown-item change-status" data-status="pending"
                                                                data-id="{{ $item->id }}">Pending</span>
                                                            <span class="dropdown-item change-status" data-status="dikirim"
                                                                data-id="{{ $item->id }}">Dikirim</span>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .row -->
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
    <script src='{{ asset('js/jquery.dataTables.min.js') }}'></script>
    <script src='{{ asset('js/dataTables.bootstrap4.min.js') }}'></script>

    <script>
        // Ambil semua tombol dengan class 'dropdown-item'
        const changeStatusButtons = document.querySelectorAll('.change-status');

        // Iterasi setiap tombol
        changeStatusButtons.forEach(button => {
            button.addEventListener('click', () => {
                const status = button.dataset.status;
                const id = button.dataset.id;

                Notiflix.Confirm.show(
                    'Konfirmasi',
                    `Apakah Anda yakin ingin mengubah status menjadi "${status}"?`,
                    'Ya',
                    'Batal',
                    async () => {
                        try {
                            const response = await fetch(`order/update/${status}/${id}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: JSON.stringify({
                                    status
                                }),
                            });

                            const data = await response.json();
                            Notiflix.Notify.success(data.message, {
                                timeout: 3000
                            });
                            location.reload();
                        } catch (error) {
                            Notiflix.Notify.failure('Error:', error.message);
                        }
                    }
                );
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
