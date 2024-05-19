@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Edit Range Nilai</span>
                </div>
            </div>
            <form method="POST" action="{{ route('rangenilai.update', $data->id) }}"
                class="my-4 p-3 rounded">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>keterangan</label>
                    <input type="text" class="form-control" value="{{ $data->keterangan }}"
                        placeholder="masukkan keterangan" name="keterangan">
                </div>
                <div class="form-group mt-3">
                    <label>nilai</label>
                    <input type="text" class="form-control" value="{{ $data->nilai }}" placeholder="masukkan nilai"
                        name="nilai">
                </div>
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>

    </div>
@endsection
