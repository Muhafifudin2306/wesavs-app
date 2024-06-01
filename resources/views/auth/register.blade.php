@extends('layouts.auth')

@section('title', 'Registrasi WESAVS')

@section('content')
    <div class="wrapper vh-100">
        <div class="d-flex align-items-center h-100">
            <form class="col-lg-6 col-md-8 col-10 mx-auto" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mx-auto text-center my-4">
                    <div class="mb-3">
                        <img width="50" src="{{ asset('image/auth/twemoji_letter-w.png') }}" alt="">
                    </div>

                    <h5 class="mb-5 font-weight-bold">WESAVS Register</h5>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nae">Nama Lengkap</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                            required autocomplete="name" name="name" placeholder="Nama Lengkap" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Alamat Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail4"
                            value="{{ old('email') }}" name="email" placeholder="example@gmail.com" required
                            autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <hr class="my-3">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="inputPassword5" name="password" required autocomplete="new-password"
                                placeholder="******">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" required autocomplete="new-password"
                                placeholder="******" class="form-control" id="inputPassword6" id="password-confirm">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">Ketentuan Password</p>
                        <p class="small text-muted mb-2"> Untuk membuat password yang aman, buatlah sesuai dengan
                            persyaratan berikut: </p>
                        <ul class="small text-muted pl-4 mb-0">
                            <li>Buatlah password dengan minimal 8 karakter</li>
                            <li>Minimal terdapat 1 Huruf Kapital</li>
                            <li>Minimal terdapat 1 Angka</li>
                        </ul>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar Sekarang</button>
                <h6 class="my-4 text-center">
                    Sudah punya akun? <a href="{{ url('login') }}">Masuk Sekarang</a>
                </h6>
            </form>
        </div>
    </div>
@endsection
