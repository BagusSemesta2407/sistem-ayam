@extends('layouts.base')
@section('title')
    Data Pengeluaran Ayam
@endsection
@section('content')
    <div class="content-body mt-2">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form-center">Tambah Data Pengeluaran Ayam</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" id="form" action="{{ route('pengeluaran.store-pengeluaran-ayam', $kandang) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="eventInput1">Tanggal Keluar</label>
                                                    <input type="date" id="eventInput1"
                                                        class="form-control @error('tanggal_keluar')
                                                        is-invalid
                                                    @enderror"
                                                        name="tanggal_keluar">
                                                    @error('tanggal_keluar')
                                                        <span class="text-danger">{{ $errors->first('tanggal_keluar') }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="">List Ayam</label>
                                                    @foreach ($pemasukanAyam as $item)
                                                        <fieldset class="checkboxsas">
                                                            <label>
                                                                <input type="checkbox" value="{{ $item->id }}" name="pemasukan_ayam_id[]">
                                                                {{ $item->kode_ayam }}
                                                            </label>
                                                        </fieldset>
                                                    @endforeach
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
