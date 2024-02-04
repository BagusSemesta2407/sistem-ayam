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
                                <form class="form" action="{{ route('pemasukan-ayam.store-new-data-ayam') }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="eventInput1">Kandang</label>
                                                    <select name="kandang_id" class="form-control">
                                                        <option value="" selected disabled>Pilih Kandang</option>
                                                        @foreach ($kandang as $item)
                                                            <option value="{{ $item->id }}">{{ $item->kode_kandang }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="eventInput1">Tanggal Masuk</label>
                                                    <input type="date" id="eventInput1" class="form-control" name="tanggal_masuk">
                                                </div>
                                                <div class="form-group">
                                                    <h5>Jumlah Ayam</h5>
                                                    <div class="controls">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control touchspin" name="jumlah_ayam" required />
                                                        </div>
                                                    </div>
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
