@extends('layouts.dashboard')

@section('page-contents')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Make Order For {{ $order->customer_name }}</h1> <a
                href="{{ route('make-order', $order->id) }}"
                class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fa-solid fa-left-long"></i>
                Back</a>
        </div>
        <div class="text-sm font-weight-bold text-secondary mb-4">
            Order Code : {{ $order->order_code }}</div>


        <h2 class="text-black mb-4">{{ $category->name }}</h2>
        <div class="row" style="height: 100px">
            @foreach ($product as $item)
                <div class="col-xl-6 col-md-6 mb-4 h-100">
                    <div class="card h-100 py-2">
                        <form action="{{ route('add-to-cart', [$order->id, $category->id]) }}" method="POST"
                            class="card-body d-flex w-100 align-items-center px-5 h-100">
                            @csrf
                            <div class="w-25 h-100 align-items-center">
                                <img src="{{ Storage::url($item->image) }}" alt="" class="h-100">
                            </div>
                            <div class="h4 font-weight-bold text-black w-75">{{ $item->name }}</div>
                            <input type="number" class="form-control w-25 mx-2" name="qty" id="qty"
                                min="1" required>
                            <input type="number" class="form-control w-25 mx-2" name="price" id="price"
                                value="{{ $item->price }}" hidden>
                            <input type="number" class="form-control w-25 mx-2" name="product_id" id="product_id"
                                value="{{ $item->id }}" hidden>
                            <button type="submit" class="btn btn-success">Add</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
