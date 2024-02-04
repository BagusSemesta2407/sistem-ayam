@extends('layouts.base')
@section('title')
    Pengeluaran
@endsection
@section('breadcrumb')
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Jenis Ayam</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Components</a>
                </li>
                <li class="breadcrumb-item active">Callout
                </li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body mt-2">
        <!-- Right Bordered Callouts start -->
        <section id="right-bordered-callouts">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Jenis Ayam</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                @foreach ($ayam as $item)
                                    <div class="bs-callout-info callout-border-right p-1 mt-2">
                                        <strong>{{ $item->jenis }}</strong>
                                        <a href="{{ route('pengeluaran.index-kandang', $item->id) }}">
                                            <i class="icon-arrow-right float-right text-dark"></i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Right Bordered Callouts end -->
    </div>
@endsection
