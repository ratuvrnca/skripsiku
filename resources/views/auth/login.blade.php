@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white text-center" style="min-width: 20vw; background: #8f1a22 !important">
                        <img src="{{ asset('assets/img/logo-times.png') }}"
                            alt="Logo" style="width: 200px; height:auto">
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input name="email" type="text"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="john.doe@mail.com" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="*******"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <button class="btn btn-danger text-white" style="width: 100%; background: #8f1a22 !important">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
