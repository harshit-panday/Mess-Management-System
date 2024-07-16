<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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

        nav {
            width: 100%;
            height: 15vh;
            background: black;
        }

        .sidebar {
            background-color: rgb(0, 0, 255);
            color: #ecf0f1;
            width: 250px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100%;
        }

        .sidebar h3 {
            margin-bottom: 20px;
        }

        .sidebar ul a {
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

        ul li:hover a {
            padding-left: 50px;
        }

        .sidebar ul a i {
            margin-right: 16px;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            margin-left: 250px; /* Add this line to create space for the fixed sidebar */
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
                position: relative; /* Change position to relative for small screens */
                height: auto;
            }

            .main-content {
                padding: 10px;
                margin-left: 0; /* Remove the left margin for small screens */
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
            <li><a href=""><i class="fa-solid fa-money-check-dollar"></i>Payment</a></li>
            <li><a href="{{route('user')}}"><i class="fa-regular fa-address-card"></i>Profile</a></li>
            <li><a href=""><i class="fa-regular fa-address-card"></i>About</a></li>
            <li><a href="{{route('account.logout')}}"><i class="fa-solid fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        @yield('main')
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
</body>
</html>
