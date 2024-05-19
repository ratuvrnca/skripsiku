@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Data Kriteria</span>
                </div>
            </div>
            <ul class="list-group list-group-flush p-4">
                <li class="list-group-item table-responsive">

                    @if (auth()->user()->role === 'admin')
                    <button id="btn-sorting" class="btn btn-primary">Update Urutan</button>
                    @endif
                    <table class="table text-center table-bordered">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th scope="col" style="width: 50px">No</th>
                                <th scope="col">Nama Kriteria</th>
                                <th scope="col">Urutan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$data)
                                <tr>
                                    <td colspan="5" class="text-center">data masih kosong.</td>
                                </tr>
                            @else
                                <form id="form-sorting">
                                    @csrf
                                    @foreach ($data as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td class="text-start">{{ $item->kriteria }}</td>

                                            <td class="text-start">

                                    @if (auth()->user()->role === 'admin')
                                                <input type="number" class="form-control" value="{{ $item->urutan }}"
                                                    name="item[{{ $item->id }}]">
                                                    @else
                                                    {{ $item->urutan }}
                                                    @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr></tr>
                                </form>
                            @endif
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>

        <div class="card mt-5 border-0">
            <div class="card-header bg-danger py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold text-white">Nilai Bobot ROC</span>
                    <div class="d-flex" style="gap: 2rem">
                        @if (auth()->user()->role === 'admin')
                            <form action="{{ route('roc.hitung') }}" method="post">
                                @method('POST')
                                @csrf
                                <button class="btn btn-warning m-0">Hitung</button>
                            </form>
                        @endif
                        @if (auth()->user()->role === 'admin' && $dataResult)
                            <form action="{{ route('roc.reset') }}" method="post">
                                @method('POST')
                                @csrf
                                <button class="btn btn-danger m-0 ml-3"  onclick="return confirm('Apakah anda yakin ??')">Reset</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush p-4">
                <li class="list-group-item table-responsive">
                    <table class="table text-center table-bordered">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th style="width:50px" scope="col">No</th>
                                <th scope="col">Kriteria</th>
                                <th scope="col">Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($dataResult->count() == 0)
                                <tr>
                                    <td colspan="3" class="text-center">data masih kosong.</td>
                                </tr>
                            @else
                                @foreach ($dataResult as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td class="text-start">{{ $item->kriteria }}</td>
                                        <td>{{ $item->bobot }}</td>
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

@section('scripts')
    <script>
        $('#btn-sorting').on('click', async () => {
            let form = new FormData(document.getElementById('form-sorting'))
            let response = await fetch("{{ route('roc.sorting') }}", {
                method: 'POST',
                body: form
            });

            response = await response.json();

            alert(response.message)
        })
    </script>
@endsection
