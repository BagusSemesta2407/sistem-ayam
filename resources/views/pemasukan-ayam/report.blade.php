@extends('layouts.base')
@section('title')
    Data Kandang
@endsection
@section('content')
    <div class="card mt-2">
        <div class="card-content collapse show">
            <div class="card-body">
                <form action="{{ route('laporan-pemasukan-ayam.data-pemasukan-ayam') }}" class="form-horizontal"
                    style="padding-bottom: 10px;border-bottom: 1px solid #d7d6d6; margin-bottom: 20px;">
                    <div class="row align-items-center">
                        <div class="col-md-2 col-sm-12">
                            <label for="startDate" class="label-control">
                                Tanggal Awal
                            </label>

                            <input type="date" class="form-control" name="startDate" id="startDate"
                                value="{{ old('startDate', request()->startDate) }}" placeholder="Tanggal Awal">
                        </div>

                        <div class="col-md-2 col-sm-12">
                            <label for="endDate" class="label-control">
                                Tanggal Akhir
                            </label>

                            <input type="date" class="form-control" name="endDate" id="endDate"
                                value="{{ old('endDate', request()->endDate) }}" placeholder="Tanggal Akhir">
                        </div>

                        <div class="col-md-2 col-sm-12">
                            <label for="kandang_id" class="label-control">
                                Kandang
                            </label>

                            <select name="kandang_id" class="form-control" id="kandang_id">
                                <option value="" selected>
                                    Pilih Kandang
                                </option>

                                @foreach ($kandang as $item)
                                    <option value="{{ $item->id }}"
                                        {{ request()->kandang_id ? (request()->kandang_id == $item->id ? 'selected' : '') : '' }}>
                                        {{ $item->kode_kandang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2 col-sm-12 d-flex mt-auto">
                            <button type="submit" class="btn btn-info btn-block">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="content-body mt-2">
        <section id="google-bar-charts">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Stacked Bar Chart</h4>
                            <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div id="stacked-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Zero configuration table -->
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Kandang</h4>
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
                                            <th>Jenis Ayam</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Kuantitas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pemasukanAyam as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->kandang->kode_kandang }}</td>
                                                <td>{{ $item->kandang->ayam->jenis }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->waktu)->translatedFormat('d F Y') }}
                                                <td>{{ $item->kuantitas }}</td>
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
@endsection
@section('script')
    <script type="text/javascript">
        google.load('visualization', '1.0', {
            'packages': ['corechart']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(loadChartData);

        // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
        function drawBarStacked(data) {
            // Create the data table using the fetched data.
            var chartData = google.visualization.arrayToDataTable(data);

            // Set chart options
            var options_bar_stacked = {
                height: 400,
                fontSize: 12,
                colors: ['#99B898', '#FECEA8', '#FF847C', '#E84A5F', '#474747', '#4287f5'],
                chartArea: {
                    left: '5%',
                    width: '90%',
                    height: 350
                },
                isStacked: true,
                hAxis: {
                    gridlines: {
                        color: '#e9e9e9',
                        count: 10
                    },
                    minValue: 0
                },
                legend: {
                    position: 'top',
                    alignment: 'center',
                    textStyle: {
                        fontSize: 12
                    }
                }
            };

            // Instantiate and draw our chart, passing in some options.
            var bar = new google.visualization.BarChart(document.getElementById('stacked-bar-chart'));
            bar.draw(chartData, options_bar_stacked);
        }

        function loadChartData() {
            $.ajax({
                url: '/laporan-pemasukan-ayam/getChartData',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    drawBarStacked(response.data);
                    console.log(response.data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Resize chart
        // ------------------------------

        $(function() {

            // Resize chart on menu width change and window resize
            $(window).on('resize', resize);
            $(".menu-toggle").on('click', resize);

            // Resize function
            function resize() {
                drawBarStacked();
            }
        });
    </script>
@endsection
