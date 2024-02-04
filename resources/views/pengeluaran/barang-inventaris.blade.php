@extends('layouts.base')
@section('title')
    Pengeluaran Barang - Inventaris
@endsection
@section('content')
    <div class="content-body mt-5">
        <!-- Recent Orders -->
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card white bg-info text-center">
                    <div class="card-content">
                        <div class="card-body py-3">
                            <img src="{{ asset('barang.png') }}" alt="element 01" width="200"
                                class="float-left">
                            <h4 class="white mt-3 mb-2">Barang</h4>
                            <p class="card-text">Pencatatan pengeluaran barang pada kandang {{ $kandang->kode_kandang }}</p>
                            <a href="{{ route('pengeluaran.pengeluaran-barang', $kandang) }}">
                                <button class="btn btn-info btn-darken-3">Klik Disini</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card bg-info">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-left media-middle">
                                    <i class="ft-bar-chart-2 white font-large-2 float-left"></i>
                                </div>
                                <div class="media-body white text-right">
                                    <h3 class="white">1,278</h3>
                                    <span>Most Loved</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="card white bg-info text-center">
                    <div class="card-content">
                        <div class="card-body py-3">
                            <img src="{{ asset('dedak.png') }}" alt="element 01" width="340"
                                class="float-left">
                            <h4 class="white mt-3 mb-2">Inventaris (Bahan Makanan/Obat)</h4>
                            <p class="card-text">Pencatatan pengeluaran inventaris pada kandang {{ $kandang->kode_kandang }}</p>
                            <a href="{{ route('pengeluaran.pengeluaran-inventaris', $kandang) }}">
                                <button class="btn btn-info btn-darken-3">Klik Disini</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card bg-info">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-left media-middle">
                                    <i class="ft-bar-chart-2 white font-large-2 float-left"></i>
                                </div>
                                <div class="media-body white text-right">
                                    <h3 class="white">1,278</h3>
                                    <span>Most Loved</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
