@extends('layouts.admin')

@section('title', 'Ebook WESAVS')

@section('content')
    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h3 mb-2 mt-4 page-title">E-Book Disorientasi Seksual</h2>
                        <p>Materi pilihan membantu pengguna memahami disorientasi seksual</p>
                    </div>
                </div> <!-- /.col-12 -->
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th><strong>No</strong></th>
                                            <th><strong>Cover</strong></th>
                                            <th><strong>Sumber</strong></th>
                                            <th><strong>Download</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($ebook as $item)
                                            <tr>
                                                <th>{{ $no++ }}</th>
                                                <th>
                                                    <div class="avatar">
                                                        <img src="{{ Storage::url($item->cover) }}" alt="..."
                                                            class="avatar-img rounded" width="200">
                                                    </div>
                                                </th>
                                                <th>
                                                    {!! $item->source !!}
                                                </th>
                                                <th>
                                                    <i class="fe fe-download fe-12"></i>
                                                    <a href="{{ Storage::url($item->file) }}" target="_blank">Unduh</a>
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
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
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
