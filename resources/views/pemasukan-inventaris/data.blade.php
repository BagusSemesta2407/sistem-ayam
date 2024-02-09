@extends('layouts.base')
@section('title')
    Kelola Pemasukan Inventaris
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
                                {{ \Carbon\Carbon::parse($request->waktu)->format('d/m/Y') }}
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
                                            <th>Bahan Makanan/Obat</th>
                                            <th>Kuantitas</th>
                                            <th>Satuan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pemasukanInventaris as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->inventaris->nama }}</td>
                                                <td>{{ $item->kuantitas }}</td>
                                                <td>{{ $item->satuan }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('kelola-pemasukan-inventaris.get-pemasukan-inventaris-id', $item->id) }}"
                                                        id="edit">
                                                        <button type="button" class="btn btn-icon btn-warning mr-1"><i
                                                                class="fa fa-pencil"></i></button>
                                                    </a>

                                                    <button class="btn btn-icon btn-danger mr-1 delete"
                                                        data-url="{{ route('kelola-pemasukan-inventaris.destroy-pemasukan-inventaris', $item->id) }}">
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
        @if (count($pemasukanInventaris) > 0)
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
                                            action="{{ route('kelola-pemasukan-inventaris.update-pemasukan-inventaris', ['pemasukanInventarisId' => $item->id]) }}"
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
                                                                <option value="" selected disabled>Pilih Jenis
                                                                    Inventaris
                                                                </option>
                                                                @foreach ($inventaris as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('inventaris_id')
                                                                <span
                                                                    class="text-danger">{{ $errors->first('inventaris_id') }}</span>
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
                                                            <input type="number" id="eventInput1"
                                                                class="form-control @error('kuantitas')
                                                        is-invalid
                                                    @enderror"
                                                                name="kuantitas" placeholder="Masukkan Kuantitas">
                                                            @error('kuantitas')
                                                                <span
                                                                    class="text-danger">{{ $errors->first('kuantitas') }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="eventInput1">Satuan</label>
                                                            <select name="satuan" id=""
                                                                class="form-control @error('satuan')
                                                        is-invalid
                                                    @enderror">
                                                                <option value="" selected disabled>Pilih Satuan
                                                                </option>
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
                    url: '/kelola-pemasukan-inventaris/data/' + itemId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#form select[name="inventaris_id"]').val(data.inventaris_id);
                        $('#form select[name="satuan"]').val(data.satuan);
                        $('#form input[name="tanggal"]').val(data.tanggal);
                        $('#form input[name="waktu"]').val(data.waktu);
                        $('#form input[name="kuantitas"]').val(data.kuantitas);

                        $('#formEdit').show();
                        $('#form').attr('action', '/kelola-pemasukan-inventaris/data/' +
                            itemId);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
