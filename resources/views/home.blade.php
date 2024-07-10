@extends('layouts.admin')

@section('title', 'Beranda WESAVS')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h3 mb-2 mt-4 page-title">Beranda</h2>
                        <p>Temukan informasi-informasi tentang disorientasi seksual</p>
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
                <div class="row my-4">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow cursor-pointer" data-toggle="modal" data-target="#factorModal">
                            <div class="card-body my-n3">
                                <div class="text-center py-3 my-2">
                                    <span class="circle bg-light" style="width:120px;height:120px">
                                        <i class="fe fe-feather fe-32 text-primary"></i>
                                    </span>
                                    <h6 class="my-3">Faktor-Faktor</h6>
                                </div> <!-- .col -->
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow">
                            <div class="card-body my-n3">
                                <div class="text-center py-3 my-2">
                                    <span class="circle bg-light" style="width:120px;height:120px">
                                        <i class="fe fe-sun fe-32 text-primary"></i>
                                    </span>
                                    <h6 class="my-3">Dampak</h6>
                                </div> <!-- .col -->
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow">
                            <div class="card-body my-n3">
                                <div class="text-center py-3 my-2">
                                    <span class="circle bg-light" style="width:120px;height:120px">
                                        <i class="fe fe-shield-off fe-32 text-primary"></i>
                                    </span>
                                    <h6 class="my-3">Mitigasi Pencegahan</h6>
                                </div> <!-- .col -->
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div>
                </div> <!-- .row-->
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h3 mb-2 mt-4 page-title">Berita</h2>
                        <p>Selalu terhubung dengan berita terbaru tentang disorientasi seksual</p>
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
                <section class="splide pb-3 mb-3" role="group" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($blogs as $item)
                                <li class="splide__slide">
                                    <div class="card profile shadow">
                                        <div class="card-body my-2">
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <img src="{{ Storage::url($item->cover) }}" height="280"
                                                        alt="..." class="w-100" style="object-fit: cover"
                                                        data-toggle="modal" data-target="#imageModal-{{ $item->id }}">
                                                </div>

                                                <div class="col">
                                                    <h4 class="mb-1 pt-3">{{ $item->title }}</h4>
                                                    <span
                                                        class="small text-muted mb-0">{{ $item->updated_at->format('F d, Y') }}
                                                        -
                                                        {{ $item->user->name }}</span>

                                                    <p class="pt-2"> {!! $item->content !!} </p>
                                                </div>
                                            </div> <!-- / .row- -->
                                        </div> <!-- / .card-body - -->
                                    </div> <!-- / .card- -->
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div> <!-- .container-fluid -->
            <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog"
                aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="list-group list-group-flush my-n3">
                                <div class="list-group-item bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="fe fe-box fe-24"></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>Package has uploaded successfull</strong></small>
                                            <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                                            <small class="badge badge-pill badge-light text-muted">1m ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="fe fe-download fe-24"></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>Widgets are updated successfull</strong></small>
                                            <div class="my-0 text-muted small">Just create new layout Index, form,
                                                table</div>
                                            <small class="badge badge-pill badge-light text-muted">2m ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="fe fe-inbox fe-24"></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>Notifications have been sent</strong></small>
                                            <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo
                                            </div>
                                            <small class="badge badge-pill badge-light text-muted">30m ago</small>
                                        </div>
                                    </div> <!-- / .row -->
                                </div>
                                <div class="list-group-item bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="fe fe-link fe-24"></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>Link was attached to menu</strong></small>
                                            <div class="my-0 text-muted small">New layout has been attached to the menu
                                            </div>
                                            <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                        </div>
                                    </div>
                                </div> <!-- / .row -->
                            </div> <!-- / .list-group -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear
                                All</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog"
                aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body px-5">
                            <div class="row align-items-center">
                                <div class="col-6 text-center">
                                    <div class="squircle bg-success justify-content-center">
                                        <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                                    </div>
                                    <p>Control area</p>
                                </div>

                                <div class="col-6 text-center">
                                    <div class="squircle bg-primary justify-content-center">
                                        <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                                    </div>
                                    <p>Activity</p>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="squircle bg-primary justify-content-center">
                                        <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                                    </div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <p>{{ __('Logout') }}</p>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </a>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-6 text-center">
                                    <div class="squircle bg-primary justify-content-center">
                                        <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                                    </div>
                                    <p>Droplet</p>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="squircle bg-primary justify-content-center">
                                        <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                                    </div>
                                    <p>Upload</p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-6 text-center">
                                    <div class="squircle bg-primary justify-content-center">
                                        <i class="fe fe-users fe-32 align-self-center text-white"></i>
                                    </div>
                                    <p>Users</p>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="squircle bg-primary justify-content-center">
                                        <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                                    </div>
                                    <p>Settings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    @foreach ($blogs as $item)
        <!-- Modal -->
        <div class="modal fade" id="imageModal-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <img src="{{ Storage::url($item->cover) }}" alt="..." class="w-100">
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="factorModal" tabindex="-1" aria-labelledby="ebookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ebookModalLabel">Faktor-Faktor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! $factor->content !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        var splide = new Splide('.splide');
        splide.mount();
    </script>
@endsection
