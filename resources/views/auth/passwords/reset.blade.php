{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@extends('layouts.auth')

@section('content')
    <div class="wrapper vh-100">
        <div class="d-flex align-items-center h-100">
            <form class="col-lg-4 col-md-6 col-10 mx-auto text-center" action="{{ route('password.update') }}" method="post">
                @csrf
                <div class="mb-3">
                    <img width="50" src="{{ asset('image/auth/twemoji_letter-w.png') }}" alt="">
                </div>

                <h5 class="mb-5 font-weight-bold">WESAVS Login</h5>
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="inputEmail" class="d-flex">Alamat Email</label>
                    <input id="email" type="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                        value="{{ $email ?? old('email') }}" placeholder="example@mail.com" required autocomplete="email"
                        autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="d-flex">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword5"
                        name="password" required autocomplete="new-password" placeholder="******">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="d-flex">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required autocomplete="new-password"
                        placeholder="******" class="form-control" id="inputPassword6" id="password-confirm">
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
            </form>
        </div>
    </div>
@endsection
