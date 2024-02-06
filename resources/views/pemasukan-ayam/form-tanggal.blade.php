@extends('layouts.base')
@section('title')
    Kelola Pemasukan Ayam
@endsection
@section('content')
    <div class="content-body">
        <section id="basic-form-layouts">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-card-center">Pilih Waktu</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="{{ route('kelola-pemasukan-ayam.request-tanggal') }}"
                                    method="post">
                                    @csrf
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="eventRegInput1">Pilih Tanggal Masuk</label>
                                            <input type="date" id="eventRegInput1"
                                                class="form-control @error('tanggal_masuk')
                                                is-invalid
                                            @enderror"
                                                placeholder="name" name="tanggal_masuk">

                                            @error('tanggal_masuk')
                                                <span class="text-danger">{{ $errors->first('tanggal_masuk') }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-actions center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-check-square-o"></i> Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
