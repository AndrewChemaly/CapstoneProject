<?php
    include 'php_libs/phpqrcode/qrlib.php';
    require 'vendor/autoload.php';
    use MongoDB\Operation\Find;

        $client = new MongoDB\Client("mongodb://localhost:27017");
        $database = $client->Hotel_Reservation;
        $booking_collection = $client->Hotel_Reservation->Bookings;
        $customer_collection = $client->Hotel_Reservation->Customers;

        $customer_res = $customer_collection->find(['Username' => $_POST['customer']]);
        $result = $booking_collection->find([], ['sort' => ['Brn' => -1], 'limit' => 1]);
        $document = $result->toArray()[0];
        $brn = $document['Brn'] + 1;
    
        $room_id = $_POST['room_id'];
        $customer = $_POST['customer'];
        $check_in_date = $_POST['check_in'];
        $check_out_date = $_POST['check_out'];
        $pool = isset($_POST['pool']) && !empty($_POST['pool']) ? true : false;
        $breakfast = isset($_POST['breakfast']) && !empty($_POST['breakfast']) ? true : false;
        $gym = isset($_POST['gym']) && !empty($_POST['gym']) ? true : false;
        $launch = isset($_POST['launch']) && !empty($_POST['launch']) ? true : false;
        $dinner = isset($_POST['dinner']) && !empty($_POST['dinner']) ? true : false;
            
        $newBooking = [
            [
                'Brn' => $brn,
                'Customer_Username' => $customer,
                'room_id_booked' => $room_id,
                'Check_In_Date' => $check_in_date,
                'Check_Out_Date' => $check_out_date,
                'Pool' => $pool,
                'Gym' => $gym,
                'Breakfast' => $breakfast,
                'Launch' => $launch,
                'Dinner' => $dinner,
                // 'price' => $total_price
            ],
        ];

        $insertBooking = $booking_collection->insertMany($newBooking);

        if($pool == true){$pool = "True";}else{$pool = "False";}
        if($gym == true){$gym = "True";}else{$gym = "False";}
        if($breakfast == true){$breakfast = "True";}else{$breakfast = "False";}
        if($launch == true){$launch = "True";}else{$launch = "False";}
        if($dinner == true){$dinner = "True";}else{$dinner = "False";}
        //print("<script>window.alert('Successfully Booked:\\nRoom: $room_id\\nBrn: $brn\\nCheck In Date: $check_in_date\\nCheck Out Date: $check_out_date\\nCustomer: $customer')</script>");

    $res = "";
    $fullname = "";
    $email = "";
    $dob = "";
    foreach ($customer_res as $row) {
        $fullname = $row['Full_Name'];
        $dob = $row['Date_Of_Birth'];
        $email = $row['Email'];
        $res = $res."\nName: ".$row['Full_Name']."\nDate of Birth: ".$row['Date_Of_Birth']."\nEmail: ".$row['Email'];
    }    
    $qrcpde_info = "Booking info \nBRN: ".$brn."\nCustomer: ".$customer."\nBRN: ".$brn."\nRoom ID: ".$room_id."\nCheck in: ".$check_in_date."\nCheck out: ".$check_out_date."\nPeople: ".$_POST['capacity']."\nPool: ".$pool."\nGym: ".$gym."\nBreakfast: ".$breakfast."\nLaunch: ".$launch."\nDinner: ".$dinner."\n\nCustomer Info".$res;
    $qr_codepng = "QRcodes\\".$customer."_".$room_id."_".$brn.".png";
    QRcode::png($qrcpde_info, $qr_codepng);
    ?>

    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'phpmailer/src/PHPmailer.php';
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "wukonghotel@gmail.com";
    $mail->Password = "alpnxnvlffofrfpr";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;
    $mail->setFrom("wukonghotel@gmail.com");
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Wukong Hotel confirmation";
    $mail->Body = "<p>dear ".$fullname."</p><br><p>this email is to confirm your reservation of the rood id ".$room_id."</p><br><p>we hope you will have a wonderful experience with us,<p><br><p>Best.</p>";
    $mail->send();
    ?>

    <?php
    require('php_libs/fpdf185/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 40);
    $pdf->Cell(45, 20, '', 0, 0, 'C');
    $pdf->Cell(100, 20, 'Wukong Hotel Ticket', 0, 0, 'C');
    $pdf->Cell(45, 20, '', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 20);
    $pdf->Cell(20, 5, '', 0, 1, 'L');
    $pdf->Cell(45, 15, 'Booking Information:', 0, 1, 'L');
    $pdf->SetFont('Arial', '', 16);
    $pdf->Cell(70, 10, 'Booking reference number', 0, 0, 'L');//
    $pdf->Cell(30, 10, $brn, 0, 1, 'L');
    $pdf->Cell(45, 10, 'Customer', 0, 0, 'L');//
    $pdf->Cell(10, 10, '=>', 0, 0, 'L');
    $pdf->Cell(30, 10, $customer, 0, 1, 'L');
    $pdf->Cell(45, 10, 'Room ID booked', 0, 0, 'L');//
    $pdf->Cell(10, 10, '=>', 0, 0, 'L');
    $pdf->Cell(30, 10, $room_id, 0, 1, 'L');
    $pdf->Cell(45, 10, 'Check in', 0, 0, 'L');//
    $pdf->Cell(10, 10, '=>', 0, 0, 'L');
    $pdf->Cell(30, 10, $check_in_date, 0, 1, 'L');
    $pdf->Cell(45, 10, 'Check out', 0, 0, 'L');//
    $pdf->Cell(10, 10, '=>', 0, 0, 'L');
    $pdf->Cell(30, 10, $check_out_date, 0, 1, 'L');
    $pdf->Cell(45, 10, 'People', 0, 0, 'L');//
    $pdf->Cell(10, 10, '=>', 0, 0, 'L');
    $pdf->Cell(30, 10, $_POST['capacity'], 0, 1, 'L');
    $pdf->Cell(45, 10, 'Pool', 0, 0, 'L');//
    $pdf->Cell(10, 10, '=>', 0, 0, 'L');
    $pdf->Cell(30, 10, $pool, 0, 1, 'L');
    $pdf->Cell(45, 10, 'Gym', 0, 0, 'L');//
    $pdf->Cell(10, 10, '=>', 0, 0, 'L');
    $pdf->Cell(30, 10, $gym, 0, 1, 'L');
    $pdf->Cell(45, 10, 'Breakfast', 0, 0, 'L');//
    $pdf->Cell(10, 10, '=>', 0, 0, 'L');
    $pdf->Cell(30, 10, $breakfast, 0, 1, 'L');
    $pdf->Cell(45, 10, 'Launch', 0, 0, 'L');//
    $pdf->Cell(10, 10, '=>', 0, 0, 'L');
    $pdf->Cell(30, 10, $launch, 0, 1, 'L');
    $pdf->Cell(45, 10, 'Dinner', 0, 0, 'L');//
    $pdf->Cell(10, 10, '=>', 0, 0, 'L');
    $pdf->Cell(30, 10, $dinner, 0, 1, 'L');
    $pdf->SetFont('Arial', '', 20);
    $pdf->Cell(20, 5, '', 0, 1, 'L');
    $pdf->Cell(65, 15, 'Customer Information:', 0, 1, 'L');
    $pdf->SetFont('Arial', '', 16);
    $pdf->Cell(45, 10, 'Name', 0, 0, 'L');//
    $pdf->Cell(10, 10, '=>', 0, 0, 'L');
    $pdf->Cell(30, 10, $fullname, 0, 1, 'L');
    $pdf->Cell(45, 10, 'Date of birth', 0, 0, 'L');//
    $pdf->Cell(10, 10, '=>', 0, 0, 'L');
    $pdf->Cell(30, 10, $dob, 0, 1, 'L');
    $pdf->Cell(45, 10, 'Email', 0, 0, 'L');//
    $pdf->Cell(10, 10, '=>', 0, 0, 'L');
    $pdf->Cell(30, 10, $email, 0, 1, 'L');
    $pdf->Image($qr_codepng,80,220,50,50);

    $pdf->Output('D','wukong_ticket.pdf');
    ?>