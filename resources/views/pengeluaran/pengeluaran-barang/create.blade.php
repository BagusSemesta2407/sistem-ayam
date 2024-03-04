@extends('layouts.base')
@section('title')
    Pengeluaran Barang
@endsection
@section('content')
    <div class="content-body mt-2">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form-center">Tambah Data Inventaris Baru</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" id="form" action="{{ route('pengeluaran.post-pengeluaran-barang', $kandang) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="eventInput1">Jenis Inventaris</label>
                                                    <select name="barang_id" class="form-control">
                                                        <option value="" selected disabled>Pilih Jenis Inventaris</option>
                                                        @foreach ($barang as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }} ({{ $item->jumlah }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="eventInput1">Waktu</label>
                                                    <input type="date" id="eventInput1" class="form-control" name="waktu">
                                                </div>
                                                <div class="form-group">
                                                    <label for="eventInput1">Jumlah Pengeluaran</label>
                                                    <input type="number" id="eventInput1" class="form-control" name="jumlah_pengeluaran" placeholder="Masukkan Kuantitas">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions center">
                                        <button type="submit" class="btn btn-primary" id="btnSubmit">
                                            <i class="fa fa-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic form layout section end -->
    </div>
@endsection
