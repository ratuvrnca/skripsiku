@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Edit Alternatif</span>
                </div>
            </div>
            <form method="POST" action="{{ route('alternatif.update', $data->id) }}"
                class="my-4 p-3 rounded">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>kode alternatif</label>
                    <input type="text" class="form-control" value="{{ $data->kode }}"
                        placeholder="masukkan kode alternatif" name="kode">
                </div>
                <div class="form-group mt-3">
                    <label>alternatif</label>
                    <input type="text" class="form-control" value="{{ $data->alternatif }}"
                        placeholder="masukkan alternatif" name="alternatif">
                </div>
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>

    </div>
@endsection
