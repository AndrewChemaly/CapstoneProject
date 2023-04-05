<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wukong Hotel Rooms</title>
        <link rel="stylesheet" href="booking.css">
        <script src="booking.js"></script> 
    </head>
    <body>

        <?php
        use MongoDB\Operation\Find;
        require 'vendor/autoload.php';

        session_start();

        if(!isset($_SESSION["username"])){
            echo "unauthorized";
            die();
        }

        $room_id = $_GET['Room_Id'];
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $database = $client->Hotel_Reservation;

        $room_collection = $client->Hotel_Reservation->Rooms;
        $booking_collection = $client->Hotel_Reservation->Bookings;

        $result_room = $room_collection->find(['Room_Id' => (integer) $room_id]);

        foreach ($result_room as $row) {
            if(strcasecmp($row["Status"],"Reserved") == 0){
                echo"<div class='div_wrapper'>
                <div class='denial_div'>
                    <img src='booking_pics/stop_sign.png' alt='stop sign' width='50px' height='50px' style='margin-bottom: -30px; margin-top: 5px;'>
                    <h1 style='margin-bottom: -20px'>The room you are trying to access it is reserved.</h1>
                    <h2>try another room.</h2>
                </div>
                <div class='stand'></div>
                <div class='base'></div>
            </div>";
                die();
            }
        }
        ?>

        <div class="sticky">
            <header style="text-align: center;">final payment</header>
            <p>hello</p>
        </div>
        <?php
            // echo "<p>room ID:".$row["Room_Id"]."</p>";
            // echo "<p>Price per Night:".$row["Price_per_Night"]."</p>";
            // echo "<p>Location:".$row["Location"]."</p>";
            // echo "<p>room type:".$row["Type"]."</p>";
            // echo "<p>room Capacity:".$row["Capacity"]."</p>";
        ?>
        <p>room ID: 1</p>
        <p>Price per Night: 70</p>
        <p>Location: beirut</p>
        <p>room type: family</p>
        <p>room Capacity: 3</p>
        <?php  echo "<p> Customer: ".$_SESSION['username']."</p>"?>
        <label for="check_in">Check in date and time</label>
        <input id="check_in" type="datetime-local">
        <p id="check_in_miss" style="display:none">missing</p>
        <br><br>
        <label for="check_in">Check out date and time</label>
        <input id="check_out" type="datetime-local" disabled>
        <p id="check_out_miss" style="display:none">missing</p>
        <br><br>
        <label for="pool">access to pool:</label>
        <input type="checkbox" id="pool">
        <br><br>
        <label for="gym">access to gym:</label>
        <input type="checkbox" id="gym">
        <br><br>
        <label for="breakfast">include breakfast:</label>
        <input type="checkbox" id="breakfast">
        <br><br>
        <label for="launch">include launch:</label>
        <input type="checkbox" id="launch">
        <br><br>
        <label for="dinner">include dinner:</label>
        <input type="checkbox" id="dinner">
    </body>
</html>