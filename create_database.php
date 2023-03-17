<?php
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->Hotel_Reservation;
//  $database -> createCollection('Customers');

$customer_collection = $client->Hotel_Reservation->Customers;
define("encryption_method", "AES-128-CBC");
define("key", "Thats my Kung Fu");

$newCustomers = [
    [
        'Username' => 'andrewsafo01',
        'Full_Name' => 'Safo',
        'Date_Of_Birth' => '01/02/2002',
        // 'Cookie' => '',
        'Email' => 'safoo@gmail.com',
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
        'Email' => 'johndoe@hotmail.com',
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
        'Purchased' => True,
        'Customer_Username' => 'andrewwsafo01',
        'People' => 1,
        'Check_In' => False,
        'Check_Out' => False,
        'Pool' => False,
        'Gym' => False,
        'Breakfast' => true,
        'Launch' => false,
        'Dinner' => false,
        'Price' => 30
    ],
    [
        'Brn' => 2,
        'Purchased' => True,
        'Customer_Username' => 'johndoe',
        'People' => 1,
        'Check_In' => False,
        'Check_Out' => False,
        'Pool' => False,
        'Gym' => False,
        'Breakfast' => true,
        'Launch' => false,
        'Dinner' => false,
        'Price' => 30
    ],
    [
        'Brn' => 3,
        'Purchased' => True,
        'Customer_Username' => 'deliah_johnson',
        'People' => 3,
        'Check_In' => True,
        'Check_Out' => False,
        'Pool' => False,
        'Gym' => False,
        'Breakfast' => true,
        'Launch' => false,
        'Dinner' => false,
        'Price' => 30
    ],
    [
        'Brn' => 4,
        'Purchased' => True,
        'Customer_Username' => 'maroun_choucair',
        'People' => 3,
        'Check_In' => True,
        'Check_Out' => False,
        'Pool' => False,
        'Gym' => False,
        'Breakfast' => true,
        'Launch' => false,
        'Dinner' => false,
        'Price' => 30
    ],
    [
        'Brn' => 5,
        'Purchased' => True,
        'Customer_Username' => 'shang_chi',
        'People' => 3,
        'Check_In' => True,
        'Check_Out' => False,
        'Pool' => False,
        'Gym' => False,
        'Breakfast' => true,
        'Launch' => false,
        'Dinner' => false,
        'Price' => 30
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
        'Status' => 'Available',
        'Capacity' => 1
    ],
    [
        'Room_Id' => 2,
        'Price_per_Night' => 30,
        'Location' => 'Beirut',
        'Type' => 'Single',
        'Status' => 'Available',
        'Capacity' => 1
    ],
    [
        'Room_Id' => 3,
        'Price_per_Night' => 30,
        'Location' => 'Beirut',
        'Type' => 'Single',
        'Status' => 'Available',
        'Capacity' => 1
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
        'Status' => 'Available',
        'Capacity' => 1
    ]
];

$insertManyResult = $room_collection->insertMany($newRooms);

// $database -> createCollection('Admin');

$admin_collection = $client->Hotel_Reservation->Admin;

$newAdmins = [
    [
        'Username' => 'Andrew',
        'Password' => password_hash('RoverRovieEA', PASSWORD_DEFAULT),
        // 'Cookie' => ''
    ],
    [
        'Username' => 'Safo',
        'Password' => password_hash('EzraelOTP', PASSWORD_DEFAULT),
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