<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wukong Hotel Rooms</title>
        <link rel="icon" href="rooms_pics/icon.jpg">
        <link rel="stylesheet" href="rooms.css">
    </head>
    <body>
        <center>
        <div>
            <h1>&#128269; Search Room</h1>
        </div>
        <?php
        use MongoDB\Operation\Find;
        require 'vendor/autoload.php';

        $client = new MongoDB\Client("mongodb://localhost:27017");
        $database = $client->Hotel_Reservation;
        $room_collection = $client->Hotel_Reservation->Rooms;
        $result = $room_collection->find();

        foreach ($result as $each) {
            $green_red = "";
            $person_s = "";
            if($each["Capacity"] > 1){
                $person_s = "persons";
            }
            else{
                $person_s = "person";
            }
            if(strcasecmp($each["Status"],"Available") == 0){
                $green_red = "&#128994;";
            }
            else{
                $green_red = "&#128308;";
            }
            echo "<div class='room_display'>
                    <br>
                    <h3 class='room_title'>Room # ".$each["Room_Id"]."</h3>
                    <img src='rooms_pics/room_".$each["Room_Id"].".jpg' class='room_img'>
                    <div class='room_info'>
                        <p>&#128176; Price/night: ".$each["Price_per_Night"]."$</p>
                        <p>&#128205; Location: ".$each["Location"]."</p>
                        <p>&#127970; Type: ".$each["Type"]."</p>
                        <p>".$green_red." Status: ".$each["Status"]."</p>
                        <p>&#128100; Capacity: ".$each["Capacity"]." ".$person_s."</p>
                    </div>
                  </div>";
        }

        ?>
        </center>
    </body>
</html>