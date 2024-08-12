@extends('layouts.user')

@section('main')
    <div>
        <h1>Welcome, {{Auth::user()->name}}</h1>
    </div>
    <div class="user-input">
        <label for="username">Enter Mess name: {{Auth::user()->mess_name}}</label>

    </div>
    <div>
        <p>location : {{Auth::user()->location}}</p>
    </div>
    <header>
        <center>
            <h1>Today's Menu</h1>
        </center>
        
    </header>
    <div class="cards">
        <div class="card">
            <h3>Breakfast</h3><br>
            <p>Poha,<br><br>Vada,<br><br>idli,<br><br>masala idli </p>
        </div>
        <div class="card">
            <h3>Lunch</h3><br>
            <p>Plain rice ,<br><br> moong +masoor dal,<br><br> mix veg</p>
        </div>
        <div class="card">
            <h3>Dinner</h3><br>
            <p>Veg. fried rice,<br><br>dalmakhni,<br><br>aloosoyabean(gravy),<br><br>sujihalwa</p>
        </div>
    </div>
    <header>
        <center>
            <h1>Meal Log</h1>
        </center>
        
    </header>
    <div class="cards">
        <div class="card">
            <h3>Type</h3><br>
            <p>1. Breakfast</p>
            <p>2. Lunch</p>
            <p>3. Dinner</p>
        </div>
        <div class="card">
            <h3>Date</h3><br>
            <p>02-June-2024</p>
            <p>02-June-2024</p>
            <p>02-June-2024</p>
        </div>
        <div class="card">
            <h3>Time</h3><br>
            <p>9:00am to 11:00am</p>
            <p>11:30am to 02:00pm</p>
            <p>07:00pm to 10:00pm</p>
        </div>
    </div>
@endsection