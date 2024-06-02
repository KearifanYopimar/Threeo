@extends('backend.layout.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="float-left">
                            <h6>Total Kategori</h6><br>
                            <span class="badge badge-primary">{{$totalKategori ?? 0}}</span>
                        </div>
                        <div class="float-right">
                            <i class="fa fa-box text-info"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="float-left">
                            <h6>Total Product</h6><br>
                            <span class="badge badge-warning">{{$totalProduct ?? 0}}</span>
                        </div>
                        <div class="float-right">
                            <i class="fa fa-shopping-bag text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="float-left">
                            <h6>Total Transaction</h6><br>
                            <span class="badge badge-danger">{{$totalTransaction ?? 0}}</span>
                        </div>
                        <div class="float-right">
                            <i class="fa fa-file-pdf text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="float-left">
                            <h6>Total Berita</h6><br>
                            <span class="badge badge-danger">{{$totalBerita ?? 0}}</span>
                        </div>
                        <div class="float-right">
                            <i class="fa fa-file text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
