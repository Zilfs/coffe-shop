@extends('layouts.dashboard')
@section('page-contents')
    <div class="container-fluid px-5">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="text-sm font-weight-bold text-secondary mb-5">
            Categories Data
        </div>
        <div class="row col-12 px-5">

            <div class="col-2 text-black">
                <h1 class="h5"><b>#</b></h1>
            </div>
            <div class="col-2 text-black">
                <h1 class="h5"><b>Id</b></h1>
            </div>
            <div class="col-3 text-black">
                <h1 class="h5"><b>Name</b></h1>
            </div>
            <div class="col-3 text-black">
                <h1 class="h5"><b>Image</b></h1>
            </div>
            <div class="col-2 text-black">
                <h1 class="h5"><b>Action</b></h1>
            </div>
        </div>
        <hr class="sidebar-divider">
        @php
            $no = 1;
        @endphp
        @foreach ($category as $item)
            <div class="card card-shadow w-100 px-5 py-3 mb-4">
                <div class="row col-12 align-items-center">
                    <div class="col-2 text-black h5">{{ $no++ }}</div>
                    <div class="col-2 text-black h5">{{ $item->id }}</div>
                    <div class="col-3 text-black h5">{{ $item->name }}</div>
                    <div class="col-3">
                        <img src="{{ Storage::url($item->image) }}" alt="" class="w-25">
                    </div>
                    <div class="col-2">
                        <div class="d-flex w-100">
                            <div class="w-50">
                                <a href="{{ route('edit-category', $item->id) }}" class="btn btn-warning w-100"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                            <div class="mx-2"></div>
                            <form action="{{ route('delete-category', $item->id) }}" method="POST" class="w-50">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        @endforeach

        <div class="row">
            <div class="card card-shadow w-100 px-4 py-4 mt-5">
                <a href="{{ route('add-category') }}" class="btn btn-primary w-100">+ Add New Category</a>
            </div>
        </div>
    </div>
@endsection
