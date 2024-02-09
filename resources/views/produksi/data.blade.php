@extends('layouts.base')
@section('title')
    Kelola Produki
@endsection
@section('content')

    <head>
        <style>
            #formEdit {
                display: none;
            }
        </style>
    </head>
    <div class="content-body mt-2">
        <!-- Zero configuration table -->
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                {{ \Carbon\Carbon::parse($request->tanggal)->format('d/m/Y') }}
                            </h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered zero-configuration" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kandang</th>
                                            <th>Kuantitas</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produksi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->kandang->kode_kandang }}</td>
                                                <td>{{ $item->kuantitas }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('kelola-produksi.get-produksi-id', $item->id) }}"
                                                        id="edit">
                                                        <button type="button" class="btn btn-icon btn-warning mr-1"><i
                                                                class="fa fa-pencil"></i></button>
                                                    </a>

                                                    <button class="btn btn-icon btn-danger mr-1 delete"
                                                        data-url="{{ route('kelola-produksi.destroy-produksi', $item->id) }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="formEdit">
        @if (count($produksi) > 0)
            <div class="content-body mt-2">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form-center">Edit Data Ayam</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form"
                                            action="{{ route('kelola-produksi.update-produksi', ['produksiId' => $item->id]) }}"
                                            enctype="multipart/form-data" method="POST" id="form">
                                            @csrf
                                            <div class="row justify-content-md-center">
                                                <div class="col-md-12">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label for="eventInput1">Kandang</label>
                                                            <select name="kandang_id" class="form-control">
                                                                <option value="" selected disabled>Pilih Kandang
                                                                </option>
                                                                @foreach ($kandang as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->kode_kandang }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="eventInput1">Tanggal</label>
                                                            <input type="date" id="eventInput1"
                                                                class="form-control @error('tanggal')
                                                            is-invalid
                                                        @enderror"
                                                                placeholder="Masukkan tanggal Ayam" name="tanggal">
                                                            @error('tanggal')
                                                                <span
                                                                    class="text-danger">{{ $errors->first('tanggal') }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="eventInput1">Kuantitas</label>
                                                            <input type="number" id="eventInput1"
                                                                class="form-control @error('kuantitas')
                                                            is-invalid
                                                        @enderror"
                                                                placeholder="Masukkan kuantitas Ayam" name="kuantitas">
                                                            @error('kuantitas')
                                                                <span
                                                                    class="text-danger">{{ $errors->first('kuantitas') }}</span>
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
        @endif

    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('a#edit').on('click', function(e) {
                e.preventDefault();

                var itemId = $(this).attr('href').split('/').pop();
                console.log(itemId);

                $.ajax({
                    url: '/kelola-produksi/data/' + itemId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#form select[name="kandang_id"]').val(data.kandang_id);
                        $('#form input[name="tanggal"]').val(data.tanggal);
                        $('#form input[name="kuantitas"]').val(data.kuantitas);

                        $('#formEdit').show();
                        $('#form').attr('action', '/kelola-produksi/data/' + itemId);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
