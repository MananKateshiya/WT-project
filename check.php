<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_tejas";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];

//$sql = "SELECT count(*) from reservation WHERE Roomtype='PREFERREDKING' AND ('$checkin' BETWEEN Checkin AND Checkout OR '$checkout' BETWEEN Checkin AND Checkout OR Checkin BETWEEN '$checkin' AND '$checkout' OR Checkout BETWEEN '$checkin' AND '$checkout')");

//PK
$result = mysqli_query($conn, "SELECT count(*) from reservation WHERE Roomtype='PREFERREDKING' AND ('$checkin' BETWEEN Checkin AND Checkout OR '$checkout' BETWEEN Checkin AND Checkout OR Checkin BETWEEN '$checkin' AND '$checkout' OR Checkout BETWEEN '$checkin' AND '$checkout')");
$row = mysqli_fetch_array($result);
$count = $row['count(*)'];
$PK = 60 - $count;



//PDR
$result = mysqli_query($conn, "SELECT count(*) from reservation WHERE Roomtype='PREFERREDDOUBLEROOM' AND ('$checkin' BETWEEN Checkin AND Checkout OR '$checkout' BETWEEN Checkin AND Checkout OR Checkin BETWEEN '$checkin' AND '$checkout' OR Checkout BETWEEN '$checkin' AND '$checkout')");
$row = mysqli_fetch_array($result);
$count = $row['count(*)'];
$PDR = 60 - $count;




//LK
$result = mysqli_query($conn, "SELECT count(*) from reservation WHERE Roomtype='LUXEKING' AND ('$checkin' BETWEEN Checkin AND Checkout OR '$checkout' BETWEEN Checkin AND Checkout OR Checkin BETWEEN '$checkin' AND '$checkout' OR Checkout BETWEEN '$checkin' AND '$checkout')");
$row = mysqli_fetch_array($result);
$count = $row['count(*)'];
$LK = 60 - $count;


//LDR
$result = mysqli_query($conn, "SELECT count(*) from reservation WHERE Roomtype='LUXEDOUBLEROOM' AND ('$checkin' BETWEEN Checkin AND Checkout OR '$checkout' BETWEEN Checkin AND Checkout OR Checkin BETWEEN '$checkin' AND '$checkout' OR Checkout BETWEEN '$checkin' AND '$checkout')");
$row = mysqli_fetch_array($result);
$count = $row['count(*)'];
$LDR = 60 - $count;


//PLK
$result = mysqli_query($conn, "SELECT count(*) from reservation WHERE Roomtype='PREMIERLUXEKING' AND ('$checkin' BETWEEN Checkin AND Checkout OR '$checkout' BETWEEN Checkin AND Checkout OR Checkin BETWEEN '$checkin' AND '$checkout' OR Checkout BETWEEN '$checkin' AND '$checkout')");
$row = mysqli_fetch_array($result);
$count = $row['count(*)'];
$PLK = 60 - $count;



$roomsrem = "Rooms Remaining ♦ PREFERRED KING : $PK • PREFERRED DOUBLE ROOM : $PDR • LUXE KING : $LK • LUXE DOUBLE ROOM : $LDR • PREMIER LUXE KING : $PLK";

echo "<script>location.href='reservation.html';alert('$roomsrem')</script>";


$conn->close();
?>