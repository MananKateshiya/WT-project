<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "hotel_tejas";


$n = $_POST['name'];
$m = $_POST['mail'];
$s = $_POST['sub'];
$msg = $_POST['message'];


// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

$qur = "INSERT INTO `contact`(`id`,  `Name`, `Email`, `Subject`, `Message`) VALUES (1, '$n', '$m', '$s', '$msg')";
mysqli_query($conn, $qur);



?>