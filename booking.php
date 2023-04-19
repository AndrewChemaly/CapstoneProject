<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wukong Hotel Rooms</title>
    <!-- <link rel="stylesheet" href="booking.css"> -->
    <script src="booking.js"></script>
</head>

<style>
    body {
        background-color: lightblue;
        background-repeat: no-repeat;
        background-size: cover;
    }

    header {
        color: red;
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 10px;
        margin-left: 10px;
        margin-right: 10px;
        margin-top: 0;
        /* remove default margin */
        padding: 10px;
        background-color: white;
    }

    form {
        margin-bottom: 10px;
        margin-left: 10px;
        margin-right: 10px;
        margin-top: 0;
        /* remove default margin */
        padding: 10px;
        border: 1px solid black;
        border-radius: 10px;
        background-color: white;
    }

    button {
        font-size: 20px;
        font-weight: bold;
        margin-left: 10px;
        margin-right: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid black;
        border-radius: 10px;
        background-color: white;
    }

    button:hover {
        background-color: lightblue;
    }

    .sticky {
        color: red;
        position: fixed;
        top: 40px;
        right: 50px;
        width: 300px;
        height: 550px;
        background-color: white;
        border: 3px solid black;
    }


    p {
        font-size: 20px;
        font-weight: bold;
        margin-left: 10px;
        margin-right: 10px;
    }

    label {
        font-size: 20px;
        font-weight: bold;
        margin-left: 10px;
        margin-right: 10px;

    }

    input {
        font-size: 20px;
        font-weight: bold;
        margin-left: 10px;
        margin-right: 10px;
    }

    select {
        font-size: 20px;
        font-weight: bold;
        margin-left: 10px;
        margin-right: 10px;
    }

    input[type=checkbox] {
        width: 20px;
        height: 20px;
        background: #fff;
        border: 1px solid #000;
        border-radius: 3px;
        /* outline: none; */
        cursor: pointer;
    }
</style>


<body>
    <form name="bookingForm" method="post" action="confirm_ticket.php">
        <script>
            // Get the value of total_price and set it to a variable
            var price = document.getElementById('total_price').value;
        </script>

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
        $room_collection = $client->Hotel_Reservation->Rooms;
        $booking_collection = $client->Hotel_Reservation->Bookings;

        if (isset($_GET['Room_Id'])) {
            $room_id = $_GET['Room_Id'];
            $room_id_saved = $room_id;

            $result_room = $room_collection->find(['Room_Id' => (integer) $room_id]);
            // $room_id = $_GET['Room_Id'];
        
            foreach ($result_room as $row) {
                echo "<p>room ID: " . $room_id_saved . "</p>";
                echo "<input type='text' name='room_id' value='".$room_id_saved."' hidden>";
                echo "<p>Price per Night: " . $row["Price_per_Night"] . "</p>";
                echo "<p>Location: " . $row["Location"] . "</p>";
                echo "<p>room type: " . $row["Type"] . "</p>";
                echo "<p>room Capacity: " . $row["Capacity"] . "</p>";
                echo "<input type='text' name='capacity' value='".$row["Capacity"]."' hidden>";
                echo "<p> Customer: " . $_SESSION['username'] . "</p>";
                echo "<input type='text' name='customer' value='".$_SESSION['username']."' hidden>";
            }

        }
        ?>

        <script>
            try {
                var room_id = <?php echo $room_id; ?>;
                var asyncRequest = new XMLHttpRequest();

                asyncRequest.addEventListener("readystatechange", function () {
                    if (asyncRequest.readyState === 4 && asyncRequest.status === 200) {
                        // console.log(asyncRequest.responseText);
                        checkTable(asyncRequest.responseText);
                    }
                });

                asyncRequest.open("GET", "get_bookingdates.php?Room_Id=" + room_id, true);
                asyncRequest.setRequestHeader("Content-Type", "application/json");
                asyncRequest.send();

            }
            catch (exception) {
                alert("Request Failed");
            } // end catch 



            function checkTable(response) {
                var data = JSON.parse(response);
                // window.alert(data);
                // checkin.addEventListener("input", myFunction1);


                var x = document.getElementById("check_out");
                x.addEventListener("input", myFunction1);

                function myFunction1() {
                    var data = JSON.parse(response);
                    var check_in = document.getElementById("check_in").value;
                    var check_out = document.getElementById("check_out").value;

                    // console.log(check_in);
                    // console.log(check_out);

                    var check_in_date = new Date(check_in);
                    var check_out_date = new Date(check_out);

                    // console.log(check_in_date);
                    // console.log(check_out_date);
                    console.log(data);


                    // var booking_check_in = new Date(data[0] + 'T' + data[1] + ':00');
                    // var booking_check_out = new Date(data[2] + 'T' + data[3] + ':00');


                    for (var i = 0; i < data.length-1; i += 2) {

                        // console.log(data[i]);
                        // console.log(data[i+1]);
                        // console.log(data[i+2]);
                        // console.log(data[i+3]);

                        //booking data from ajax concatenated to proper date format
                        var booking_check_in = new Date(data[i]);
                        var booking_check_out = new Date(data[i + 1]);
                        // console.log(booking_check_in);
                        // console.log(booking_check_out);

                        //check both date and time for conflict
                        if (check_in_date >= booking_check_in && check_in_date <= booking_check_out) {
                            window.alert("check in date is not available");
                            document.getElementById("check_in").value = "";
                            document.getElementById("check_out").value = "";
                        } else if (check_out_date >= booking_check_in && check_out_date <= booking_check_out) {
                            window.alert("check out date is not available");
                            document.getElementById("check_in").value = "";
                            document.getElementById("check_out").value = "";
                            //disable
                            document.getElementById("check_out").disabled = true;
                        }
                        else if (check_in_date < booking_check_in && check_out_date > booking_check_out) {
                            window.alert("check in and check out date is not available");
                            document.getElementById("check_in").value = "";
                            document.getElementById("check_out").value = "";
                        }
                        else {
                            document.getElementById("check_out").disabled = false;
                        }

                    }

                    // console.log(booking_check_in);
                    // console.log(booking_check_out);

                }

            }


        </script>

        <div class="sticky">
            <header style="text-align: center;">Final Payment</header>
            <p id="total_price" name="total_price">Total Price:</p>


            <p id="pool_price">Pool Price: 0</p>
            <p id="gym_price">Gym Price: 0</p>
            <p id="breakfast_price">Breakfast Price: 0</p>
            <p id="launch_price">Launch Price: 0</p>
            <p id="dinner_price">Dinner Price: 0</p>
            <p id="total_days">Total Days: 0</p>

            <p id="booked_dates"></p>

            <?php

            //   display taken room date and times
            $result_room1 = $booking_collection->find();
            // echo $result_room1; 
            $flag = 0;
            foreach ($result_room1 as $room) {
                if ($room['room_id_booked'] == $_GET['Room_Id']) {
                    $flag = 1;
                    // transform to date format
                    $check_in = strtotime($room['Check_In_Date']);
                    $check_out = strtotime($room['Check_Out_Date']);
                    $booked_dates = date('F d Y g:i A', $check_in) . ' - ' . date('F d Y g:i A', $check_out);
                    echo "<span>Booked dates for this room are: $booked_dates</span><br>";
                }


            }
            if ($flag == 0) {
                echo "<span>Booked dates for this room are: none</span><br>";
            }

            ?>

        </div>

        <!--action loi window.location.href = "booking.php?Room_Id="+String(room_id); -->

        <script>

            // console.log("1");


            const form = document.getElementById("bookingForm");
            const room_idd = <?php $_GET['Room_Id']; ?> // replace with your desired room ID

            form.addEventListener("submit", function (event) {
                event.preventDefault(); // prevent the form from submitting normally
                window.location.href = "booking.php?Room_Id=" + String(room_id);
            });


        </script>




        <label for="check_in">Check in date and time</label>
        <input id="check_in" name="check_in" type="datetime-local" required>
        <!-- <p id="check_in_miss" style="display:none">missing</p> -->
        <br><br>
        <label for="check_out">Check out date and time</label>
        <input id="check_out" name="check_out" type="datetime-local" required disabled onchange=checkPrice(this.id)>
        <!-- <p id="check_out_miss" style="display:none">missing</p> -->


        <br><br>
        <label for="pool">access to pool 10$:</label>
        <input type="checkbox" name="pool" id="pool" onclick=checkPrice(this.id)>
        <br><br>
        <label for="gym">access to gym 10$:</label>
        <input type="checkbox" name="gym" id="gym" onclick=checkPrice(this.id)>
        <br><br>
        <label for="breakfast">include breakfast 10$:</label>
        <input type="checkbox" name="breakfast" id="breakfast" onclick=checkPrice(this.id)>
        <br><br>
        <label for="launch">include launch 10$:</label>
        <input type="checkbox" name="launch" id="launch" onclick=checkPrice(this.id)>
        <br><br>
        <label for="dinner">include dinner 10$:</label>
        <input type="checkbox" name="dinner" id="dinner" onclick=checkPrice(this.id)>

        <br><br>
        <button type="submit" name="submit" id="submit">Book</button>
    </form>



    <script>


        console.log("dsds");
        var price = 0;
        var counter = 0;
        var services_counter = 0;
        //updating the price
        function checkPrice(id) {


            //check if check out date has been selected

            if (document.getElementById("check_out").value != "" && id == "check_out") {
                counter++;
                //  INITIAL total price
                var p = '<?php echo $row['Price_per_Night']; ?>';

                // get the total number of nights based on check in and check out time
                var check_in = document.getElementById("check_in").value;
                var check_out = document.getElementById("check_out").value;
                var total_days = Math.ceil((new Date(check_out) - new Date(check_in)) / (1000 * 60 * 60 * 24)); // Calculate total number of nights
                document.getElementById("total_days").innerText = "Total Days: " + total_days;
                // console.log(total_days);
                //price per night * total nights

                if (counter > 1) {
                    // console.log("counter>1");
                    // console.log("services_counter: " + services_counter)
                    price = p * (total_days) + (services_counter * 10);
                }
                if (counter == 1) {
                    price += p * (total_days);
                }
                // document.getElementById("total_price").innerText = "Total Price: " + price;
            }


            if (document.getElementById("pool").checked == true && id == "pool") {
                price += 10;
                document.getElementById("pool_price").innerText = "Pool Price: 10";
                services_counter++;
            }

            if (document.getElementById("gym").checked == true && id == "gym") {
                price += 10;
                document.getElementById("gym_price").innerText = "Gym Price: 10";
                services_counter++;
            }

            if (document.getElementById("breakfast").checked == true && id == "breakfast") {
                price += 10;
                document.getElementById("breakfast_price").innerText = "Breakfast Price: 10";
                services_counter++;
            }

            if (document.getElementById("launch").checked == true && id == "launch") {
                price += 10;
                document.getElementById("launch_price").innerText = "Launch Price: 10";
                services_counter++;
            }

            if (document.getElementById("dinner").checked == true && id == "dinner") {
                price += 10;
                document.getElementById("dinner_price").innerText = "Dinner Price: 10";
                services_counter++;
            }

            //if the pool_price is unchecked, reset price
            if (document.getElementById("pool").checked == false && id == "pool") {
                price -= 10;
                document.getElementById("pool_price").innerText = "Pool Price: 0";
                services_counter--;
            }

            if (document.getElementById("gym").checked == false && id == "gym") {
                price -= 10;
                document.getElementById("gym_price").innerText = "Gym Price: 0";
                services_counter--;
            }

            if (document.getElementById("breakfast").checked == false && id == "breakfast") {
                price -= 10;
                document.getElementById("breakfast_price").innerText = "Breakfast Price: 0";
                services_counter--;
            }

            if (document.getElementById("launch").checked == false && id == "launch") {
                price -= 10;
                document.getElementById("launch_price").innerText = "Launch Price: 0";
                services_counter--;
            }

            if (document.getElementById("dinner").checked == false && id == "dinner") {
                price -= 10;
                document.getElementById("dinner_price").innerText = "Dinner Price: 0";
                services_counter--;
            }


            document.getElementById("total_price").innerText = "Total Price: " + price;
            //send to php total price
        }

    </script>

    <!-- proces booking  in php after clicking on submit button -->


</body>

</html>