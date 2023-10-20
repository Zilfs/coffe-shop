@extends('layouts.dashboard')

@section('page-contents')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Employee</h1>
        </div>
    </div>

    <div class="row px-5">

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 font-weight-bold text-success text-uppercase mb-2">
                                Recent Order
                            </div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Order Code</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user-clock fa-4x text-gray-300"></i>
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
                                Orders Today
                            </div>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Lots of orders today</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">215,000 Transactions</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-cash-register fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action=""></form>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('add-order') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="w-100 px-4 my-4">
                            <label for="customer_name" class="form-label text-black">Customer Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                        </div>
                        <div class="w-100 px-4 my-4">
                            <label for="order_type" class="form-label text-black">Order Type</label>
                            <select class="form-select form-control" aria-label="Default select example" id="order_type"
                                name="order_type">
                                <option value="Dine-In" selected>Dine-In</option>
                                <option value="Take Away">Take Away</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add Order</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
