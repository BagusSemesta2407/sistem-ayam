@extends('layouts.base')
@section('title')
    Data Ayam
@endsection
@section('content')
    <div class="content-body mt-2">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form-center">Tambah Data Ayam</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="{{ route('ayam.store') }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="eventInput1">Jenis</label>
                                                    <input type="text" id="eventInput1" class="form-control @error('jenis')
                                                        is-invalid
                                                    @enderror"
                                                        placeholder="Masukkan Jenis Ayam" name="jenis">
                                                    @error('jenis')
                                                        <span
                                                            class="text-danger">{{ $errors->first('jenis') }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions center">
                                        <button type="submit" class="btn btn-info" id="btnSubmit">
                                            <i class="fa fa-check-square-o"></i> Save
                                            <span class="ball-clip-rotate-multiple ml-2 d-none" id="loader"
                                                style="width: 1rem; height: 1rem;" role="status">
                                            </span>
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
