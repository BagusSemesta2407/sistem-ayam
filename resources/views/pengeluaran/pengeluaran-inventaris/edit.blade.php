@extends('layouts.base')
@section('title')
    Pengeluaran Inventaris
@endsection
@section('content')
    <div class="content-body mt-2">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form-center">Pengeluaran Inventaris</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="{{ route('pengeluaran.update-pengeluaran-inventaris', [$kandang, $pengeluaranInventaris]) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="eventInput1">Jenis Inventaris</label>
                                                    <select name="inventaris_id" class="form-control">
                                                        <option value="" selected disabled>Pilih Jenis Inventaris</option>
                                                        @foreach ($inventaris as $item)
                                                            <option value="{{ $item->id }}" {{ old('inventaris_id', $item->id == $pengeluaranInventaris->inventaris_id ? 'selected' : '') }}>{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="eventInput1">Waktu</label>
                                                    <input type="date" id="eventInput1" class="form-control" name="waktu" value="{{ old('waktu', $pengeluaranInventaris->waktu) }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="eventInput1">Kuantitas</label>
                                                    <input type="number" id="eventInput1" class="form-control" name="kuantitas" placeholder="Masukkan Kuantitas" value="{{ old('kuantitas', $pengeluaranInventaris->kuantitas) }}">
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
