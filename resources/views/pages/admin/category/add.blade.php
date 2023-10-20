@extends('layouts.dashboard')
@section('page-contents')
    <div class="container-fluid px-5">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
        </div>

        <div class="text-sm font-weight-bold text-secondary mb-5">
            Add New Category
        </div>
        <div class="row">
            <form action="{{ route('save-category') }}" class="w-100" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card card-shadow w-100 px-5 py-5">
                    <div class="row mb-3 w-100">
                        <div class="w-50 px-4   ">
                            <label for="name" class="form-label text-black">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="w-50 px-4">
                            <label for="image" class="form-label text-black">Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                    </div>

                </div>
                <div class="card card-shadow w-100 px-4 py-4 mt-5">
                    <button type="submit" class="btn btn-success w-100 mb-4">Save</button>
                    <a href="{{ route('data-categories') }}" class="btn btn-warning w-100">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
