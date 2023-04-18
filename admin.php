<!DOCTYPE html>
<html>

<head>
    <title>Admin Page</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 16px;
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

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e6e6e6;
        }
    </style>

    <head>

</html>
<?php

use MongoDB\Operation\Find;

require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Hotel_Reservation;



$room_collection = $client->Hotel_Reservation->Rooms;

$customer_collection = $client->Hotel_Reservation->Customers;

$staff_collection = $client->Hotel_Reservation->Staff;

$booking_collection = $client->Hotel_Reservation->Bookings;


if (isset($_POST["show-all-rooms"]))
// Room ID , Price Per Night, Locationm Type, Status, Capacity
{
    print("<table>");
    print("<thead>");
    print("<tr><th>Room ID</th><th>Price Per Night</th><th>Location</th><th>Type</th><th>Status</th><th>Capacity</th></tr>");
    print("</thead>");
    print("<tbody>");

    $result = $room_collection->find();
    foreach ($result as $entry) {
        print("<tr>");
        print("<td>" . $entry['Room_Id'] . "</td><td>" . $entry['Price_per_Night'] . "</td><td>" . $entry['Location'] . "</td>" . "<td>" . $entry['Type'] . "</td>" . "<td>" . $entry['Status'] . "</td>" . "<td>" . $entry['Capacity'] . "</td>");
        print("</tr>");
    }
    print("</tbody>");
    print("</table>");
}

if (isset($_POST["show-all-reserved-rooms"])) {
    print("<table>");
    print("<thead>");
    print("<tr><th>Room ID</th><th>Price Per Night</th><th>Location</th><th>Type</th><th>Status</th><th>Capacity</th></tr>");
    print("</thead>");
    print("<tbody>");

    $result = $room_collection->find();
    //if the room Status is "Reserved" then show it

    foreach ($result as $entry) {
        if ($entry['Status'] == "Reserved") {
            print("<tr>");
            print("<td>" . $entry['Room_Id'] . "</td><td>" . $entry['Price_per_Night'] . "</td><td>" . $entry['Location'] . "</td>" . "<td>" . $entry['Type'] . "</td>" . "<td>" . $entry['Status'] . "</td>" . "<td>" . $entry['Capacity'] . "</td>");
            print("</tr>");
        }
    }
    print("</tbody>");
    print("</table>");
}

// show free rooms only
if (isset($_POST["show-all-free-rooms"])) {
    print("<table>");
    print("<thead>");
    print("<tr><th>Room ID</th><th>Price Per Night</th><th>Location</th><th>Type</th><th>Status</th><th>Capacity</th></tr>");
    print("</thead>");
    print("<tbody>");

    $result = $room_collection->find();
    //if the room Status is "Reserved" then show it

    foreach ($result as $entry) {
        if ($entry['Status'] == "Available") {
            print("<tr>");
            print("<td>" . $entry['Room_Id'] . "</td><td>" . $entry['Price_per_Night'] . "</td><td>" . $entry['Location'] . "</td>" . "<td>" . $entry['Type'] . "</td>" . "<td>" . $entry['Status'] . "</td>" . "<td>" . $entry['Capacity'] . "</td>");
            print("</tr>");
        }
    }
    print("</tbody>");
    print("</table>");
}


if (isset($_POST['add-room'])) {
    $room_id = (int) $_POST['room_id'];
    $price_per_night = (int) $_POST['price_per_night'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $capacity = (int) $_POST['capacity'];

    // check if room id exists,else error
    if ($room_collection->count(['Room_Id' => $room_id]) != 0) {
        print("<script>window.alert('Room ID already exists!')</script>");
        echo "<script> window.location.assign('admin.html'); </script>";
        return;
    }
    $room_collection->insertOne([
        'Room_Id' => $room_id,
        'Price_per_Night' => $price_per_night,
        'Location' => $location,
        'Type' => $type,
        'Status' => $status,
        'Capacity' => $capacity
    ]);
    // print in a table similar to the above ones the info of the added room
    // title of the table
    print("<h2>Room Added</h2>");
    print("<table>");
    print("<thead>");
    print("<tr><th>Room ID</th><th>Price Per Night</th><th>Location</th><th>Type</th><th>Status</th><th>Capacity</th></tr>");
    print("</thead>");
    print("<tbody>");
    print("<tr>");
    print("<td>" . $room_id . "</td><td>" . $price_per_night . "</td><td>" . $location . "</td>" . "<td>" . $type . "</td>" . "<td>" . $status . "</td>" . "<td>" . $capacity . "</td>");
    print("</tr>");
    print("</tbody>");
    print("</table>");
}

if (isset($_POST["free-the-room"])) {
    $room_id = (int) $_POST["room-id"];
    // check if room id exists,else error
    if ($room_collection->count(['Room_Id' => $room_id]) == 0) {
        print("<script>window.alert('Room ID does not exist!')</script>");
        return;
    }
    $room_collection->updateOne(
        ['Room_Id' => $room_id],
        ['$set' => ['Status' => 'Available']]
    );
    echo "<script>alert('Room " . $room_id . " is now free');</script>";
    echo "<script> window.location.assign('admin.html'); </script>";
}




// <button id="show-all-customers" class="button">Show All Customers</button>
// customer table has: Username Full Name Date Of Birth  Email Password Credit Card Number Credit Card CVV Credit Card Expiration Month Credit Card Expiration Year

// show all customers
if(isset($_POST['show-all-customers']))
{
    print("<table>");
    print("<thead>");
    print("<tr><th>Username</th><th>Full Name</th><th>Date Of Birth</th><th>Email</th><th>Password</th><th>Credit Card Number</th><th>Credit Card CVV</th><th>Credit Card Expiration Month</th><th>Credit Card Expiration Year</th></tr>");
    print("</thead>");
    print("<tbody>");

    $result = $customer_collection->find();
    foreach ($result as $entry) {
        print("<tr>");
        print("<td>" . $entry['Username'] . "</td><td>" . $entry['Full_Name'] . "</td><td>" . $entry['Date_Of_Birth'] . "</td>" . "<td>" . $entry['Email'] . "</td>" . "<td>" . $entry['Password'] . "</td>" . "<td>" . $entry['Credit_Card_Number'] . "</td>" . "<td>" . $entry['Credit_Card_CVV'] . "</td>" . "<td>" . $entry['Credit_Card_Expiration_Month'] . "</td>" . "<td>" . $entry['Credit_Card_Expiration_Year'] . "</td>");
        print("</tr>");
    }
    print("</tbody>");
    print("</table>");
}

// show all staff
// <form method="post" action="admin.php">
// <button id="show-all-staff" name="show-all-staff" class="button">Show All Staff</button>
// </form>
if(isset($_POST['show-all-staff']))
{
    print("<table>");
    print("<thead>");
    // staff has: Full Name, Date of Birth, Email, Phone Number, Salary, Position
    print("<tr><th>Full Name</th><th>Date Of Birth</th><th>Email</th><th>Phone Number</th><th>Salary</th><th>Position</th></tr>");
    print("</thead>");
    print("<tbody>");

    $result = $staff_collection->find();
    foreach ($result as $entry) {
        print("<tr>");
        print("<td>" . $entry['Full_Name'] . "</td><td>" . $entry['Date_of_Birth'] . "</td><td>" . $entry['Email'] . "</td>" . "<td>" . $entry['Phone_Number'] . "</td>" . "<td>" . $entry['Salary'] . "</td>" . "<td>" . $entry['Position'] . "</td>");
        print("</tr>");
    }
    print("</tbody>");
    print("</table>");
}


// <form method="post" action="admin.php">
// <button id="show-all-bookings" name="show-all-bookings" class="button">Show All Bookings</button>
// </form>
// show all bookings

if(isset($_POST['show-all-bookings'])){
    print("<table>");
    print("<thead>");
    print("<tr><th>BRN</th><th>Customer Username</th><th>Room ID Booked</th><th>People</th><th>Check In Date</th><th>Check Out Date</th><th>Pool</th><th>Gym</th><th>Breakfast</th><th>Launch</th><th>Dinner</th><th>Price</th></tr>");
    print("</thead>");
    print("<tbody>");

    $result = $booking_collection->find();
    foreach ($result as $entry) {
        print("<tr>");
        print("<td>" . $entry['Brn'] . "</td><td>" . $entry['Customer_Username'] . "</td><td>" . $entry['room_id_booked'] . "</td>" . "<td>" . $entry['People'] . "</td>" . "<td>" . $entry['Check_In_Date'] . "</td>" . "<td>" . $entry['Check_Out_Date'] . "</td>" . "<td>" . $entry['Pool'] . "</td>" . "<td>" . $entry['Gym'] . "</td>" . "<td>" . $entry['Breakfast'] . "</td>" . "<td>" . $entry['Launch'] . "</td>" . "<td>" . $entry['Dinner'] . "</td>" . "<td>" . $entry['Price'] . "</td>");
        // print("<td>" . $entry['Brn'] . "</td><td>" . $entry['Customer_Username'] . "</td><td>" . $entry['People'] . "</td>" . "<td>" . $entry['Check_In_Time'] . "</td>" . "<td>" . $entry['Check_In_Date'] . "</td>" . "<td>" . $entry['Check_Out_Time'] . "</td>" . "<td>" . $entry['Check_Out_Date'] . "</td>" . "<td>" . $entry['Pool'] . "</td>" . "<td>" . $entry['Gym'] . "</td>" . "<td>" . $entry['Breakfast'] . "</td>" . "<td>" . $entry['Launch'] . "</td>" . "<td>" . $entry['Dinner'] . "</td>" . "<td>" . $entry['Price'] . "</td>");
        print("</tr>");
    }
    print("</tbody>");
    print("</table>");
}

// add a staff
if(isset($_POST['add-staff'])){

    $staff_name = $_POST['staff-name'];
    $staff_dob = $_POST['staff-dob'];
    $staff_email = $_POST['staff-email'];
    $staff_phone = $_POST['staff-phone'];
    $staff_salary = $_POST['staff-salary'];
    $staff_position = $_POST['staff-role'];

    $staff_collection->insertOne([
        'Full_Name' => $staff_name,
        'Date_of_Birth' => $staff_dob,
        'Email' => $staff_email,
        'Phone_Number' => $staff_phone,
        'Salary' => $staff_salary,
        'Position' => $staff_position
    ]);

    echo "<script>alert('Staff Added!');</script>";
    echo "<script> window.location.assign('admin.html'); </script>";
}



// <form method="post" action="admin.php">
// <label for="booking-id">Booking ID:</label>
// <input type="text" id="booking-id" name="booking_id" required>
// <!-- <button id="cancel-booking" name="cancel-booking" class="button">Cancel Booking</button> -->
// <input type="submit" value="Cancel Booking">
// </form>
// cancel a booking

if(isset($_POST['cancel-booking'])){
    $flag=0;
    $booking_id = (int) $_POST['booking-id'];

    $result = $booking_collection->find(['Brn' => $booking_id]);

    foreach ($result as $entry) {
        if($booking_id==$entry['Brn'])
        {
            $flag=1;
            $booking_collection->deleteOne(['Brn' => $booking_id]);
            echo "<script>alert('Booking Cancelled!');</script>";
            echo "<script> window.location.assign('admin.html'); </script>";
        }
    }
    if($flag==0)
    {
        echo "<script>alert('Booking ID not found!');</script>";
        echo "<script> window.location.assign('admin.html'); </script>";
    }
}









if (isset($_POST["searchFlights"])) {
    print("<table>");
    print("<thead>");
    print("<tr><th>Flight ID</th><th>From</th><th>To</th><th>Departure Date</th><th>Depart Time</th><th>Economy Seats</th><th>Business Seats</th><th>FirstClass Seats</th><th>Delay</th> <th>Captain_Name</th>  </tr>");
    print("</thead>");
    print("<tbody>");

    $result = $room_collection->find();
    foreach ($result as $entry) {


        print("<tr>");
        print("<td>" . $entry['Flight_ID'] . "</td><td>" . $entry['From'] . "</td><td>" . $entry['To'] . "</td>" . "<td>" . $entry['Departure_Date'] . "</td>" . "<td>" . $entry['Departure_Time'] . "</td>" . "<td>" . $entry['Economy_Seats_Left'] . "</td>" . "<td>" . $entry['Business_Seats_Left'] . "</td>" . "<td>" . $entry['FirstClass_Seats_Left'] . "</td><td>" . $entry['Delay'] . "</td><td>" . $entry['Captain_Name'] . "</td>");
        print("</form></td>");
        print("</tr>");
    }
    print("</tbody>");
    print("</table>");
}




if (isset($_POST["searchCustomers"])) {

    print("<table>");
    print("<thead>");
    print("<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Email</th></tr>");
    print("</thead>");
    print("<tbody>");

    $result = $customer_collection->find();
    foreach ($result as $entry) {


        print("<tr>");
        print("<td>" . $entry['Username'] . "</td><td>" . $entry['First_Name'] . "</td><td>" . $entry['Last_Name'] . "</td>" . "<td>" . $entry['Date_Of_Birth'] . "</td>" . "<td>" . $entry['Email'] . "</td>");
        print("</form></td>");
        print("</tr>");
    }
    print("</tbody>");
    print("</table>");
}




if (isset($_POST["addFlight"])) {

    $flight_id = (int) $_POST['Flight_ID'];
    $admin_id = $_POST['Admin_Username'];
    $from = $_POST['From'];
    $to = $_POST['To'];
    $departure_date = $_POST['Departure_Date'];
    $departure_time = $_POST['Departure_Time'];
    $economy_seats = (int) $_POST['Economy_Seats_Left'];
    $business_seats = (int) $_POST['Business_Seats_Left'];
    $firstclass_seats = (int) $_POST['FirstClass_Seats_Left'];
    $delay = $_POST['delay'];
    $captain_name = $_POST['Captain_Name'];

    $flag = 0;


    // FLIGHT IS UNIQUE, WE CANNOT ALLOW 2 FLIGHTS TO HAVE THE SAME ONE!
    $flightResult = $room_collection->find(['Flight_ID' => $flight_id]);

    foreach ($flightResult as $searchFor) {
        $storedFlight = $searchFor['Flight_ID'];
        if ($flight_id == $storedFlight) {
            $flag = 1;
        }
    }

    if ($flag == 1) {
        print("<script>window.alert('Flight already exists! Please choose another Flight ID!');
        window.reload();
        </script>");
        die();
    }




    $room_collection = $client->Hotel_Reservation->Flights;

    $newFlights = [
        [
            'Flight_ID' => $flight_id,
            'Admin_Username' => $admin_id,
            'From' => $from,
            'To' => $to,
            'Departure_Date' => $departure_date,
            'Departure_Time' => $departure_time,
            'Economy_Seats_Left' => $economy_seats,
            'Business_Seats_Left' => $business_seats,
            'FirstClass_Seats_Left' => $firstclass_seats,
            'Delay' => $delay,
            'Captain_Name' => $captain_name
        ],
    ];

    $insertManyResult = $room_collection->insertMany($newFlights);


    print("<script>window.alert('Successfuly added $flight_id in the database!')</script>");
    echo "<script> window.location.assign('admin.html'); </script>";
}




if (isset($_POST["deleteFlight"])) {
    $flight_id = (int) $_POST['flight_id'];

    $flag = 0;
    $flightResult = $room_collection->find(['Flight_ID' => $flight_id]);

    foreach ($flightResult as $searchFor) {
        $storedFlight = $searchFor['Flight_ID'];
        if ($flight_id == $storedFlight) {
            $flag = 1;
            $deleteFlight = $room_collection->deleteOne(['Flight_ID' => $flight_id]);
            print("<script>window.alert('Sucessfully Deleted Flight ID $flight_id from the Database!')</script>");
            echo "<script> window.location.assign('admin.html'); </script>";
        }
    }

    if ($flag == 0) {
        print("<script>window.alert('No such Flight ID in database!');
        window.location.assign('admin.html');
        </script>");
        die();
    }
}





if (isset($_POST["viewBooking"])) {
    // $Brn = (int)$_POST['brn'];
    $booking_collection = $client->Hotel_Reservation->Bookings;

    // Table1
    print("<table>");
    print("<thead>");
    print("<tr><th>Brn</th><th>Purchased</th><th>Customer_Username</th>
    <th>Cabin_Class</th><th>Prefrered_Seat_Location</th>
    <th>Accompanying_Pet</th><th>Adults</th><th>Children</th><th>Infants</th>
    <th>Type_Of_Trip</th><th>Check_In</th><th>Price</th> </tr>");
    print("</thead>");
    print("<tbody>");

    $result = $booking_collection->find();
    foreach ($result as $entry) {


        print("<tr>");
        print("<td>" . $entry['Brn'] . "</td><td>" . $entry['Purchased'] . "</td><td>" . $entry['Customer_Username'] . "</td><td>"
            . $entry['Cabin_Class'] . "</td>" . "<td>" . $entry['Preferred_Seat_Location'] . "</td>" . "<td>" . $entry['Accompanying_Pet'] . "</td>" . "<td>"
            . $entry['Adults'] . "</td>" . "<td>" . $entry['Children'] . "</td>" . "<td>" . $entry['Infants'] . "</td>" . "<td>" . $entry['Type_Of_Trip'] . "</td>"
            . "<td>" . $entry['Check_In'] . "</td>" . "<td>" . $entry['Price'] . "</td>");
        print("</form></td>");
        print("</tr>");
    }
    print("</tbody>");
    print("</table>");


    // Table 2 for multivalued attributes such as Flights.    
    $result2 = $booking_collection->find();
    print("<table>");
    print("<thead>");
    print("<tr><th>Brn</th><th>Flights</th></tr>");
    print("</thead>");
    print("<tbody>");

    foreach ($result2 as $entry) {
        for ($i = 0; $i < sizeof($entry['Flights']); $i++) {
            print("<tr>");
            print("<td>" . $entry['Brn'] . "</td><td>" . $entry['Flights'][$i] . "</td>");
            print("</tr>");
        }
    }
    print("</tbody>");
    print("</table>");


    // Table 3 for multivalued attributes such as Meals.   
    $result3 = $booking_collection->find();
    print("<table>");
    print("<thead>");
    print("<tr><th>Brn</th><th>Adult_Meals</th><th>Adult_Drinks</th></tr>");
    print("</thead>");
    print("<tbody>");

    foreach ($result3 as $entry) {
        for ($i = 0; $i < sizeof($entry['Adult_Meals']); $i++) {
            print("<tr>");
            print("<td>" . $entry['Brn'] . "</td><td>" . $entry['Adult_Meals'][$i] . "</td><td>" . $entry['Adult_Drinks'][$i] . "</td>");
            print("</tr>");
        }

    }

    print("</tbody>");
    print("</table>");


    // Table 4 for multivalued attributes such as Drinks.    
    $result4 = $booking_collection->find();
    print("<table>");
    print("<thead>");
    print("<tr><th>Brn</th><th>Children_Meals</th><th>Children_Drinks</th></tr>");
    print("</thead>");
    print("<tbody>");

    foreach ($result4 as $entry) {
        for ($i = 0; $i < sizeof($entry['Children_Meals']); $i++) {
            print("<tr>");
            print("<td>" . $entry['Brn'] . "</td><td>" . $entry['Children_Meals'][$i] . "</td><td>" . $entry['Children_Drinks'][$i] . "</td>");
            print("</tr>");
        }
    }
    print("</tbody>");
    print("</table>");


}

?>