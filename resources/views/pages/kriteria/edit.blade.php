@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Edit Kriteria</span>
                </div>
            </div>
            <form method="POST" action="{{ route('kriteria.update', $data->id) }}" class="my-4 p-3 rounded">
                @csrf
                @method('PUT')
                {{-- <div class="form-group">
                    <label>Tipe Kriteria</label>
                    <select class="form-control" name="kode">
                        <option>pilih tipe kriteria</option>
                        @foreach ($type as $type_kriteria)
                            <option value="{{ $type_kriteria->kode }}" @if ($type_kriteria->kode == $data->kode) selected @endif>
                                {{ $type_kriteria->kode }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group mt-3">
                    <label>Kriteria</label>
                    <input type="text" class="form-control" value="{{ $data->kriteria }}" placeholder="masukkan kriteria"
                        name="kriteria">
                </div>
                {{-- <div class="form-group mt-3">
                    <label>bobot</label>
                    <input type="text" class="form-control" value="{{ $data->bobot }}" placeholder="masukkan bobot"
                        name="bobot">
                </div> --}}
                <div class="form-group mt-3">
                    <label>Cost / benefit</label>
                    <select class="form-control" name="tipe">
                        <option>pilih tipe kriteria</option>
                        <option value="benefit" @if ($data->tipe == 'benefit') selected @endif>benefit</option>
                        <option value="cost" @if ($data->tipe == 'cost') selected @endif>cost</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>

    </div>
@endsection
