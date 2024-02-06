@extends('layouts.base')
@section('title')
    Data Kandang
@endsection
@section('content')
    <div class="content-body mt-2">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form-center">Tambah Data Kandang</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" id="form" action="{{ route('kandang.store') }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="eventInput1">Jenis Ayam</label>
                                                    <select name="ayam_id"
                                                        class="form-control @error('ayam_id')
                                                        is-invalid
                                                    @enderror">
                                                        <option value="" selected disabled>Pilih Jenis Ayam</option>
                                                        @foreach ($ayam as $item)
                                                            <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('ayam_id')
                                                        <span class="text-danger">{{ $errors->first('ayam_id') }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="eventInput1">Kapasitas</label>
                                                    <input type="number" id="eventInput1"
                                                        class="form-control @error('kapasitas')
                                                        is-invalid
                                                    @enderror"
                                                        placeholder="Masukkan Kapasitas" name="kapasitas">

                                                    @error('kapasitas')
                                                        <span class="text-danger">{{ $errors->first('kapasitas') }}</span>
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
