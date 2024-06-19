<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
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
        <h3>Customer Dashboard</h3>
        <ul>
            <li><a href="index.html"><i class="fa-solid fa-qrcode"></i>Dashboard</a></li>
                <li><a href=""><i class="fa-solid fa-bars"></i>Menu</a></li>
                <li><a href=""><i class="fa-solid fa-weight-scale"></i>Meal Log</a></li>
                <li><a href=""><i class="fa-solid fa-border-all"></i>Total Meal</a></li>
                <li><a href=""><i class="fa-solid fa-cart-shopping"></i>Payment</a></li>
                <li><a href=""><i class="fa-regular fa-address-card"></i>About</a></li>
                <li><a href="{{route('account.logout')}}"><i class="fa-solid fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div>
            <h1>Welcome, {{Auth::user()->name}}</h1>
        </div>
        <div class="user-input">
            <label for="username">Enter Mess name:</label>
        
        </div>
        <div>
            <p>location :</p>
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
    </div>
</body>
</html>
