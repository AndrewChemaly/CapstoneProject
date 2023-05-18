<title>Login Form</title>
    <link rel="stylesheet" href="navbar.css">
    <script src="navbar.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- this link is for the downwards arrow on Plan & book and services -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>


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
            <li><a href="login.php">Login/Register</a>
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

      <h1>My Reservations</h1>

      <br>

      <br>

<?php
use MongoDB\Operation\Find;

require 'vendor/autoload.php';

session_start();

if (!isset($_SESSION["username"])) {
    echo "unauthorized";
    die();
}


$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Hotel_Reservation;



// $room_collection = $client->Hotel_Reservation->Rooms;

// $customer_collection = $client->Hotel_Reservation->Customers;

// $staff_collection = $client->Hotel_Reservation->Staff;

$booking_collection = $client->Hotel_Reservation->Bookings;

// $price_prediction = $client->Hotel_Reservation->Price_Prediction;

$customer_username = $_SESSION["username"];

print("<table>");
print("<thead>");
// print("<tr><th>BRN</th><th>Check-in Date</th><th>Check-out Date</th><th>Room Type</th><th>Number of Guests</th></tr>");
// print("<td>" . $entry['Brn'] . "</td><td>" . $entry['Customer_Username'] . "</td><td>" . $entry['room_id_booked'] . "</td><td>" . $entry['Check_In_Date'] . "</td>" . "<td>" . $entry['Check_Out_Date'] . "</td>" . "<td>" . $entry['Pool'] . "</td>" . "<td>" . $entry['Gym'] . "</td>" . "<td>" . $entry['Breakfast'] . "</td>" . "<td>" . $entry['Launch'] . "</td>" . "<td>" . $entry['Dinner'] . "</td></td>");
print("<tr><th>BRN</th><th>Customer Username</th><th>Room ID</th><th>Check In Date</th><th>Check Out Date</th><th>Pool</th><th>Gym</th><th>Breakfast</th><th>Launch</th><th>Dinner</th></tr>");
print("</thead>");
print("<tbody>");


$result = $booking_collection->find(array('Customer_Username' => $customer_username));
$result1 = $booking_collection->countDocuments(['Customer_Username' => $customer_username]);
// if not results
if ($result1 == 0) {
    print("<tr><td colspan='4'>No bookings found</td></tr>");
}
else
{
    foreach ($result as $entry) {
        print("<tr>");
        print("<td>" . $entry['Brn'] . "</td><td>" . $entry['Customer_Username'] . "</td><td>" . $entry['room_id_booked'] . "</td><td>" . $entry['Check_In_Date'] . "</td>" . "<td>" . $entry['Check_Out_Date'] . "</td>" . "<td>" . $entry['Pool'] . "</td>" . "<td>" . $entry['Gym'] . "</td>" . "<td>" . $entry['Breakfast'] . "</td>" . "<td>" . $entry['Launch'] . "</td>" . "<td>" . $entry['Dinner'] . "</td></td>");
        print("</tr>");
    }
}
print("</tbody>");
print("</table>");
?>  

<html>
    <body>

    <br>
    <br>
    <!-- add button to cancel Booking by entering Book ID -->
    <form action="MyReservations.php" method="post">
        <label for="Book_ID">Enter Book Referencing Number to cancel booking:</label>
        <input type="text" id="Book_ID" name="Book_ID"><br><br>
        <input type="submit" name="submit" value="Cancel Booking">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $Book_ID = (int) $_POST['Book_ID'];
        $result = $booking_collection->deleteOne(['Brn' => $Book_ID]);
        if ($result->getDeletedCount() == 1) {
            echo "Booking Cancelled";
        } else {
            echo "Booking not found";
        }
    }

    ?>



<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        h1 {
            margin-top: 0;
            padding: 30px;
            background: linear-gradient(0deg, rgba(34, 148, 195, 1) 0%, rgba(18, 2, 56, 1) 100%);
            color: #fff;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        /* Buttons */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .button:hover {
            background-color: #666;
        }

        .button-group {
            margin-bottom: 20px;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        /* Forms */
        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
        }

        input[type="submit"]:hover {
            background-color: #666;
        }

        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        form {
            display: inline;
        }

        a:hover {
      background-color: #666;
    }



    </style>
