@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Range Nilai</span>
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('rangenilai.create') }}" class="btn btn-success m-0">+Tambah</a>
                    @endif
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center table-bordered">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Nilai</th>
                                @if (auth()->user()->role === 'admin')
                                    <th scope="col">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $rangenilai)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $rangenilai->keterangan }}</td>
                                    <td>{{ $rangenilai->nilai }}</td>
                                    @if (auth()->user()->role === 'admin')
                                        <td class="d-flex gap-2 justify-content-center">
                                            <a href="{{ route('rangenilai.edit', $rangenilai->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-pencil text-sm"></i>
                                            </a>
                                            <form method="POST"
                                                action="{{ route('rangenilai.destroy', $rangenilai->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')">
                                                    <i class="fa-solid fa-trash text-sm"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">data masih kosong.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>

    </div>
@endsection
