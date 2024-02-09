@extends('layouts.base')
@section('title')
    Data Kandang
@endsection
@section('content')
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
                                            <th>Tanggal</th>
                                            <th>Kuantitas</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produksi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->kandang->kode_kandang }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->kuantitas }}</td>
                                                <td>{{ $item->status }}</td>
                                                {{-- <td class="d-flex">
                                                <a href="{{ route('kelola-pemasukan-inventaris.edit-pemasukan-inventaris', $item->id) }}">
                                                    <button type="button" class="btn btn-icon btn-warning mr-1"><i
                                                            class="fa fa-pencil"></i></button>
                                                </a>

                                                <form action="{{ route('kelola-pemasukan-inventaris.destroy-pemasukan-inventaris', $item->id) }}" method="POST">
                                                    @method('DELETE')
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-icon btn-danger mr-1"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td> --}}
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
                url: '/laporan-produksi/getChartData',
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
