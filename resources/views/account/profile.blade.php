@extends('layouts.user')

@section('main')

<style>
    /* Custom CSS for styling */
    .welcome-banner {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: #fff;
        padding: 40px 20px;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .welcome-banner h1 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .welcome-banner h3 {
        font-size: 1.25rem;
        margin-bottom: 5px;
    }

    .menu-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .menu-header h1 {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
        margin-bottom: 0;
    }

    .menu-header h1::after {
        content: '';
        width: 50px;
        height: 4px;
        background-color: #6a11cb;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 5px;
    }

    .card-custom {
        border: none;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
        background-color: #fff;
        text-align: center;
        padding: 30px 20px;
        margin-bottom: 30px;
    }

    .card-custom:hover {
        transform: translateY(-10px);
    }

    .card-custom i {
        font-size: 2.5rem;
        color: #6a11cb;
        margin-bottom: 15px;
    }

    .card-custom h3 {
        font-size: 1.5rem;
        margin-bottom: 15px;
        color: #333;
    }

    .card-custom p {
        font-size: 1rem;
        color: #555;
    }

    .container {
        max-width: 1200px;
        margin: auto;
    }
</style>

<div class="container mt-5">
    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <h1>Welcome, {{ Auth::user()->name }}</h1>
        <h3>Mess Name</h3>
        <h3>Location</h3>
    </div>

    <!-- Today's Menu Header -->
    <div class="menu-header">
        <h1>Today's Menu</h1>
    </div>

    <!-- Menu Cards -->
    <div class="row justify-content-center">
        <!-- Breakfast Card -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card card-custom">
                <i class="fa-solid fa-mug-saucer"></i>
                <h3>Breakfast</h3>
                <p><b>{{ Auth::user()->breakfast }}</b></p>
            </div>
        </div>

        <!-- Lunch Card -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card card-custom">
                <i class="fa-solid fa-burger"></i>
                <h3>Lunch</h3>
                <p><b>{{ Auth::user()->lunch }}</b></p>
            </div>
        </div>

        <!-- Dinner Card -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card card-custom">
                <i class="fa-solid fa-drumstick-bite"></i>
                <h3>Dinner</h3>
                <p><b>{{ Auth::user()->dinner }}</b></p>
            </div>
        </div>
    </div>
</div>

@endsection
