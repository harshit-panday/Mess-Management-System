
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Management System</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
     crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />

    <!-- css file link -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg" style="background-color:aqua">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_registration.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product">
      </form>
    </div>
  </div>
</nav>





<!-- website ka introduction wala part -->
<div class="bg-light">
  <h3 class="text-center">Mess Management System</h3>
  <p class="text-center">The Mess Management System (MMS) dashboard is a centralized interface designed to provide administrators with a comprehensive view of mess operations and facilitate efficient management.
</p>
</div>

<nav class="navbar navbar-expand-lg" style="background-color: aquamarine;">
  <div class="container d-flex justify-content-center">
    <ul class="navbar-nav d-flex flex-row">
      <li class="nav-item mx-2">
        <a class="nav-link" href="{{url('/account/login')}}" style="align-items: center; justify-content: center;">
          <img src="{{asset('images/user.png')}}" style="width: 150px; height: 150px; display: block; margin: auto;"><center>User Login</center>
        </a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link" href="{{url('/account/login')}}" style="align-items: center; justify-content: center;">
          <img src="{{asset('images/admin.png')}}" style="width: 150px; height: 150px; display: block; margin: auto;"><center>Admin Login</center>
        </a>
      </li>
    </ul>
  </div>
</nav>

<div class="service-container">
                        <div class="service-item">
                            
                            <h6 class="title">User Registration and Login:</h6>
                            <p> Secure user and admin accounts.</p>
                        </div>
                        <div class="service-item">
                  
                            <h6 class="title">Meal Planning and Scheduling</h6>
                            <p>Users view/select meal plans; admins schedule menus.</p>
                        </div>
                        <div class="service-item">
                            
                            <h6 class="title">Subscription Management</h6>
                            <p>Users subscribe to meal plans (daily, weekly, monthly).</p>
                        </div>
                        <div class="service-item">
                            
                            <h6 class="title">Attendance and Booking</h6>
                            <p>Tracks meal attendance and allows advance booking.</p>
                        </div>
                        <div class="service-item">
                      
                            <h6 class="title">Admin Dashboard</h6>
                            <p>Provides analytics and a comprehensive view of operations</p>
                        </div>
                        <div class="service-item">
                            
                            <h6 class="title">Billing and Payments</h6>
                            <p> Generates invoices and integrates with payment gateways.</p>
                        </div>
                        <div class="service-item">
                            
                            <h6 class="title">Feedback and Complaints</h6>
                            <p>Users provide feedback; system logs complaints</p>
                        </div>
                    </div>






<!--footer wala page hey ye include footer.php -->
<footer class="footer" style="background-color: aqua; padding: 3px; text-align:center">
<p>All right of this site are reserved.</p>
    

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
 crossorigin="anonymous"></script>
</body>
</html>