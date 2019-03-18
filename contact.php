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

$qur = "INSERT INTO `contact`( `Name`, `Email`, `Subject`, `Message`) VALUES ( '$n', '$m', '$s', '$msg')";
mysqli_query($conn, $qur);



?>