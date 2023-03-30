<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wukong Hotel Rooms</title>
        <link rel="stylesheet" href="booking.css">
        <script src=""></script> 
    </head>
    <body>
        <?php
        use MongoDB\Operation\Find;
        require 'vendor/autoload.php';

        $room_id = $_GET['Room_Id'];
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $database = $client->Hotel_Reservation;
        $room_collection = $client->Hotel_Reservation->Rooms;
        $booking_collection = $client->Hotel_Reservation->Bookings;
        $result_room = $room_collection->find(['Room_Id' => (integer) $room_id]);
        $result_booking = $booking_collection->find(['Room_Id' => (integer) $room_id]);
        ?>

        <div class="sticky">
            <header style="text-align: center;">final payment</header>
        </div>
        <div style="height: 100px; width: 100px; border: 5px solid black">

        </div>
        <div style="height: 100px; width: 100px; border: 5px solid black">

        </div>
        <div style="height: 100px; width: 100px; border: 5px solid black">

        </div>
        <div style="height: 100px; width: 100px; border: 5px solid black">

        </div>
        <div style="height: 100px; width: 100px; border: 5px solid black">

        </div>
        <div style="height: 100px; width: 100px; border: 5px solid black">

        </div>
        <div style="height: 100px; width: 100px; border: 5px solid black">

        </div>
        <div style="height: 100px; width: 100px; border: 5px solid black">

        </div>
        <div style="height: 100px; width: 100px; border: 5px solid black">

        </div>
    </body>
</html>