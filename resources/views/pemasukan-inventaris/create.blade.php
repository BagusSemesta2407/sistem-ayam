@extends('layouts.base')
@section('title')
    Data Inventaris Baru
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
                                <form class="form" id="form"
                                    action="{{ route('pemasukan-inventaris.store-data-new') }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="eventInput1">Jenis Inventaris</label>
                                                    <select name="inventaris_id"
                                                        class="form-control @error('inventaris_id')
                                                    is-invalid
                                                @enderror">
                                                        <option value="" selected disabled>Pilih Jenis Inventaris
                                                        </option>
                                                        @foreach ($inventaris as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('inventaris_id')
                                                        <span class="text-danger">{{ $errors->first('inventaris_id') }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="eventInput1">Waktu</label>
                                                    <input type="date" id="eventInput1"
                                                        class="form-control @error('waktu')
                                                        is-invalid
                                                    @enderror"
                                                        name="waktu">
                                                    @error('waktu')
                                                        <span class="text-danger">{{ $errors->first('waktu') }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="eventInput1">Kuantitas</label>
                                                    <input type="number" id="eventInput1" class="form-control @error('kuantitas')
                                                    is-invalid
                                                @enderror"
                                                        name="kuantitas" placeholder="Masukkan Kuantitas">
                                                    @error('kuantitas')
                                                        <span class="text-danger">{{ $errors->first('kuantitas') }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="eventInput1">Satuan</label>
                                                    <select name="satuan" id=""
                                                        class="form-control @error('satuan')
                                                    is-invalid
                                                @enderror">
                                                        <option value="" selected disabled>Pilih Satuan</option>
                                                        <option value="Kg">Kg</option>
                                                        <option value="Botol">Botol</option>
                                                    </select>
                                                    @error('satuan')
                                                        <span class="text-danger">{{ $errors->first('satuan') }}</span>
                                                    @enderror
                                                </div>
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
