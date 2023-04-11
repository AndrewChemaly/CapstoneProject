<!DOCTYPE html>
<html>

<head>
    <title>Register Form</title>
    <link rel="stylesheet" href="navbar.css">
    <script src="navbar.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- this link is for the downwards arrow on Plan & book and services -->
    <!-- <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script> -->

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
            height: 110vh;
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
            width: 500px;
            /* height: 650px; */
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
            display: inline-block;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"],
        input[type="password"],
        input[type="card"] {
            width: 90%;
            padding: 8px;
            border: none;
            border-radius: 4px;
            margin-bottom: 10px;
            background-color: #e0e0e0;
            font-size: 16px;
            color: #333;
            font-weight: 400;
            /* max-width: 100%; */
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

        select {
            /* width: 90%; */
            padding: 8px;
            border: none;
            border-radius: 4px;
            margin-bottom: 10px;
            background-color: #e0e0e0;
            font-size: 16px;
            color: #333;
            font-weight: 400;
            /* max-width: 100%; */
            position: relative;
            transition: background-color 0.3s ease-in-out;
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

        @media only screen and (max-width: 1530px) {

            .card-header {
                font-size: 15px;
            }

            input[type="text"],
            input[type="password"],
            input[type="card"],
            input[type="submit"] {
                width: 70%;
                padding: 4px;
                margin-bottom: 3px;
            }

            label {
                display: block;
            }

            select {
                width: 70%;
                padding: 4px;
                margin-bottom: 3px;
            }

            /* need to make it responsive or keep it like that */
            /* #passwordDiv {
                display: none;
            }

            #cardDiv {
                display: none;
            }

            #emailDiv {
                display: none;
            }

            #usernameDiv {
                display: none;
            }

            #cvvDiv {
                display: none;
            } */

        }

        /* @media only screen and (max-width: 1360px) {

            .card-header {
                font-size: 10px;
            }

            input[type="text"],
            input[type="password"],
            input[type="card"],
            input[type="submit"] {
                width: 70%;
                padding: 4px;
                margin-bottom: 3px;
            }

            label {
                display: block;
            }

            select {
                width: 70%;
                padding: 4px;
                margin-bottom: 3px;
            }
        } */

            /* need to make it responsive or keep it like that */
            /* #passwordDiv {
                display: none;
            }

            #cardDiv {
                display: none;
            }

            #emailDiv {
                display: none;
            }

            #usernameDiv {
                display: none;
            }

            #cvvDiv {
                display: none;
            } */
    </style>
</head>


<header>
    <nav>
        <ul>
            <li><a class="active" href="main_page.php">Home Page</a></li>
            <div class="subnav">
                <li><a href="book.html">Book Room<i class="fa fa-caret-down"></i></a></li>
                <div class="subnav-content">
                    <li><a href="book.html">Book a Room</a></li>
                    <li><a href="flight_schedule_search.php">Room Status</a></li>
                    <!-- <li><a href="manage_booking.php">Manage Booking</a></li> -->
                    <!-- <li><a href="FlightStatus.php">Flight Status</a></li> -->
                </div>
            </div>
            <div class="subnav">
                <li><a href="PassengerServices.html">Facilities<i class="fa fa-caret-down"></i></a></li></button>
                <div class="subnav-content">
                    <li><a href="BaggageInfo.html">Dining</a></li>
                    <li><a href="PassengerServices.html">Swimming Pool</a></li>
                    <li><a href="cargo.html">Gym</a></li>
                    <!-- <li><a href="admin.html">Admin</a></li> -->
                </div>
            </div>
            <li><a href="CovidRestrictions.html">Covid Restrictions</a></li>
            <li><a href="Faq.html">FAQ</a>
            <li><a href="login.php">Login/Register</a>
        </ul>

        <!-- hamburger menu, only essentiel links -->
        <div class="topnav">
            <a href="main_page.php" class="active">
                <ion-icon name="airplane-outline"></ion-icon>
            </a>
            <div id="myLinks">
                <a href="book.html">Book a Room</a>
                <a href="checkin.php">Check-in</a>
                <a href="login.php">Login</a>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
    </nav>
</header>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form method="post" action="register.php">

                    <label for="fullname">Full Name</label>
                    <input name="fullname" id="fullname" type="text" placeholder="Enter your Full Name" required
                        maxlength="50">
                    <div id="fullnameDiv"></div>

                    <label for="username">Username</label>
                    <input name="username" id="username" type="text" placeholder="Enter your username" required
                        maxlength="20">
                    <div id="usernameDiv"></div>

                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input name="password" id="password" type="password" placeholder="Enter your Password"
                            onkeyup="passwordValidater()" required maxlength="20">
                        <!-- <span class="toggle-password">&#128064;</span> -->
                        <div id="passwordDiv"></div>

                    </div>

                    <label for="email">Email</label>
                    <input name="email" type="text" id="email" placeholder="Enter your Email" onkeyup="validateEmail()"
                        required maxlength="50">
                    <div id="emailDiv"></div>


                    <label for="CreditCard">Credit Card Number</label>
                    <input name="card" id="card" type="card" placeholder="4xxxxxxxxxxxxxxx (16 digits)"
                        onkeyup="validateCard()" required>
                    <div id="cardDiv"></div>

                    <label for="month">Expiry Month</label>
                    <select name="month" id="month">
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>

                    <label for="year">Expiry Year</label>
                    <select name="year" id="year">
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>
                        <option value="2033">2033</option>
                        <option value="2034">2034</option>
                        <option value="2035">2035</option>
                        <option value="2036">2036</option>
                        <option value="2037">2037</option>
                        <option value="2038">2038</option>
                        <option value="2039">2039</option>
                        <option value="2040">2040</option>
                        <option value="2041">2041</option>
                        <option value="2042">2042</option>
                        <option value="2043">2043</option>
                        <option value="2044">2044</option>
                        <option value="2045">2045</option>
                        <option value="2046">2046</option>
                        <option value="2047">2047</option>
                        <option value="2048">2048</option>
                        <option value="2049">2049</option>
                        <option value="2050">2050</option>
                    </select>

                    <br>
                    <label for="cvv">CVV</label>
                    <input name="cvv" id="cvv" type="text" placeholder="Enter your CVV" required maxlength="4">
                    <div id="cvvDiv"></div>


                    <input type="submit" name="submit" id="submit" value="Register">
                    <p class="register"> Already have an account yet? <a href="login.php">Login.</a></p>
                    <input type="reset" value="Clear All">
                </form>
            </div>
        </div>
    </div>

    <script>

        var checker = document.getElementById("submit");

        // ajax live username validation (if username is avaialble or not)
        try {
            var asyncRequest = new XMLHttpRequest(); // create request

            // set up callback function and store it
            asyncRequest.addEventListener("readystatechange",
                function () {
                    if (asyncRequest.readyState === 4 && asyncRequest.status === 200) usernameTable(asyncRequest.responseText);
                    //alert(asyncRequest.responseText);
                }, false);

            // send the asynchronous request
            asyncRequest.open("GET", "get_usernames.php", true);
            asyncRequest.setRequestHeader("Content-Type", "application/json");
            asyncRequest.send(); // send request        
        } // end try
        catch (exception) {
            alert("Request Failed");
        } // end catch 





        function usernameTable(response) {
            // window.alert(response);
            var flag = 0;
            var data = JSON.parse(response);
            var table = document.getElementById("usernameDiv");

            // window.alert(data);

            var x = document.getElementById("username");
            x.addEventListener("keyup", myFunction1);
            // myFunction0(data);

            function myFunction1() {
                var table = document.getElementById("usernameDiv");

                let x = document.getElementById("username");
                x.value = x.value.toLowerCase();

                for (var i = 0; i < data.length; i++) {
                    // window.alert(data[i]);
                    if (data[i] == x.value) {
                        flag = 1;
                        table.style.color = "red";
                        table.innerHTML = 'Username already exists! Please pick another one.';
                        checker.disabled = true;
                        return false;
                    } else {
                        table.style.color = "green";
                        table.innerHTML = 'Username Available!';
                        checker.disabled = false;
                    }
                }
            }
        }


        // var checker = document.getElementById("submit");

        // password complexity validation
        function passwordValidater() {
            var input_password = document.getElementById("password");
            var alert = document.getElementById("passwordDiv");

            if (input_password.value.length < 8) {
                // alert("Password must have at least 8 characters!");
                checker.disabled = true;
                alert.style.color = "red";
                alert.style.marginTop = "-10px";
                alert.style.padding = "7px";
                alert.innerHTML = "Password must be at least 8 characters long!";
                return false;
            } else {
                checker.disabled = false;
                alert.style.color = "green";
                alert.style.marginTop = "-10px";
                alert.style.padding = "7px";
                alert.innerHTML = "Password is valid!";
                return true;
            }
        }

        // Email Validation
        document.getElementById("email").addEventListener("blur", function () {
            validateEmail(this.value);
        }, false);

        function validateEmail(email) {
            var alert = document.getElementById("emailDiv");

            emailValid = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(email);
            // valid test case: test@gmail.com test@g.mail.com
            if (emailValid) {
                document.getElementById("emailDiv").style.color = "green";
                document.getElementById("emailDiv").innerHTML = "Valid Email";
                alert.style.marginTop = "-10px";
                alert.style.padding = "7px";
                checker.disabled = false;
            } else {
                document.getElementById("emailDiv").style.color = "red";
                document.getElementById("emailDiv").innerHTML = "Invalid Email";
                alert.style.marginTop = "-10px";
                alert.style.padding = "7px";
                checker.disabled = true;
            }
        }


        // Credit Card Visa Validation
        document.getElementById("card").addEventListener("blur", function () {
            validateCard(this.value);
        }, false);

        function validateCard(Card) {
            // window.alert("Card number is ");
            var alert = document.getElementById("cardDiv");


            // CardValid = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/.test(Card);
            CardValid = /^4[0-9]{12}(?:[0-9]{3})?$|^5[1-5][0-9]{14}$|^3[47][0-9]{13}$|^6(?:011|5[0-9]{2})[0-9]{12}$/.test(Card);

            // valid test case: 4111111111111111   4012888888881881  (must start with 4 and 16 digits)
            if (CardValid) {
                document.getElementById("cardDiv").innerHTML = "Valid Card number";
                document.getElementById("cardDiv").style.color = "green";
                alert.style.marginTop = "-10px";
                alert.style.padding = "7px";
                checker.disabled = false;
            } else {
                document.getElementById("cardDiv").innerHTML = "Invalid Card number";
                document.getElementById("cardDiv").style.color = "red";
                alert.style.marginTop = "-10px";
                alert.style.padding = "7px";
                checker.disabled = true;
            }
        }


        // CVV Validation
        document.getElementById("cvv").addEventListener("blur", function () {
            validateCvv(this.value);
        }, false);

        function validateCvv(Cvv) {
            // window.alert("Card number is ");
            var alert = document.getElementById("cvvDiv");

            CvvValid = /^[0-9]{3,4}$/.test(Cvv);
            // valid test case: 1234 4321 (3 or 4 digits)
            if (CvvValid) {
                document.getElementById("cvvDiv").innerHTML = "Valid CVV number";
                document.getElementById("cvvDiv").style.color = "green";
                alert.style.marginTop = "-10px";
                alert.style.padding = "7px";
                checker.disabled = false;
            } else {
                document.getElementById("cvvDiv").innerHTML = "Invalid CVV number";
                document.getElementById("cvvDiv").style.color = "red";
                alert.style.marginTop = "-10px";
                alert.style.padding = "7px";
                checker.disabled = true;
            }
        }



    </script>


    <?php

    require 'vendor/autoload.php';

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $database = $client->Hotel_Reservation;

    define("encryption_method", "AES-128-CBC");
    define("key", "Thats my Kung Fu");
    $customer_collection = $client->Hotel_Reservation->Customers;

    // print("<script>alert('here');</script>");
    


    function encrypt($data)
    {

        $key = key;
        $plaintext = $data;
        $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
        return $ciphertext;
    }

    function decrypt($data)
    {
        $key = key;
        $c = base64_decode($data);
        $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        if (hash_equals($hmac, $calcmac)) {
            return $original_plaintext;
        }
    }




    if (isset($_POST['submit'])) {


        $inputtedFullName = $_POST['fullname'];
        $inputtedUsername = $_POST['username'];
        $inputtedEmail = $_POST['email'];
        $inputtedPassword = $_POST['password'];
        $inputtedCard = $_POST['card'];
        $inputtedCVV = $_POST['cvv'];
        $inputtedMonth = $_POST['month'];
        $inputtedYear = $_POST['year'];

        $flag = 0;




        //this code part below was implemented before ajax, so when the user submits the form, it checks if the username already exists in the database and the user gets the error but
        //since we need to use ajax and its asynchronous, we will comment this method as its no longer needed as live updates are shown to the user.
    
        // USERNAME IS UNIQUE, WE CANNOT ALLOW 2 USERS TO HAVE THE SAME ONE!
        // $usernameResult = $customer_collection->find(['Username' => $inputtedUsername]);
        // foreach ($usernameResult as $searchFor) {
        //     $storedUsername = $searchFor['Username'];
        //     if ($inputtedUsername == $storedUsername) {
        //         $flag = 1;
        //     }
        // }
        // if ($flag == 1) {
        //     print("<script>window.alert('Username already exists! Please choose another one.');
        //     window.location.assign('register.php');
        //     </script>");
        //     die();
        // }
    


        $customer_collection = $client->Hotel_Reservation->Customers;

        $newCustomers = [
            [
                'Username' => $inputtedUsername,
                'Full_Name' => $inputtedFullName,
                // 'Cookie' => '',
                'Email' => $inputtedEmail,
                'Password' => password_hash($inputtedPassword, PASSWORD_DEFAULT),
                'Credit_Card_Number' => encrypt($inputtedCard),
                'Credit_Card_CVV' => encrypt($inputtedCVV),
                'Credit_Card_Expiration_Month' => $inputtedMonth,
                'Credit_Card_Expiration_Year' => $inputtedYear
            ],
        ];
        $insertManyResult = $customer_collection->insertMany($newCustomers);




        print("<script>window.alert('Successfuly registered $inputtedUsername in the database. You can now Login')</script>");
        echo "<script> window.location.assign('login.php'); </script>";
    }


    ?>

</body>

</html>