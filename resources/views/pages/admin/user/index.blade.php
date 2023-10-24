@extends('layouts.dashboard')
@section('page-contents')
    <div class="container-fluid px-5">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="text-sm font-weight-bold text-secondary">
            Users Data
        </div>
        <div class="card card-shadow w-100 px-4 py-4 my-5">
            <a href="{{ route('add-user') }}" class="btn btn-primary w-100">+ Add New Data</a>
        </div>
        <div class="row">
            <div class="card card-shadow w-100 px-5 py-5">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->roles }}</td>
                                <td>
                                    <div class="d-flex w-100">
                                        <div class="w-50">
                                            <a href="{{ route('edit-user', $item->id) }}" class="btn btn-warning w-100"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        </div>
                                        <div class="mx-2"></div>
                                        <form action="{{ route('delete-user', $item->id) }}" method="POST" class="w-50">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-100"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
