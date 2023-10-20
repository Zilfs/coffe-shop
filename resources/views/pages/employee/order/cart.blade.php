@extends('layouts.dashboard')

@section('page-contents')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 text-gray-800">Order For {{ $order->customer_name }}</h1>
            <a href="{{ route('make-order', $order->id) }}"
                class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fa-solid fa-left-long"></i>
                Back</a>
        </div>
        <div class="d-flex flex-col card card-shadow px-4 py-4">
            <div class="row d-flex flex-row px-3">
                <div class="text-center col-1">#</div>
                <div class="text-center col-3">Product</div>
                <div class="text-center col-2">Price</div>
                <div class="text-center col-2">Qty</div>
                <div class="text-center col-2">Sub Total Price</div>
                <div class="text-center col-2">Action</div>
            </div>
            <hr class="sidebar-divider">
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
                <div class="d-flex flex-row align-items-center my-3">
                    <div class="text-center col-1 text-black">{{ $no++ }}</div>
                    <div class="text-center col-3 d-flex flex-row align-items-center">
                        <div class="container w-50">
                            <img src="{{ Storage::url($item->product->image) }}" alt="" srcset=""
                                class="w-75">
                        </div>
                        <div class="text-black">{{ $item->product->name }}</div>
                    </div>
                    <div class="text-center col-2 text-black">{{ $item->product->price }}</div>
                    <div class="text-center col-2 text-black">
                        {{ $item->qty }}
                    </div>
                    <div class="text-center col-2 text-black">{{ $item->qty * $item->product->price }}</div>
                    <div class="text-center col-2">
                        <div class="d-flex w-100">
                            <div class="w-50">
                                <a href="#" class="btn btn-warning w-100" data-toggle="modal"
                                    data-target="#orderItem{{ $item->id }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                            <div class="mx-2"></div>
                            <form action="{{ route('delete-cart', [$order->id, $item->id]) }}" method="POST"
                                class="w-50">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr class="sidebar-divider">
                <div class="modal fade" id="orderItem{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action=""></form>
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{ route('edit-cart', [$order->id, $item->id]) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="w-100 px-4 my-4 row">
                                        <div class="w-50 px-5">
                                            <img src="{{ Storage::url($item->product->image) }}" alt=""
                                                class="w-100">
                                        </div>
                                        <div class="w-50">
                                            {{ $item->product->name }}<input type="number" min="1"
                                                class="form-control w-100" value="{{ $item->qty }}" name="qty">
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-warning" type="button" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex flex-row card py-4 px-4 my-5 w-100 align-items-center">
            @if ($order->order_type == 'Take Away')
                <div class="w-50">
                    <div class="d-flex flex-column">
                        <div class="text-black font-weight-bold h4 mb-4">Order Desc </div>
                        <div class="">Order Code : {{ $order->order_code }}</div>
                        <div class="">Customer Name : {{ $order->customer_name }}</div>
                        <div class="">Order Type : {{ $order->order_type }}</div>
                    </div>
                </div>
                <div class="d-flex flex-row-reverse w-50">
                    <div class="d-flex flex-column">
                        <div class="text-black">Packaging Cost : </div>
                        <div class="text-black">+ $2500</div>
                        <div class="bg-warning w-100 my-2" style="height:2px"></div>
                        <div class="text-black">Total Price : </div>
                        <div class="text-black">${{ $total_price += 2500 }}</div>
                        <form action="{{ route('checkout', $order->id) }}" method="POST">
                            @csrf
                            <input type="number" hidden value="{{ $total_price }}" name="total_price">
                            <button type="submit" class="btn btn-warning">Checkout</button>
                        </form>>
                    </div>
                </div>
            @else
                <div class="w-50">
                    <div class="d-flex flex-column">
                        <div class="text-black font-weight-bold h4 mb-4">Order Desc </div>
                        <div class="">Order Code : {{ $order->order_code }}</div>
                        <div class="">Customer Name : {{ $order->customer_name }}</div>
                        <div class="">Order Type : {{ $order->order_type }}</div>
                    </div>
                </div>
                <div class="d-flex flex-row-reverse w-50">
                    <div class="d-flex flex-column">
                        <div class="text-black">Total Price : </div>
                        <div class="text-black">${{ $total_price }}</div>
                        <div class="bg-warning w-100 my-2" style="height:2px"></div>
                        <form action="{{ route('checkout', $order->id) }}" method="POST">
                            @csrf
                            <input type="number" hidden value="{{ $total_price }}" name="total_price">
                            <button type="submit" class="btn btn-warning">Checkout</button>
                        </form>
                    </div>
                </div>
            @endif

        </div>

    </div>
@endsection
