<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");

// $customers = $client->Hotel_Reservation->Customers;
// $admin = $client->Hotel_Reservation->Admin;

// i only want to take the bookings of the room id i want
// $bookings = $client->Hotel_Reservation->Bookings->find(['room_id_booked' => 2]);
$bookings = $client->Hotel_Reservation->Bookings;

$result = $bookings->find();
$result1 = $bookings->find();

$flag = 0;

// $username = "";
// foreach($result as $entry)
// {
//     $username = $entry['Username'];
//     $flag=1;
//     break;
// } 

$us = [];
foreach ($result as $entry) {
    array_push($us, $entry['Check_In_Date']);
    array_push($us, $entry['Check_In_Time']);
    array_push($us, $entry['Check_Out_Date']);
    array_push($us, $entry['Check_Out_Time']);
}

// foreach ($result1 as $entry) {
// }

// USERNAME IS UNIQUE, WE CANNOT ALLOW 2 USERS TO HAVE THE SAME ONE!
// $usernameResult = $customer_collection->find(['Username' => $_POST["username"]]);

// foreach ($usernameResult as $searchFor) {
//     $storedUsername = $searchFor['Username'];
//     if ($inputtedUsername == $storedUsername) {
//         $flag = 1;
//     }
// }



// $bookings_collection = $client->Hotel_Reservation->Bookings;

// $result = $bookings_collection->find(['Customer_Username' => $username]);

// $brns = [];
// foreach ($result as $entry) {
//     array_push($brns, $entry['Brn']);
// }

// $matching_airports = [];
// for($i = 0; $i < count($airports); $i++)
// {
//     if(str_contains(strtolower($airports[$i]), strtolower($data['airport'])))
//     {
//         array_push($matching_airports, $airports[$i]);
//     }
// }

// $returned_array = ['matching_airports' => $matching_airports];

// $jsonData = json_encode($returned_array);




$jsonData = json_encode($us);
echo $jsonData;
