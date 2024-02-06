@extends('layouts.base')
@section('title')
    Data Barang
@endsection
@section('content')
    <div class="content-body mt-2">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form-center">Edit Data Barang</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" id="form" action="{{ route('barang.update', $barang) }}" enctype="multipart/form-data" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="eventInput1">Nama Barang</label>
                                                <input type="text" id="eventInput1" class="form-control"
                                                    placeholder="Masukkan Nama Barang" name="nama" value="{{ old('nama', $barang->nama) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="eventInput1">Jumlah Barang</label>
                                                <input type="number" id="eventInput1" class="form-control"
                                                    placeholder="Masukkan Jumlah Barang" name="jumlah" value="{{ old('jumlah', $barang->jumlah) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions center">
                                        <button type="submit" class="btn btn-primary">
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
