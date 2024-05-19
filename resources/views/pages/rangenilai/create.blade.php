@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Tambah Range Nilai</span>
                </div>
            </div>
            <form method="POST" action="{{ route('rangenilai.store') }}" class="my-4 bg p-3 rounded">
                @csrf
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                        placeholder="masukkan keterangan" name="keterangan">
                    @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label>nilai</label>
                    <input type="text" class="form-control @error('nilai') is-invalid @enderror"
                        placeholder="masukkan nilai" name="nilai">
                    @error('nilai')
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
