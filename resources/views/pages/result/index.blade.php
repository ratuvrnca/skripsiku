@extends('layouts.master')
@section('main')
    <div class="container ">
        @if (auth()->user()->role === 'admin')
            <form class="text-center mb-5" method="POST" action="{{ route('destroy') }}">
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ??')">
                    Reset Data
                </button>
            </form>
            <div
                class="d-flex flex-wrap rounded mb-4 gap-3 justify-content-center align-items-between p-3 align-items-center bg-secondary-subtle">
                <form method="POST" action="{{ route('normalisasikan') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger " @if (count($normalisasi) != 0) disabled @endif>
                        Normalisasi
                    </button>
                </form>
                <form method="POST" action="{{ route('normalisasikan.step2') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger" @if (count($normalisasi2) != 0) disabled @endif>
                        Normalisasi 2
                    </button>
                </form>
                <form method="POST" action="{{ route('normalisasikan.terbobot') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger" @if (count($normalisasi_terbobot) != 0) disabled @endif>
                        Normalisasi Terbobot
                    </button>
                </form>
                <form method="POST" action="{{ route('yimax') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger" @if (count($yi) != 0) disabled @endif>
                        Nilai Yi
                    </button>
                </form>
                <form method="POST" action="{{ route('matriks.result') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger" @if (count($result) != 0) disabled @endif>
                        Result
                    </button>
                </form>
            </div>
        @endif
        <div class="card mt-2 border-0">
            <div class="card-header bg-secondary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-7 fw-semibold text-black">Normalisasi</span>
                </div>
            </div>
            <ul class="list-group list-group-flush p-4">
                <li class="list-group-item table-responsive">
                    <table class="table text-center small">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">kode</th>
                                @foreach ($kriterias as $index => $item)
                                    <th scope="col">kriteria {{ $index + 1 }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @if ($normalisasi)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Normalisasi</td>
                                    @foreach ($kriterias as $item)
                                        <td>{{ $normalisasi[$item->id] }}</td>
                                    @endforeach
                                </tr>
                            @else
                                <tr>
                                    <td colspan="8">tidak ada data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
        <div class="card mt-2 border-0">
            <div class="card-header bg-secondary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-7 fw-semibold text-black">Normalisasi 2</span>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center small">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">kode</th>
                                @foreach ($kriterias as $index => $item)
                                    <th scope="col">kriteria {{ $index + 1 }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @if ($normalisasi2)
                                @foreach ($matriks as $data)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $data->kode }}</td>
                                        @foreach ($kriterias as $index => $item)
                                            <th scope="col">{{ $normalisasi2[$data->kode][$item->id] }}
                                            </th>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">tidak ada data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
        <div class="card mt-2 border-0">
            <div class="card-header bg-secondary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-7 fw-semibold text-black">Normalisasi terbobot</span>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center small">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">kode</th>
                                @foreach ($kriterias as $index => $item)
                                    <th scope="col">kriteria {{ $index + 1 }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @if ($normalisasi_terbobot)
                                @foreach ($matriks as $data)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $data->kode }}</td>
                                        @foreach ($kriterias as $index => $item)
                                            <th scope="col">{{ $normalisasi_terbobot[$data->kode][$item->id] }}
                                            </th>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">tidak ada data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
        <div class="card mt-2 border-0">
            <div class="card-header bg-secondary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-7 fw-semibold text-black">Pencarian Nilai Yi</span>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center small">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">kode</th>
                                <th scope="col">max</th>
                                <th scope="col">min</th>
                                <th scope="col">Max - Min</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($yi as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->kode }}</td>
                                    <td>{{ $data->max }}</td>
                                    <td>{{ $data->min }}</td>
                                    <td>{{ $data->minmax }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
        <div class="card mt-2 border-0">
            <div class="card-header bg-secondary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-7 fw-semibold text-black">Result</span>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center small">
                        <thead>
                            <tr>
                                <th scope="col">Ranking</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Judul Berita</th>
                                <th scope="col">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($result as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->kode }}</td>
                                    <td>{{ $data->judul_berita }}</td>
                                    <td>{{ $data->preference_value }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
    </div>
@endsection
