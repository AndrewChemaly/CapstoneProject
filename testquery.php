<?php

use MongoDB\Operation\Find;
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Hotel_Reservation;

$room_collection = $client->Hotel_Reservation->Rooms;
$query = ['Price_per_Night' => ['$lt' => 60]];
$result = $room_collection->find($query);

foreach ($result as $each) {
    echo "<p>".$each["Room_Id"]."</p>";
}
?>