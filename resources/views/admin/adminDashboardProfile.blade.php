@extends('layouts.admin')

@section('main')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Admin Profile</h5>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ Session::get('fail') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>S/N:</th>
                                <td>{{ $admin->id }}</td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $admin->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $admin->phone }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $admin->email }}</td>
                            </tr>
                            <tr>
                                <th>Mess name:</th>
                                <td>{{ $admin->mess_name }}</td>
                            </tr>
                            <tr>
                                <th>Location:</th>
                                <td>{{ $admin->location }}</td>
                            </tr>
                            <tr>
                                <th>Registration Date:</th>
                                <td>{{ $admin->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Last Update:</th>
                                <td>{{ $admin->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
