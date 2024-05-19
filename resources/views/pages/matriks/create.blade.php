@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Tambah Matriks</span>
                </div>
            </div>
            <form method="POST" action="{{ route('matriks.store') }}" class="my-4 p-3 rounded">
                @csrf
                <div class="form-group">
                    <label>Judul Alternatif</label>
                    <select name="kode" id="" class="form-control">
                        <option value="">Pilih Data Alternatif</option>
                        @foreach ($alternatifs as $item)
                            <option value="{{ $item->kode }}">{{ $item->alternatif }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    @foreach ($kriterias as $index => $item)
                        <div class="form-group mt-3 col-md-6">
                            <label>kriteria {{ $index + 1 }} ( {{ $item->kriteria }} )</label>
                            <input type="text" class="form-control" placeholder="masukkan kriteria 1"
                                name="kriteria[{{ $item->id }}]">
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>

    </div>
@endsection
