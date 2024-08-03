@extends('layouts.admin')

@section('title', 'Grup WESAVS')

@section('content')
    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center mb-3">
                    <div class="col-12">
                        <h2 class="h3 mb-2 mt-4 page-title">Grup</h2>
                        <p>Cari dan ikuti forum produktif tentang disorientasi seksual</p>
                    </div>
                </div> <!-- /.col-12 -->
                {{-- <h2 class="h5 my-2">Grup Terfavorit</h2>
                <div class="row mb-4">
                    <div class="col-md-3 col-6">
                        <div class="card border-0 bg-transparent">
                            <div class="secondary-box p-5 rounded" style="background-color: #EDEDED">
                                <img src="{{ asset('image/grup/grup-2.png') }}" class="w-100 rounded-circle" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="h6 card-title mb-1">Anti-LGBT Indonesia</h5>
                                <div class="card-text mb-1">
                                    <span class="badge badge-light text-muted"><i class="fe fe-user fe-12 mr-2 "></i>12,344
                                        member</span>
                                </div>
                                <div class="card-button">
                                    <span class="badge badge-light bg-success py-2 px-3 rounded">open</span>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card border-0 bg-transparent">
                            <div class="secondary-box p-5 rounded" style="background-color: #EDEDED">
                                <img src="{{ asset('image/grup/grup-4.png') }}" class="w-100 rounded-circle" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="h6 card-title mb-1">Cegah LGBT Cilacap</h5>
                                <div class="card-text mb-1">
                                    <span class="badge badge-light text-muted"><i class="fe fe-user fe-12 mr-2 "></i>3,527
                                        member</span>
                                </div>
                                <div class="card-button">
                                    <span class="badge badge-light bg-success py-2 px-3 rounded">open</span>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card border-0 bg-transparent">
                            <div class="secondary-box p-5 rounded" style="background-color: #EDEDED">
                                <img src="{{ asset('image/grup/grup-3.png') }}" class="w-100 rounded-circle" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="h6 card-title mb-1">Lindungi Ketahui</h5>
                                <div class="card-text mb-1">
                                    <span class="badge badge-light text-muted"><i class="fe fe-user fe-12 mr-2 "></i>2,887
                                        member</span>
                                </div>
                                <div class="card-button">
                                    <span class="badge badge-light bg-success py-2 px-3 rounded">open</span>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div>
                </div> <!-- .card-deck --> --}}
                {{-- <div class="d-flex justify-content-between">
                    <div class="title-section">
                        <h2 class="h5 mt-2 mb-4">Grup Tersedia</h2>
                    </div>
                </div> --}}
                <div class="card shadow">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Grup Publik</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('indexGrupMe') }}" class="nav-link">Grup Saya</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                @foreach ($grups as $item)
                                    <div class="row py-3">
                                        <div class="col-md-2">
                                            <img src="{{ Storage::url($item->image) }}" class="w-100 rounded"
                                                alt="">
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="h6 card-title mb-1">{{ $item->name }}</h5>
                                            {{-- <div class="card-text mb-1">
                                                <span class="badge text-muted"><i class="fe fe-user fe-12 mr-2 "></i>3,527
                                                    member</span>
                                            </div> --}}
                                            <div class="card-button">
                                                <span
                                                    class="badge badge-light bg-success py-2 px-3 rounded">{{ $item->status }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="title-desc">
                                                <h6>Deskripsi</h6>
                                            </div>
                                            <div class="content-desc">
                                                <span>{{ $item->description }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <i class="fe fe-map-pin f-12"></i>
                                            {{ $item->provinsi . ',' . ' ' . $item->negara }}
                                        </div>
                                        @php
                                            $userGroups = isset($userHasGrup)
                                                ? $userHasGrup->pluck('id_grup')->toArray()
                                                : [];
                                        @endphp

                                        <div class="col-md-2">
                                            @if (in_array($item->id, $userGroups))
                                                <div class="mb-2">
                                                    <a href="{{ url('grup/chat/' . $item->slug) }}">
                                                        <button class="btn btn-success"> <i
                                                                class="fe fe-message-circle fe-12"></i>
                                                            Join Diskusi</button>
                                                    </a>
                                                </div>
                                                <div class="mb-2">
                                                    <button class="btn btn-danger grup-delete"
                                                        data-card-id="{{ $item->id }}"> <i
                                                            class="fe fe-log-out fe-12"></i> Keluar
                                                        Grup</button>
                                                </div>
                                            @else
                                                <button class="btn btn-primary join-grup"
                                                    data-card-id="{{ $item->id }}">
                                                    <i class="fe fe-log-in fe-12"></i> Ikut Grup</button>
                                            @endif
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .row -->
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
    <script>
        const deleteCredit = document.querySelectorAll('.join-grup');

        deleteCredit.forEach(button => {
            button.addEventListener('click', function() {
                const cardId = button.dataset.cardId;

                Notiflix.Confirm.show('Konfirmasi', 'Apakah Anda yakin ingin mengikuti grup ini?', 'Ya',
                    'Batal',
                    function() {
                        fetch(`/grup/join/${cardId}`, {
                                method: 'POST',
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
        const leaveGrup = document.querySelectorAll('.grup-delete');

        leaveGrup.forEach(button => {
            button.addEventListener('click', function() {
                const cardId = button.dataset.cardId;

                Notiflix.Confirm.show('Konfirmasi', 'Apakah Anda yakin ingin keluar grup ini?', 'Ya',
                    'Batal',
                    function() {
                        fetch(`/grup/leave/${cardId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                Notiflix.Notify.success("Anda berhasil keluar!", {
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
