@extends('layouts.auth')

@section('title', 'Login WESAVS')

@section('content')
    <div class="wrapper vh-100">
        <div class="d-flex align-items-center h-100">
            <form class="col-lg-4 col-md-6 col-10 mx-auto text-center" action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <img width="50" src="{{ asset('image/auth/twemoji_letter-w.png') }}" alt="">
                </div>

                <h5 class="mb-5 font-weight-bold">WESAVS Login</h5>
                <div class="form-group">
                    <label for="inputEmail" class="d-flex">Alamat Email</label>
                    <input id="email" type="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" placeholder="example@mail.com" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="d-flex">Password</label>
                    <input id="password" type="password"
                        class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                        placeholder="********" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="text-left ml-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Ingat Saya') }}
                        </label>
                    </div>
                    <div class="forget-password">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                <label class="form-check-label">
                                    Lupa Kata Sandi?
                                </label>
                            </a>
                        @endif
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk Sekarang</button>
                <h6 class="my-4">
                    Belum punya akun? <a href="{{ url('register') }}">Daftar Sekarang</a>
                </h6>
            </form>
        </div>
    </div>
@endsection
