@extends('layouts.dashboard')

@section('page-contents')
    <div class="container-fluid">

        <div class="row" style="height: 100px">
            <div class="py-2 px-5 w-100 font-weight-bold text-black d-flex">
                <div class="col-1">#</div>
                <div class="col-3">Order Code</div>
                <div class="col-3">Income</div>
                <div class="col-3">Date</div>
                <div class="col-2">Action</div>
            </div>
            <hr class="sidebar-divider">
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card py-2">
                        <div class="row d-flex h-100 px-5 align-items-center py-2">
                            <div class="col-1">{{ $no++ }}</div>
                            <div class="col-3">{{ $item->order->order_code }}</div>
                            <div class="col-3">${{ $item->total_price }}</div>
                            <div class="col-3">{{ $item->date_time }}</div>
                            <div class="col-2"><a href="" class="btn btn-primary">Show Detail</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
