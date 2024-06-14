{{-- @extends('layouts.app')

@section('main') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    min-height: 100vh;
}
nav{
    width: 100%;
    height: 15vh;
    background: black;
}

.sidebar {
    background-color: rgb(0, 0, 255);
    /* background-color: #2c3e50; */
    color: #ecf0f1;
    width: 250px;
    padding: 20px;
    display: flex;
    flex-direction: column;
}

.sidebar h2 {
    margin-bottom: 20px;
}
.sidebar h2 img{
    text-align: center;
}
.sidebar ul a{
    display: block;
    height: 100%;
    width: 100%;
    line-height: 65px;
    font-size: 20px;
    color: white;
    padding-left: 40px;
    box-sizing: border-box;
    border-top: 1px solid rgba(255,255,255,.1);
    border-bottom: 1px solid black;
}
ul li:hover a{
    padding-left: 50px;
}
.sidebar ul a i{
    margin-right: 16px;
}

.main-content {
    flex: 1;
    padding: 20px;
}

header {
    margin-bottom: 20px;
}

.cards {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.card {
    background-color: #ecf0f1;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    flex: 1;
    min-width: 150px;
    text-align: center;
}

@media (max-width: 768px) {
    body {
        flex-direction: column;
    }
    
    .sidebar {
        width: 100%;
    }

    .main-content {
        padding: 10px;
    }

    .cards {
        flex-direction: column;
    }

    .card {
        margin-bottom: 20px;
    }
}

    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <img src="{{asset('images/Adminprofile.jpeg')}}" alt="" height="70px" width="80px" text-align="center">
        <ul>
            <li><a href=""><i class="fa-solid fa-qrcode"></i>Dashboard</a></li>
                <li><a href=""><i class="fa-solid fa-bars"></i>Menu</a></li>
                <li><a href="{{asset('images/Adminprofile.jpeg')}}"><i class="fa-solid fa-users"></i>Customer</a></li>
                <li><a href=""><i class="fa-solid fa-clipboard-user"></i>Attendance</a></li>
                <li><a href=""><i class="fa-solid fa-cart-shopping"></i>Payments</a></li>
                <li><a href=""><i class="fa-solid fa-user"></i>Profile</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div>
            <h1>Hello Customer...</h1>
        </div>
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
    </div>
</body>
</html>
{{-- 
@endsection --}}