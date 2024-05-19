@extends('layouts.master')
@section('main')


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-import" action="{{ route('alternatif.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="file">File Upload</label>
                            <input type="file" class="form-control" accept="text/csv" name="file">
                        </div>
                    </form>
                    <p>
                        <b>NB: </b><br>
                        Import data akan menghapus semua data alternatif beserta matriks yang telah di input sebelumnya
                    </p>
                    <a href="{{ url('/template.csv') }}" target="_blank" class="btn btn-primary">Download Template</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="btn-import">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Data Alternatif</span>
                    <div class="d-flex gap-3">
                        @if (auth()->user()->role === 'admin')
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary m-0" data-toggle="modal" data-target="#exampleModal">
                            Import Data
                        </button>

                            <a href="{{ route('alternatif.create') }}" class="btn btn-success m-0">+Tambah</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="my-2 p-3">
                <form action="">
                    <div class="d-flex gap-3" style="align-items: center">
                        <input type="text" class="form-control" name="search" value="{{ request()->get('search') }}">
                        <button class="btn btn-success m-0">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="table-responsive">
                        <table class="table text-center table-bordered">
                            <thead class="bg-danger text-white">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Alternatif</th>
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
                                    @foreach ($data as $alternatif)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $alternatif->kode }}</td>
                                            <td>{{ $alternatif->alternatif }}</td>
                                            @if (auth()->user()->role === 'admin')
                                                <td class="d-flex gap-2 justify-content-center">
                                                    <a href="{{ route('alternatif.edit', $alternatif->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa-solid fa-pencil text-sm"></i>
                                                    </a>
                                                    <form method="POST"
                                                        action="{{ route('alternatif.destroy', $alternatif->id) }}">
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
                </li>
            </ul>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $('#btn-import').on('click', function() {
            if (confirm('Apakah anda yakin ?')) {
                $('#form-import').submit();
            }
        })
    </script>
@endsection
