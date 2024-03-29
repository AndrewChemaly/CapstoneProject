
<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Hotel_Reservation;

    $admin_collection = $client->Hotel_Reservation->Admin;

    $customer_collection = $client->Hotel_Reservation->Customers;


    
    if (isset($_POST['submit'])) {
        
        $inputtedUsername = $_POST['username'];
        $inputtedPassword =  $_POST['password'];
        
        
        
        $flag = 0;
        // flag to check if login is successful
        
        
        // CUSTOMER LOGIN PART
        $CustomerResultCredentials = $customer_collection->find(['Username' => $inputtedUsername]);

        
        foreach ($CustomerResultCredentials as $searchFor) {



            $storedUsername = $searchFor['Username'];
            $storedPassword = $searchFor['Password'];



            // password_verify checks if the inputted password is = to the hashed password stored inside the database.
            if ($inputtedUsername == $storedUsername && password_verify($inputtedPassword, $storedPassword)) {
                //use session to store username and start it
                session_start();
                $_SESSION['username'] = $inputtedUsername;


                print("<script>window.alert('Welcome $inputtedUsername!')</script>");
                // Valid credentials were intered: Admin will get access and be redirected to the Admin page UI
                $flag = 1;


                // define("FIVE_DAYS", 60 * 60 * 24 * 5); // define constant
                // $h = $inputtedUsername . rand(1,100);
                // setcookie( "username", $h , time() + FIVE_DAYS );
                // //.rand(1,10000)

                // $customer_collection->updateOne(
                //     ['Username' => $inputtedUsername],
                //     ['$set' => ['Cookie' => $h]]
                // );
                // print("<script>window.alert('Welcome $inputtedUsername!')</script>");
                echo "<script> window.location.assign('main_page.php'); </script>";
            }
        }


        // ADMIN LOGIN PART
        $adminResultCredentials = $admin_collection->find(['Username' => $inputtedUsername]);


        foreach ($adminResultCredentials as $searchFor) {

            $storedUsername = $searchFor['Username'];
            $storedPassword = $searchFor['Password'];


            // password_verify checks if the inputted password is = to the hashed password stored inside the database.
            if ($inputtedUsername == $storedUsername && password_verify($inputtedPassword, $storedPassword)) {
                // Valid credentials were intered: Admin will get access and be redirected to the Admin page UI
                // session
                session_start();
                $_SESSION['username'] = $inputtedUsername;
                
                $flag = 1;

                // define("FIVE_DAYS", 60 * 60 * 24 * 5); // define constant
                // $h = $inputtedUsername . rand(1,100);
                // setcookie( "username", $h , time() + FIVE_DAYS );
                // //.rand(1,10000)

                // $admin_collection->updateOne(
                //     ['Username' => $inputtedUsername],
                //     ['$set' => ['Cookie' => $h]]
                // );

                print("<script>window.alert('Welcome Admin $inputtedUsername!')</script>");
                echo "<script> window.location.assign('main_page.php'); </script>";
            }
        }

        // in case the user or admin inputs wrong credentials, flag is set to 0 this message is displayed
        if ($flag == 0) {

            print("<script>window.alert('Wrong username or password!')</script>");
            // echo "Wrong Credentials!";
        }
    }
    ?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="navbar.css">
    <script src="navbar.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- this link is for the downwards arrow on Plan & book and services -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Open Sans', sans-serif;
            /* overflow: hidden; */
            background: url('login_pics/login2.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;

        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 93vh;
            animation: slide-in 0.5s ease-in-out;
        }

        @keyframes slide-in {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .card {
            width: 400px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
        }

        .card-header {
            padding: 20px;
            background-color: #37474f;
            color: #fff;
            text-align: center;
            font-size: 24px;
            font-weight: 600;
        }

        .card-body {
            padding: 20px;
        }

        label {
            display: block;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            margin-bottom: 20px;
            background-color: #e0e0e0;
            font-size: 16px;
            color: #333;
            font-weight: 400;
            max-width: 100%;
            position: relative;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(55, 71, 79, 0.2);
            outline: none;
            z-index: 1;
        }

        input[type="submit"] {
            background-color: #37474f;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            display: block;
            width: 100%;

        }

        input[type="submit"]:hover {
            background-color: #263238;
        }

        .forgotPassword {
            background-color: #37474f;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 10px;
        }

        .forgotPassword:hover {
            background-color: #263238;
        }

        .register {
            font-size: 14px;
            text-align: center;
            margin-top: 20px;
        }

        .register a {
            color: #37474f;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease-in-out;
        }

        .register a:hover {
            color: #263238;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
        }

        .toggle-password:hover {
            color: #333;
        }
    </style>
</head>


<header>
        <nav>
          <ul>
            <li><a href="main_page.php">Home Page</a></li>
            <div class="subnav">
              <!-- <li><a href="book.html">Book Room<i class="fa fa-caret-down"></i></a></li> -->
              <!-- <div class="subnav-content"> -->
              <!-- <li><a href="book.html">Book a Room</a></li> -->
              <!-- <li><a href="rooms.php">Room Status</a></li> -->
              <!-- </div> -->
              <div class="subnav">
                <li><a href="rooms.php">Book Room<i class=""></i></a></li>
                <!-- <div class="subnav-content"> -->
                <!-- <li><a href="book.html">Book a Room</a></li> -->
                <!-- <li><a href="rooms.php">Room Status</a></li> -->
                <!-- </div> -->
              </div>
            </div>
            <div class="subnav">
              <li><a href="dining.html">Facilities<i class="fa fa-caret-down"></i></a></li></button>
              <div class="subnav-content">
                <li><a href="dining.html">Dining</a></li>
                <li><a href="pool.html">Swimming Pool</a></li>
                <li><a href="gym.html">Gym</a></li>
                <!-- <li><a href="checkin.php">Check-in</a></li> -->
                <!--  -->
                <!-- <li><a href="admin.html">Admin</a></li> -->
              </div>
            </div>
            <!-- <li><a href="CovidRestrictions.html">Covid Restrictions</a></li> -->
            <li><a href="faq.html">FAQ</a>
            <li><a class="active" href="login.php">Login/Register</a>
            <!-- <?php
                if ($flag == 1) {
                  // add admin link
                  print '<li><a href="admin.html">Admin</a></li>';
                }
                ?> -->
          </ul>
  
          <!-- hamburger menu, only essentiel links -->
          <div class="topnav">
            <a href="main_page.php" class="active">
              <ion-icon name="airplane-outline"></ion-icon>
            </a>
            <div id="myLinks">
              <a href="rooms.php">Book a Room</a>
              <a href="login.php">Login</a>
              <a href="register.php">Register</a>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
              <i class="fa fa-bars"></i>
            </a>
        </nav>
      </header>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="post" action="login.php">
                    <label for="username">Username</label>
                    <input name="username" type="text" placeholder="Enter your username" required maxlength="20">

                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input name="password" type="password" placeholder="Enter your Password" required
                            maxlength="20">
                        <span class="toggle-password">&#128064;</span>
                    </div>

                    <input type="submit" name="submit" value="Login">
                    <button class="forgotPassword" type="button">Forgot Password?</button>
                    <p class="register"> Don't have an account yet? <a href="register.php">Create Your Account.</a></p>
                    <input type="reset" value="Clear All">
                </form>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('.toggle-password');
        const passwordField = document.querySelector('input[type="password"]');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            togglePassword.textContent = type === 'password' ? '👀' : '🙈';
        });
    </script>

</body>

</html>