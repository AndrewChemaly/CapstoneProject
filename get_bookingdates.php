<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$q = $_REQUEST["Room_Id"];

// $bookings = $client->Hotel_Reservation->Bookings->find(['room_id_booked' => $q]);
// echo "$q";
$bookings = $client->Hotel_Reservation->Bookings;

$result = $bookings->find();
$result1 = $bookings->find();

$flag = 0;


$us = [];

foreach ($result as $entry) {
    if ($entry['room_id_booked'] == $q) {
        array_push($us, $entry['Check_In_Date']);
        // array_push($us, $entry['Check_In_Time']);
        array_push($us, $entry['Check_Out_Date']);
        // array_push($us, $entry['Check_Out_Time']);
    }

}




$jsonData = json_encode($us);
echo $jsonData;
