@extends('layouts.dashboard')

@section('page-contents')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Manager</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="text-sm font-weight-bold text-secondary mb-5">
            Look what you've made 😁</div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 font-weight-bold text-success text-uppercase mb-2">
                                    Your Revenue
                                </div>
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Income</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-4x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 font-weight-bold text-info text-uppercase mb-2">
                                    Transactions
                                </div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Transaction</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">215,000 Transactions</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-cash-register fa-4x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Manager</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $managers }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-people-roof fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Regular Employee</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $employees }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-people-group fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Product Categories</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Products</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $products }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-mug-hot fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
