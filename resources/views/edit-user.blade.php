@extends('layouts.user')

@section('main')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit User Profile</div>
            @if (Session::has('fail'))
                <div class="alert alert-danger p-2">{{ Session::get('fail') }}</div>
            @endif
            <div class="card-body">
                <form action="{{ route('EditUser') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name" placeholder="Enter your Name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email" placeholder="Enter email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="mess_name" class="form-label">Mess name</label>
                        <input type="mess_name" name="mess_name" value="{{ $user->mess_name }}" class="form-control" id="mess_name" placeholder="Enter mess name">
                        @error('mess_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" id="phone" placeholder="Enter phone number">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" value="{{ $user->location }}" class="form-control" id="location" placeholder="Enter Location">
                        @error('location')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
