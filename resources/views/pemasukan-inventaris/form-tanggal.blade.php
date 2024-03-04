@extends('layouts.base')
@section('title')
    Kelola Pemasukan Inventaris
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
                                <form class="form"
                                    action="{{ route('laporan-pemasukan-inventaris.report-pemasukan-inventaris') }}"
                                    method="get">
                                    <div class="form-body d-flex">
                                        <div class="form-group col-md-4">
                                            <label for="eventRegInput1">Pilih Tanggal Awal</label>
                                            <input type="date" id="eventRegInput1"
                                                class="form-control @error('startDate')
                                                is-invalid
                                            @enderror"
                                                placeholder="name" name="startDate">

                                            @error('startDate')
                                                <span class="text-danger">{{ $errors->first('startDate') }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="eventRegInput1">Pilih Tanggal Akhir</label>
                                            <input type="date" id="eventRegInput1"
                                                class="form-control @error('endDate')
                                                is-invalid
                                            @enderror"
                                                placeholder="name" name="endDate">

                                            @error('endDate')
                                                <span class="text-danger">{{ $errors->first('endDate') }}</span>
                                            @enderror
                                        </div>
                                        <fieldset class="form-group col-md-4">
                                            <label for="eventRegInput1">Inventaris</label>
                                            <select name="inventaris_id" id="" class="form-control">
                                                <option value="" selected disabled>Pilih Inventaris</option>
                                                @foreach ($inventaris as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>

                                    <div class="form-actions center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-check-square-o"></i> Cari
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
