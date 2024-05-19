@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Data Nilai Matriks</span>

                    <div class="d-flex gap-4">

                        @if (auth()->user()->role === 'admin')
                            {{-- <form action="{{ route('matriks.destroy-all') }}" method="post">
                                @csrf
                                @method('POST')
                                <button class="btn btn-danger m-0">
                                    <div class="fa fa-trash"></div>
                                    Hapus Semua
                                </button>
                            </form> --}}
                        @endif
                        @if (auth()->user()->role !== 'admin')
                            <a href="{{ route('matriks.create') }}" class="btn btn-success m-0">+Tambah</a>
                        @endif
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush p-3">
                <li class="list-group-item table-responsive">
                    <table class="table text-center table-bordered">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th scope="col">Kode</th>
                                <th scope="col">Judul Berita</th>
                                <th scope="col">Penilai</th>
                                @foreach ($kriterias as $index => $kriteria)
                                    <th scope="col">kriteria {{ $index + 1 }}</th>
                                @endforeach
                                {{-- <th scope="col">kriteria 2</th>
                                <th scope="col">kriteria 3</th>
                                <th scope="col">kriteria 4</th>
                                <th scope="col">kriteria 5</th>
                                <th scope="col">kriteria 6</th>
                                <th scope="col">kriteria 7</th> --}}
                                @if (auth()->user()->role !== 'admin')
                                    <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$data)
                                <tr>
                                    <td colspan="5" class="text-center">data masih kosong.</td>
                                </tr>
                            @else
                                @foreach ($data as $matriks)
                                    <tr>
                                        <td class="text-start">{{ $matriks->alternatif()->kode }}</td>
                                        <td class="text-start">{{ $matriks->alternatif()->alternatif }}</td>
                                        <td class="text-start">{{ $matriks->user->name }}</td>
                                        @foreach ($kriterias as $index => $kriteria)
                                            <td scope="col">
                                                {{ ($nilai = $matriks->detail()->where('kriteria_id', $kriteria->id)->first())? $nilai->nilai: 0 }}
                                            </td>
                                        @endforeach
                                        {{-- <td>{{ $matriks->kriteria_1 }}</td>
                                        <td>{{ $matriks->kriteria_2 }}</td>
                                        <td>{{ $matriks->kriteria_3 }}</td>
                                        <td>{{ $matriks->kriteria_4 }}</td>
                                        <td>{{ $matriks->kriteria_5 }}</td>
                                        <td>{{ $matriks->kriteria_6 }}</td>
                                        <td>{{ $matriks->kriteria_7 }}</td> --}}
                                        @if (auth()->user()->role !== 'admin')
                                            <td class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('matriks.edit', $matriks->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-pencil text-sm"></i>
                                                </a>
                                                <form method="POST" action="{{ route('matriks.destroy', $matriks->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')">
                                                        <i class="fa-solid fa-trash text-sm"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                <tr></tr>
                            @endif
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>


        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Rata Rata Nilai Matriks</span>
                </div>
            </div>
            <ul class="list-group list-group-flush p-3">
                <li class="list-group-item table-responsive">
                    <table class="table text-center table-bordered">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th scope="col">Kode</th>
                                <th scope="col">Judul Alternatif</th>
                                @foreach ($kriterias as $index => $kriteria)
                                    <th scope="col">kriteria {{ $index + 1 }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$ratarata)
                                <tr>
                                    <td colspan="5" class="text-center">data masih kosong.</td>
                                </tr>
                            @else
                                @foreach ($ratarata as $matriks)
                                    <tr>
                                        <td class="text-start">{{ $matriks->alternatif()->kode }}</td>
                                        <td class="text-start">{{ $matriks->alternatif()->alternatif }}</td>
                                        @foreach ($kriterias as $index => $kriteria)
                                            <td scope="col">
                                                {{ round($matriks->kriteria($kriteria->id), 2) }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                <tr></tr>
                            @endif
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>

    </div>
@endsection
