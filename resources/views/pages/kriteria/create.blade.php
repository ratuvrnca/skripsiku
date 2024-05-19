@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Tambah Kriteria</span>
                </div>
            </div>
            <form method="POST" action="{{ route('kriteria.store') }}" class="my-4 p-3 rounded">
                @csrf
                {{-- <div class="form-group">
                    <label>Tipe kriteria</label>
                    <select class="form-control @error('kode') is-invalid @enderror" name="kode">
                        <option value="">Pilih tipe</option>
                        @foreach ($type as $type_kriteria)
                            <option @if (old('kode') === $type_kriteria->kode) selected @endif value="{{ $type_kriteria->kode }}">
                                {{ $type_kriteria->kode }}</option>
                        @endforeach
                    </select>
                    @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
                <div class="form-group mt-3">
                    <label>Kriteria</label>
                    <input type="text" class="form-control @error('kriteria') is-invalid @enderror"
                        placeholder="masukkan kriteria" name="kriteria" value="{{ old('kriteria') }}">
                    @error('kriteria')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- <div class="form-group mt-3">
                    <label>Bobot</label>
                    <input type="text" class="form-control @error('bobot') is-invalid @enderror"
                        placeholder="masukkan bobot" name="bobot" value="{{ old('bobot') }}">

                    @error('bobot')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
                <div class="form-group mt-3">
                    <label>Cost / benefit</label>
                    <select class="form-control @error('tipe') is-invalid @enderror" name="tipe">
                        <option value="">pilih tipe kriteria</option>
                        <option @if (old('type') === 'benefit') selected @endif value="benefit">benefit</option>
                        <option @if (old('type') === 'cost') selected @endif value="cost">cost</option>
                    </select>
                    @error('tipe')
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
