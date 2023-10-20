@extends('layouts.dashboard')
@section('page-contents')
    <div class="container-fluid px-5">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
        </div>

        <div class="text-sm font-weight-bold text-secondary mb-5">
            Edit Data Product
        </div>
        <div class="row">
            <form action="{{ route('update-product', $product->id) }}" class="w-100" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card card-shadow w-100 px-5 py-5">
                    <div class="row mb-3 w-100">
                        <div class="w-50 px-4   ">
                            <label for="name" class="form-label text-black">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $product->name }}" required>
                        </div>
                        <div class="w-50 px-4">
                            <label for="category_id" class="form-label text-black">Category</label>
                            <select class="form-select form-control" aria-label="Default select example" id="category_id"
                                name="category_id">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $product->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 w-100">
                        <div class="w-50 px-4   ">
                            <label for="price" class="form-label text-black">Price</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="{{ $product->price }}" required>
                        </div>
                        <div class="w-50 px-4">
                            <label for="image" class="form-label text-black">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>

                </div>
                <div class="card card-shadow w-100 px-4 py-4 mt-5">
                    <button type="submit" class="btn btn-warning w-100 mb-4">Update</button>
                    <a href="{{ route('data-product') }}" class="btn btn-danger w-100">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
