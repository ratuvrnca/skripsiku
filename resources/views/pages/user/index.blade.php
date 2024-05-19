@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Data Pengguna</span>
                    <a href="{{ route('user.create') }}" class="btn btn-success m-0">+Tambah</a>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center table-bordered">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Hak Akses</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$data)
                                <tr>
                                    <td colspan="5" class="text-center">data masih kosong.</td>
                                </tr>
                            @else
                                @foreach ($data as $alternatif)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $alternatif->name }}</td>
                                        <td>{{ $alternatif->email }}</td>
                                        <td>{{ $alternatif->role }}</td>
                                        <td class="d-flex gap-2 justify-content-center">
                                            <a href="{{ route('user.edit', $alternatif->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-pencil text-sm"></i>
                                            </a>
                                            <form method="POST"
                                                action="{{ route('user.destroy', $alternatif->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')">
                                                    <i class="fa-solid fa-trash text-sm"></i>
                                                </button>
                                            </form>
                                        </td>
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
