<?php
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Hotel_Reservation;

define("encryption_method", "AES-128-CBC");
define("key", "Thats my Kung Fu");

//  $database -> createCollection('Customers');
$customer_collection = $client->Hotel_Reservation->Customers;
$newCustomers = [
    [
        'Username' => 'andrewsafo01',
        'Full_Name' => 'Safo',
        'Date_Of_Birth' => '01/02/2002',
        // 'Cookie' => '',
        'Email' => 'moustaphaitani7@gmail.com',
        'Password' => password_hash('password123', PASSWORD_DEFAULT),
        'Credit_Card_Number' => encrypt('1234 5678 9876 4321'),
        'Credit_Card_CVV' => encrypt('123'),
        'Credit_Card_Expiration_Month' => 'January',
        'Credit_Card_Expiration_Year' => '2024',
    ],
    [
        'Username' => 'johndoe',
        'Full_Name' => 'John Doe',
        'Date_Of_Birth' => '10/02/1996',
        // 'Cookie' => '',
        'Email' => 'andrew.chemaly@gmail.com',
        'Password' => password_hash('password345', PASSWORD_DEFAULT),
        'Credit_Card_Number' => encrypt('1234 5678 9876 4321'),
        'Credit_Card_CVV' => encrypt('133'),
        'Credit_Card_Expiration_Month' => 'May',
        'Credit_Card_Expiration_Year' => '2023',
    ],
    [
        'Username' => 'delilah_johnson',
        'Full_Name' => 'Delianah Johnson',
        'Date_Of_Birth' => '23/12/2002',
        // 'Cookie' => '',
        'Email' => 'delilah_johnson@hotmail.com',
        'Password' => password_hash('newyork345', PASSWORD_DEFAULT),
        'Credit_Card_Number' => encrypt('1234 5678 9876 4321'),
        'Credit_Card_CVV' => encrypt('290'),
        'Credit_Card_Expiration_Month' => 'June',
        'Credit_Card_Expiration_Year' => '2025',
    ],
    [
        'Username' => 'maroun_choucair',
        'Full_Name' => 'Maroun Choucair',
        'Date_Of_Birth' => '22/11/1980',
        // 'Cookie' => '',
        'Email' => 'maroun_choucair@gmail.com',
        'Password' => password_hash('webdev123', PASSWORD_DEFAULT),
        'Credit_Card_Number' => encrypt('1234 5678 9876 4321'),
        'Credit_Card_CVV' => encrypt('369'),
        'Credit_Card_Expiration_Month' => 'January',
        'Credit_Card_Expiration_Year' => '2030'
    ],
    [
        'Username' => 'shang_chi',
        'Full_Name' => 'Shang Chi',
        'Date_Of_Birth' => '05/02/1990',
        // 'Cookie' => '',
        'Email' => 'shang_chi@yahoo.com',
        'Password' => password_hash('pass_w0rd912', PASSWORD_DEFAULT),
        'Credit_Card_Number' => encrypt('1234 5678 9876 4321'),
        'Credit_Card_CVV' => encrypt('690'),
        'Credit_Card_Expiration_Month' => 'July',
        'Credit_Card_Expiration_Year' => '2029'
    ],
];


$insertManyResult = $customer_collection->insertMany($newCustomers);

//if we want to add cvv
// $updateResult = $customer_collection->updateOne(
//     [ 'Username' => 'omarmajzoub01' ],
//     [ '$set' => [ 'cvv' => '123' ]]
//  );

//  $database -> createCollection('Bookings');

$booking_collection = $client->Hotel_Reservation->Bookings;

$newBookings = [
    [
        'Brn' => 1,
        'Customer_Username' => 'andrewwsafo01',
        'room_id_booked' => '1',
        // 'People' => 1,
        'Check_In_Date' => '2023-04-18T17:13',
        'Check_Out_Date' => '2023-04-20T17:13',
        'Pool' => False,
        'Gym' => False,
        'Breakfast' => true,
        'Launch' => false,
        'Dinner' => false,
        // 'Price' => 30
    ],
    [
        'Brn' => 2,
        'Customer_Username' => 'johndoe',
        'room_id_booked' => '3',
        // 'People' => 1,
        'Check_In_Date' => '2023-05-18T18:13',
        'Check_Out_Date' => '2023-05-20T13:13',
        'Pool' => true,
        'Gym' => true,
        'Breakfast' => true,
        'Launch' => true,
        'Dinner' => false,
        // 'Price' => 30
    ],
    [
        'Brn' => 3,
        'Customer_Username' => 'deliah_johnson',
        'room_id_booked' => '5',
        // 'People' => 3,
        'Check_In_Date' => '2023-04-18T14:23',
        'Check_Out_Date' => '2023-04-20T19:43',
        'Pool' => true,
        'Gym' => true,
        'Breakfast' => true,
        'Launch' => true,
        'Dinner' => true,
        // 'Price' => 30
    ],
    [
        'Brn' => 4,
        'Customer_Username' => 'maroun_choucair',
        'room_id_booked' => '4',
        // 'People' => 2,
        'Check_In_Date' => '2023-04-20T17:13',
        'Check_Out_Date' => '2023-04-23T17:13',
        'Pool' => true,
        'Gym' => true,
        'Breakfast' => true,
        'Launch' => false,
        'Dinner' => false,
        // 'Price' => 30
    ],
    [
        'Brn' => 5,
        'Customer_Username' => 'maroun_choucair',
        'room_id_booked' => '2',
        // 'People' => 2,
        // 'Check_In_Time' => '01:00',
        'Check_In_Date' => '2023-05-05T19:13',
        // 'Check_Out_Time' => '04:00',
        'Check_Out_Date' => '2023-05-07T23:50',
        'Pool' => true,
        'Gym' => true,
        'Breakfast' => true,
        'Launch' => true,
        'Dinner' => true,
        // 'Price' => 30
    ]

];


$insertManyResult = $booking_collection->insertMany($newBookings);

// $database -> createCollection('Rooms');

$room_collection = $client->Hotel_Reservation->Rooms;

$newRooms = [
    [
        // add: Price_per_Night, Location, Type, Status, Capacity, Status
        'Room_Id' => 1,
        'Price_per_Night' => 30,
        'Location' => 'Beirut',
        'Type' => 'Single',
        'Status' => 'Unavailable',
        'Capacity' => 1
    ],
    [
        'Room_Id' => 2,
        'Price_per_Night' => 70,
        'Location' => 'Beirut',
        'Type' => 'Family',
        'Status' => 'Available',
        'Capacity' => 3
    ],
    [
        'Room_Id' => 3,
        'Price_per_Night' => 50,
        'Location' => 'Beirut',
        'Type' => 'Double',
        'Status' => 'Unavailable',
        'Capacity' => 2
    ],
    [
        'Room_Id' => 4,
        'Price_per_Night' => 30,
        'Location' => 'Beirut',
        'Type' => 'Single',
        'Status' => 'Available',
        'Capacity' => 1
    ],
    [
        'Room_Id' => 5,
        'Price_per_Night' => 30,
        'Location' => 'Beirut',
        'Type' => 'Single',
        'Status' => 'Unavailable',
        'Capacity' => 1
    ]
];

$insertManyResult = $room_collection->insertMany($newRooms);

// $database -> createCollection('Admin');

// $database -> createCollection('Staff');

// add staff collection
$staff_collection = $client->Hotel_Reservation->Staff;

$newStaff = [
    [
        'Full_Name' => 'Irelia Julie',
        'Date_of_Birth' => '1999-12-12',
        'Email' => 'IreliaJulie@gmail.com',
        'Phone_Number' => '01456789',
        'Salary' => 3000,
        'Position' => 'Manager'
    ],
    [
        'Full_Name' => 'Lesly Smith',
        'Date_of_Birth' => '1999-12-12',
        'Email' => 'LeslySmith@hotmail.com',
        'Phone_Number' => '09234683',
        'Salary' => 2000,
        'Position' => 'Receiptionist'
    ],
    [
        'Full_Name' => 'Rambo John',
        'Date_of_Birth' => '1990-12-12',
        'Email' => 'rambojohn@gmail.com',
        'Phone_Number' => '09234683',
        'Salary' => 1000,
        'Position' => 'Roomkeeper'
    ]

    ];

$insertManyResult = $staff_collection->insertMany($newStaff);


$admin_collection = $client->Hotel_Reservation->Admin;

$newAdmins = [
    [
        'Username' => 'Andrew',
        'Password' => password_hash('RoverRovieEA', PASSWORD_DEFAULT),
        'Email' => 'andrew.chemaly@gmail.com'
        // 'Cookie' => ''
    ],
    [
        'Username' => 'Safo',
        'Password' => password_hash('EzraelOTP', PASSWORD_DEFAULT),
        'Email' => 'moustaphaitani7@gmail.com'
        // 'Cookie' => ''
    ]
];


$insertManyResult = $admin_collection->insertMany($newAdmins);

function encrypt($data)
{

    $key = key;
    $plaintext = $data;
    $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
    $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
    return $ciphertext;
}
function decrypt($data)
{
    $key = key;
    $c = base64_decode($data);
    $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len = 32);
    $ciphertext_raw = substr($c, $ivlen + $sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
    if (hash_equals($hmac, $calcmac)) {
        return $original_plaintext;
    }
}
