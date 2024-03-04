@extends('layouts.base')
@section('title')
    Pengeluaran Ayam
@endsection
@section('content')
    <div class="content-body mt-2">
        <!-- Zero configuration table -->
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Pengeluaran Ayam</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <a href="{{ route('pengeluaran.create-pengeluaran-ayam', $kandang) }}">
                                    <button type="button" class="btn btn-info btn-min-width mr-1 mb-1">+ Tambah
                                        Data</button>
                                </a>
                                <table class="table table-striped table-bordered zero-configuration" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Jumlah Keluar Ayam</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengeluaranAyam as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->tanggal_keluar }}</td>
                                                <td>{{ $item->jumlah_keluar }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('pengeluaran.edit-pengeluaran-ayam', [$kandang, $item->id]) }}">
                                                        <button type="button" class="btn btn-icon btn-warning mr-1"><i
                                                                class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <button class="btn btn-icon btn-danger mr-1 delete"
                                                        data-url="{{ route('pengeluaran.destroy-pengeluaran-ayam', $item->id) }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
