@extends('layouts.dashboard')

@section('page-contents')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Make Order For {{ $order->customer_name }}</h1><a
                href="{{ route('cart', $order->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fa-solid fa-cart-shopping fa-sm text-white-50"></i> View Order</a>
        </div>

        <div class="text-sm font-weight-bold text-secondary mb-5">
            Order Code : {{ $order->order_code }}</div>
        <div class="row" style="height: 100px">

            @foreach ($category as $item)
                <div class="col-xl-6 col-md-6 mb-4 h-100">
                    <a href="{{ route('select-product', [$order->id, $item->id]) }}" style="text-decoration: none">
                        <div class="card h-100 py-2">
                            <div class="card-body d-flex w-100 align-items-center px-5 h-100">
                                <div class="h4 font-weight-bold text-black w-75">{{ $item->name }}</div>
                                <div class="w-25 h-100">
                                    <div class="container-fluid align-items-center">
                                        <img src="{{ Storage::url($item->image) }}" alt="" class="w-75">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
