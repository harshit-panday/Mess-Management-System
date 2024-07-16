@extends('layouts.admin')

@section('main')
            <h1>Welcome, Admin</h1>
        <header>
            <center>
                <h1>Today's Menu</h1>
            </center>
            
        </header>
        <div class="cards">
            <div class="card">
                <h3>Breakfast</h3>
                <p>Poha,<br><br>Vada,<br><br>idli,<br><br>masala idli </p>
            </div>
            <div class="card">
                <h3>Lunch</h3>
                <p>Plain rice ,<br><br> moong +masoor dal,<br><br> mix veg</p>
            </div>
            <div class="card">
                <h3>Dinner</h3>
                <p>Veg. fried rice,<br><br>dalmakhni,<br><br>aloosoyabean(gravy),<br><br>sujihalwa</p>
            </div>
        </div>

@endsection
