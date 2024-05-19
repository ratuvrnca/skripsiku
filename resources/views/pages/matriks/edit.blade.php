@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Edit Matriks</span>
                </div>
            </div>
            <form method="POST" action="{{ route('matriks.update', $matriks->id) }}" class="my-4 p-3 rounded">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Judul Alternatif</label>
                    <select name="kode" id="" class="form-control">
                        <option value="">Pilih Data Alternatif</option>
                        @foreach ($alternatifs as $item)
                            <option @if ($item->kode == $matriks->kode) selected @endif value="{{ $item->kode }}">
                                {{ $item->alternatif }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    @foreach ($kriterias as $index => $item)
                        <div class="form-group mt-3 col-md-6">
                            <label>kriteria {{ $index + 1 }} ( {{ $item->kriteria }} )</label>
                            <input type="text" class="form-control" placeholder="masukkan kriteria"
                                name="kriteria[{{ $item->id }}]"
                                value="{{ ($nilai = $matriks->detail()->where('kriteria_id', $item->id)->first())? $nilai->nilai: 0 }}">
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>
    </div>
@endsection
