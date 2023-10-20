@extends('layouts.dashboard')
@section('page-contents')
    <div class="container-fluid px-5">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
        </div>

        <div class="text-sm font-weight-bold text-secondary mb-5">
            Add New User
        </div>
        <div class="row">
            <form action="{{ route('save-user') }}" class="w-100" method="POST">
                @csrf
                <div class="card card-shadow w-100 px-5 py-5">
                    <div class="row mb-3 w-100">
                        <div class="w-50 px-4">
                            <label for="email" class="form-label text-black">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="w-50 px-4">
                            <label for="username" class="form-label text-black">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                    </div>
                    <div class="row mb-3 w-100">
                        <div class="w-50 px-4 d-flex flex-column">
                            <div class="w-100 mb-2">
                                <label for="password" class="form-label text-black">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="form-check" data-aos="fade-up">
                                <input class="form-check-input" type="checkbox" role="switch" id="check_password"
                                    name="check_password" onclick="show_password()">
                                <label class="form-check-label" for="check_password">Show Password</label>
                            </div>
                        </div>
                        <div class="w-50 px-4">
                            <label for="roles" class="form-label text-black">Roles</label>
                            <select class="form-select form-control" aria-label="Default select example" id="roles"
                                name="roles">
                                <option value="ADMIN">Admin</option>
                                <option value="MANAGER">Manager</option>
                                <option value="EMPLOYEE">Employee</option>
                            </select>
                        </div>
                    </div>

                    <div class="card card-shadow w-100 px-4 py-4 mt-5">
                        <button type="submit" class="btn btn-success w-100 mb-4">Save</button>
                        <a href="{{ route('data-user') }}" class="btn btn-warning w-100">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
