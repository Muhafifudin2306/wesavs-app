@extends('layouts.auth')

@section('title', 'Reset Password WESAVS')

@section('content')
    <div class="wrapper vh-100">
        <div class="d-flex align-items-center h-100">
            <form class="col-lg-4 col-md-6 col-10 mx-auto text-center" action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="mb-3">
                    <img width="50" src="{{ asset('image/auth/twemoji_letter-w.png') }}" alt="">
                </div>

                <h5 class="mb-5 font-weight-bold">WESAVS Reset Password</h5>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
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
                <button class="btn btn-lg btn-primary btn-block" type="submit">Send Password Reset Link</button>
            </form>
        </div>
    </div>
@endsection
