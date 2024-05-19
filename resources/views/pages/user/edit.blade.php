@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Edit Alternatif</span>
                </div>
            </div>
            <form method="POST" action="{{ route('user.update', $data->id) }}" class="my-4 p-3 rounded">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') ?? $data->name }}" placeholder="masukkan nama" name="name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') ?? $data->email }}" placeholder="masukkan email" name="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="********" name="password">
                    <span class="text-sm">Kosongi apabila password tetap</span>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>

    </div>
@endsection
