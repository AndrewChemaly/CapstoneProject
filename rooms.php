<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wukong Hotel Rooms</title>
        <link rel="icon" href="rooms_pics/icon.jpg">
        <link rel="stylesheet" href="rooms.css">
        <script src="rooms.js"></script> 
    </head>
    <body>
        <center>
            <?php
            $query = ['Price_per_Night' => ['$lt' => (int) $_POST["price_inp"]]];
            if(isset($_POST["location_inp"])){
                $query['Location'] = $_POST["location_inp"];
            }
            
            if(isset($_POST["type_inp"])){
                $query['Type'] = $_POST["type_inp"];
            }
            
            if(isset($_POST["status_inp"])){
                $query['Status'] = $_POST["status_inp"];
            }
            
            if($_POST["capacity_inp"] != ""){
                $query['Capacity'] = ['$lte' => (int) $_POST["capacity_inp"]];
            }
            use MongoDB\Operation\Find;
            require 'vendor/autoload.php';

            $client = new MongoDB\Client("mongodb://localhost:27017");
            $database = $client->Hotel_Reservation;

            $room_collection = $client->Hotel_Reservation->Rooms;
            $result = $room_collection->find($query);
            ?>
        <div style="margin-bottom: 15px;">
            <h1 style="margin-bottom: 10px;">&#128269; Search Room</h1>
            <!--<div class="filters">-->
                <form action="#" method="post" class="filters" id="Form">
            <div style="margin-top: 5px; margin-left: 10px; border: 1px solid white; border-radius: 10px; height: 33px;  background-color: white;">
                <label for="Price_Range" style="float: left; margin-left: 5px; margin-top: 4px;">Price:</label>
                <input type="range" min="0" max="300" value="300" class="slider" id="Price_Range" name="price_inp" required>
                <p id="output_price">0<span style="font-size: 14px; float: right;">💲</span></p>
            </div>
            <div style="margin-top: 5px; border: 1px solid white; border-radius: 10px; height: 33px;  background-color: white;">
                <label for="locations" style="margin-left: 5px;">Location:</label>
                <select id="locations" name="location_inp" required style="margin-right: 5px; margin-top: 6px;">
                    <option disabled selected>Choose</option>
                    <option value="Beirut">Beirut</option>
                    <option value="Tripoli">Tripoli</option>
                    <option value="Sidon">Sidon</option>
                    <option value="Jbeil">Jbeil</option>    
                    <option value="Batroun">Batroun</option>
                </select>
            </div>
            <div style="margin-top: 5px; border: 1px solid white; border-radius: 10px; height: 33px;  background-color: white;">
                <label for="type" style="margin-left: 5px;">Type:</label>
                <select id="Type" required name="type_inp" style="margin-right: 5px; margin-top: 6px;">
                    <option disabled selected>Choose</option>
                    <option value="Single">Single</option>
                    <option value="Double">Double</option>
                    <option value="Family">Family</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Suite">Suite</option>
                </select>
            </div>
            <div style="margin-top: 5px; border: 1px solid white; border-radius: 10px; height: 33px;  background-color: white;">
                <label for="status" style="margin-left: 5px;">Status:</label>
                <select id="status" required name="status_inp" style="margin-right: 5px; margin-top: 6px;">
                    <option disabled selected>Choose</option>
                    <option value="Available">Available</option>
                    <option value="Unavailable">Unavailable</option>
                </select>
            </div>
            <div style="margin-top: 5px; margin-right: 10px; border: 1px solid white; border-radius: 10px; height: 33px;  background-color: white;">
                <label for="Capacity" style="float: left; margin-left: 5px; margin-top: 5px">Capacity:</label>
                <input type="number" id="Capacity" name="capacity_inp" min="1" max="10" value="" required style="margin-top: 6px;">
                <p style="float: left; margin-top: 11px; font-size: 15px; margin-right: 5px; ">&nbsp;(1-10)</p>
            </div>
                </form>
            <!--</div>-->
        </div>
        </center>
        <center style="clear: left;">
        <?php
        foreach ($result as $each) {
            $green_red = "";
            $person_s = "";
            $button_disable = "";
            if($each["Capacity"] > 1){
                $person_s = "persons";
            }
            else{
                $person_s = "person";
            }
            if(strcasecmp($each["Status"],"Available") == 0){
                $green_red = "&#128994;";
                $button_disable = "";
            }
            else{
                $green_red = "&#128308;";
                $button_disable = "disabled";
            }
            echo "<div class='room_display'>
                    <br class='break'>
                    <h3 class='room_title'>Room # ".$each["Room_Id"]."</h3>
                    <img src='rooms_pics/room_".$each["Room_Id"].".jpg' class='room_img'>
                    <div class='room_info'>
                        <p>&#128176; Price/night: ".$each["Price_per_Night"]."$</p>
                        <p>&#128205; Location: ".$each["Location"]."</p>
                        <p>&#127970; Type: ".$each["Type"]."</p>
                        <p>".$green_red." Status: ".$each["Status"]."</p>
                        <p>&#128100; Capacity: ".$each["Capacity"]." ".$person_s."</p>
                    </div>
                    <br><br><br><br><br><br><br><br><br>
                    <button class='reserve_but' ".$button_disable." onclick='booking_room(".$each["Room_Id"].")'>Reserve</button>
                  </div>";
        }
        ?>
        </center>
    </body>
</html>