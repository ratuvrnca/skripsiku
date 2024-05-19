@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Data Kriteria</span>
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('kriteria.create') }}" class="btn btn-success m-0">+Tambah</a>
                    @endif
                </div>
            </div>
            <div class="card-body">

                <div class="my-2 p-3">
                    <form action="">
                        <div class="d-flex gap-3" style="align-items: center">
                            <input type="text" class="form-control" name="search"
                                value="{{ request()->get('search') }}">
                            <button class="btn btn-success m-0">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <table class="table text-center small table-bordered">
                    <thead class="bg-danger text-white">
                        <tr>
                            <th scope="col">No</th>
                            {{-- <th scope="col">Kode</th> --}}
                            <th scope="col">Kriteria</th>
                            {{-- <th scope="col">Bobot</th> --}}
                            <th scope="col">Tipe</th>
                            @if (auth()->user()->role === 'admin')
                                <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$data)
                            <tr>
                                <td colspan="5" class="text-center">data masih kosong.</td>
                            </tr>
                        @else
                            @foreach ($data as $kriteria)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    {{-- <td>{{ $kriteria->kode }}</td> --}}
                                    <td>{{ $kriteria->kriteria }}</td>
                                    {{-- <td>{{ $kriteria->bobot }}</td> --}}
                                    <td>{{ $kriteria->tipe }}</td>
                                    @if (auth()->user()->role === 'admin')
                                        <td class="d-flex gap-2 justify-content-center">
                                            <a href="{{ route('kriteria.edit', $kriteria->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-pencil text-sm"></i>
                                            </a>
                                            <form method="POST" action="{{ route('kriteria.destroy', $kriteria->id) }}">
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
            </div>
        </div>

    </div>
@endsection
