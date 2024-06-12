@extends('layouts.admin')

@section('title', 'Chat Grup WESAVS')

@section('content')
    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="title-panel">
                        <h2 class="h3 mb-2 mt-4 page-title">Chat Grup</h2>
                        <p>Berdiskusi dan berbagi dengan sopan santun</p>
                    </div>
                    <div class="button-panel">
                        <button class="btn btn-danger"> <i class="fe fe-log-out fe-12"></i> Keluar
                            Grup</button>
                    </div>
                </div> <!-- /.col-12 -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Anti-LGBT Indonesia</strong>
                        <span class="float-right"><span class="badge badge-pill badge-success text-white">open</span></span>
                    </div>
                    <div class="card-body">
                        <dl class="row align-items-center mb-0">
                            <dt class="col-sm-2 mb-3 text-muted">Admin Grup</dt>
                            <dd class="col-sm-4 mb-3">
                                <strong>Muhammad Afifudin</strong>
                            </dd>
                            <dt class="col-sm-2 mb-3 text-muted">Jumlah Member</dt>
                            <dd class="col-sm-4 mb-3">
                                <strong>12,344 member</strong>
                            </dd>
                        </dl>
                        <dl class="row align-items-center mb-0">
                            <dt class="col-sm-2 mb-3 text-muted">Dibuat Pada</dt>
                            <dd class="col-sm-4 mb-3">
                                <strong>2024-05-22 00:14:38</strong>
                            </dd>
                            <dt class="col-sm-2 mb-3 text-muted">Tipe Grup</dt>
                            <dd class="col-sm-4 mb-3">
                                <strong>Terbuka Untuk Umum</strong>
                            </dd>
                        </dl>
                        <dl class="row mb-0">
                            <dt class="col-sm-2 mb-3 text-muted">Deskripsi</dt>
                            <dd class="col-sm-4 mb-3">
                                <strong>sebuah seruan kemanusiaan untuk dukung gerakan anti LGBT dan berimpact untuk
                                    kemajuan bangsa</strong>
                            </dd>
                        </dl>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Diskusi Grup</strong>
                        {{-- Jumlah Diskusi --}}
                        <span class="float-right"><i class="fe fe-message-circle mr-2"></i>3</span>
                    </div>
                    <div class="card-body">
                        <div id="scrollableDiv" class="height-custom"
                            style="height: 500px;overflow-y:scroll; overflow-x: hidden">
                            <div class="row align-items-center mb-4">
                                <div class="col">
                                    <strong>Kelley Sonya</strong>
                                    <div class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Phasellus sollicitudin luctus pretium. <br />Pellentesque porta massa ac nibh
                                        finibus iaculis. Maecenas vel interdum urna. Integer auctor ultrices faucibus.
                                        Aliquam consequat et ligula nec sodales.</div>
                                    <small class="text-muted">2020-04-21 12:01:22</small>
                                </div>
                            </div> <!-- .row-->
                            <div class="row align-items-center mb-4">
                                <div class="col">
                                    <strong>Kelley Sonya</strong>
                                    <div class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Phasellus sollicitudin luctus pretium. <br />Pellentesque porta massa ac nibh
                                        finibus iaculis. Maecenas vel interdum urna. Integer auctor ultrices faucibus.
                                        Aliquam consequat et ligula nec sodales.</div>
                                    <small class="text-muted">2020-04-21 12:01:22</small>
                                </div>
                            </div> <!-- .row-->
                            <div class="row align-items-center mb-4">
                                <div class="col">
                                    <strong>Kelley Sonya</strong>
                                    <div class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Phasellus sollicitudin luctus pretium. <br />Pellentesque porta massa ac nibh
                                        finibus iaculis. Maecenas vel interdum urna. Integer auctor ultrices faucibus.
                                        Aliquam consequat et ligula nec sodales.</div>
                                    <small class="text-muted">2020-04-21 12:01:22</small>
                                </div>
                            </div> <!-- .row-->
                        </div>
                        <script>
                            window.onload = function() {
                                var scrollableDiv = document.getElementById('scrollableDiv');
                                scrollableDiv.scrollTop = scrollableDiv.scrollHeight;
                            };
                        </script>
                        <hr class="my-4">
                        <h6 class="mb-3">Tanggapi</h6>
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="sr-only">Your Message</label>
                                <textarea class="form-control bg-light" id="exampleFormControlTextarea1" placeholder="Tulis tanggapan anda.."
                                    rows="4"></textarea>
                            </div>
                            <div class="d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .row -->
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')

@endsection
