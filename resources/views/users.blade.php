@extends('layouts.user')

@section('main')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">User Profile</h5>
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
                                <td>{{ $all_users->id }}</td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $all_users->name }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $all_users->email }}</td>
                            </tr>
                            <tr>
                                <th>Registration Date:</th>
                                <td>{{ $all_users->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Last Update:</th>
                                <td>{{ $all_users->updated_at }}</td>
                            </tr>
                            <tr>
                                <th>Action:</th>
                                <td>
                                    <a href="/edit/{{ $all_users->id }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
