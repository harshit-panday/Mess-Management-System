@extends('layouts.admin')

@section('main')

<style>
    /* Custom CSS for better aesthetics */
    .container-custom {
        max-width: 50rem;
        margin-top: 5rem;
    }
    .card-header-custom {
        background: linear-gradient(45deg, #007bff, #6610f2);
        color: white;
        padding: 15px 20px;
        font-size: 1.5rem;
        border-radius: 0.5rem 0.5rem 0 0;
    }
    .card-body-custom {
        padding: 30px 20px;
        background: #f8f9fa;
        border-radius: 0 0 0.5rem 0.5rem;
    }
    .btn-custom {
        background: linear-gradient(45deg, #007bff, #6610f2);
        color: white;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background 0.3s ease;
    }
    .btn-custom:hover {
        background: linear-gradient(45deg, #6610f2, #007bff);
        color: white;
    }
    .form-control {
        border-radius: 0.3rem;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .alert-warning {
        background-color: #ffedcc;
        color: #856404;
    }
</style>

<div class="container container-custom">
    <div class="card shadow-lg">
        <div class="card-header card-header-custom text-center">
            <h2>Edit Menu Details</h2>
        </div>
        <div class="card-body card-body-custom">
            <div class="row mb-4">
                <div class="col-sm-11">
                    <h4 class="text-left">Update the Menu Information Below</h4>
                </div>
                <div class="col-sm-1 text-right">
                    <a class="btn btn-custom btn-sm" href="{{ route('menus.Menu') }}" data-toggle="tooltip" data-placement="top" title="Go Back">
                        <i class="fa-solid fa-backward"></i>
                    </a>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Errors!</strong> Please check carefully....<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('menus.menuUpdate', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="breakfast" class="col-sm-3 col-form-label">Breakfast</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="breakfast" id="breakfast" value="{{ old('breakfast', $menu->breakfast) }}" placeholder="Enter Breakfast Menu">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lunch" class="col-sm-3 col-form-label">Lunch</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="lunch" id="lunch" value="{{ old('lunch', $menu->lunch) }}" placeholder="Enter Lunch Menu">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dinner" class="col-sm-3 col-form-label">Dinner</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="dinner" id="dinner" value="{{ old('dinner', $menu->dinner) }}" placeholder="Enter Dinner Menu">
                    </div>
                </div>

                <div class="form-group row mt-4 text-center">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-custom btn-lg shadow-lg">Update</button>
                        <a class="btn btn-danger btn-lg shadow-lg" href="{{ route('menus.Menu') }}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
