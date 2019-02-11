<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">

	<title>Reservation/Confirmation</title>
	<link type="text/css" rel="stylesheet" href="Homepage.css" /> 
	<script src="Homepage.js"></script>
	<script>
	  src="https://code.jquery.com/jquery-3.3.1.js"
	  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	  crossorigin="anonymous">
	</script>


</head>
<body>







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
$roomtype = $_POST['roomtype'];
$adults = $_POST['adults'];
$children = $_POST['children'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "INSERT INTO reservation (Checkin,Checkout,Roomtype,Adults,Children,Name,Email,Phone) 
VALUES ('$checkin','$checkout','$roomtype','$adults','$children','$name','$email','$phone')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Complete the payment to complete reservation')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

$cost=0;
$rp=0;

if($roomtype=="PreferredKing"){
	$rp = 11900;
}
else if($roomtype=="PreferredDoubleRoom"){
	$rp = 12900;
}
else if($roomtype=="LuxeKing"){
	$rp = 14200;
}
else if($roomtype=="LuxeDoubleRoom"){
	$rp = 15200;
}
else{
	$rp=17200;
}
$c=0;
if($children>=(2*$adults)){
	$adults=$adults/3;
	$a=round($adults);
	$cost=$rp*$a;
	$children=$children-($adults*2);
	$children=$children/3;
	$c=round($children);
	$cost=$cost+($rp*$c);
}
else{
	$adults=$adults/3;
	$a=round($adults);
	$cost=$rp*$a;
}
$Checkin=$checkin;
$costn=0;
$costfinal=0;
while($checkin<=$checkout){
	$costn = $costn + $cost;
	$costfinal=$costfinal+$cost;
	$checkin++;
}
$costtax = $costfinal + ($costfinal*0.1);

?>















<button onclick="gotop()" id="Btn" title="Go to top"><img src="Images/top.png" style="position: absolute; left: 4px; bottom: 5px; width: 40px;" alt="top"></button>

<div class="hptop">
	<span style="margin-left: 250px; font-size: 18px;">
		Panaji, Goa, India - Reservation (+91) 9876543210 - Reservation (+91) 9876543210
	</span>
	<button class="btbooknow" style="background: transparent;">
		BOOK NOW
	</button>
</div>
<header>
	<a href="#"><img src="Images/Logo.png"></a>
	<nav id="menu">
		<ul>
			<li class="headlinks"><a href="Homepage.html">Home</a></li>
			<li class="headlinks"><a href="About.html">About</a></li>
			<li class="headlinks"><a href="rooms.html">Rooms</a></li>
			<li class="headlinks"><a href="prereservation.html">Reservation</a></li>
			<li class="headlinks"><a href="Contact.html">Contact</a></li>
		</ul>
	</nav>
</header>	


<div class="mainimg" style="background-image: url(Images/reservationmain.jpg);">
	<h1>Reservation</h1>
</div>

<br><br><br><br><br>

<div class="steps" style="margin-left: 20%">
<span>1. Check Availability &#x2714</span>
</div>
<div class="steps">
<span>2. Reserve Room &#x2714</span>
</div>
<div class="steps">
<span>3. Confirmation </span>
</div>

<div class="content" style="height: 280px; margin-left: 17%;">
		<center>
			<br><br><br><br><br><br>
			<span class="h">Step 3</span><br>
			<span class="h1">Confirmation</span><br><br>
			<hr width="70px" size="3px" color="#b0914f">
		</center>
</div>

<div class="resmain" style="margin-left: 45%;height: 920px;">
	
		<h3 style="text-align: center; letter-spacing: 5px">Payment Details</h3>
			<hr width="50%" style="color: white" align="center"><br>
	<form>
		<table>
			<tr>
				<td><span>Name</span></td>
				<td><span><?php echo $name?></span></td>
			</tr>
			<tr>
				<td><span>Check-in</span></td>
				<td><span><?php echo $Checkin?></span></td>
			</tr>
			<tr>
				<td><span>Check-out</span></td>
				<td><span><?php echo $checkout?></span></td>
			</tr>
			<tr>
				<td><span>Room-type</span></td>
				<td><span><?php echo $roomtype?></span></td>
			</tr>
			<tr>
				<td><span>One Room Price / Night</span></td>
				<td><span><?php echo $rp?></span></td>
			</tr>
			<tr>
				<td><span>Rooms booked</span></td>
				<td><span><?php echo $a+$c ?></span></td>
			</tr>
			<tr>
				<td><span>Cost / Night</span></td>
				<td><span><?php echo $cost?></span></td>
			</tr>
			<tr>
				<td><span>Cost for all Nights</span></td>
				<td><span><?php echo $costn?></span></td>
			</tr>
			<tr>
				<td><span>Tax(10%)</span></td>
				<td><span><?php echo $costfinal*0.1?></span></td>
			</tr>
			<tr>
				<td><span>Grand Total</span></td>
				<td><span><?php echo $costtax?></span></td>
			</tr>
		</table>
	<br><br>
	</form>
</div>	
<br><br>

<div style="position: absolute;top: 1020px;height: 200px;left: 50px; font-size: 15px;padding: 20px; background: #f0f0f0;box-shadow: 0px 3px 20px #b0914f;">
	<center>
	<h1> Reservation Completed!</h1>
	<h3>Your reservation details have just been sent to your email. If you have any <br>question, pleasedon't hesitate to contact us. Thank you!</h3>
	</center>
</div>


	<div class="footer">
		
		
			<img src="Images/footlogo.png" alt="footlogo" class="footlogo">
			<div class="footheading">
			<span>Company</span>
			<span>Services</span>
			<span>Sign up for newletter</span>
			</div>	
			
			<div>
				<img class="icons" src="Images/mobile2.png" alt="mobile">
				<img class="icons2" src="Images/mail.png" alt="mobile">
				<img class="icons3" src="Images/location.png" alt="mobile">
			</div>
			<div class="contact">
			<p>(+91) 9876543210</p>
			<p>contact@paradise.com</p>
			<p>Kalawad Rd, Rajkot, Gujarat, India.</p>
			</div>

			<div class="footlinks1">
				<p><a href="#">> Home</a></p>
				<p><a href="#">> About us</a></p>
				<p><a href="#">> Blog</a></p>
				<p><a href="#">> Contact</a></p>
			</div>

			<div class="footlinks2">
				<p><a href="#">> Spa</a></p>
				<p><a href="#">> Rooms</a></p>
				<p><a href="#">> Restaurant</a></p>
				<p><a href="#">> Gym</a></p>
				
			</div>
			
			
				<div class="out-ho">
					<div class="in-ho">
					<a href="https://www.facebook.com/" target="blank"><img class="fb" src="Images/facebook2.png" alt="fb"></a></div>
				<div class="in-ho"><a href="https://www.instagram.com/" target="blank"><img class="insta" src="Images/instagram2.png" alt="insta"></a></div>
				<div class="in-ho"><a href="https://www.twitter.com/" target="blank"><img class="twitter" src="Images/twitter.png" alt="twitter"></a></div>
			</div>


			<div class="signup">
				<input class="mail" type="mail" placeholder="Your Email...">
				<input class="button" type="button" value="">
			</div>

	<div class="trip">
		<a href="https://www.tripadvisor.in/" target="blank"><img src="Images/tripadvisor.png" alt="tripadvisor"></a>
	</div>

<hr width="80%" style="border: 0.7px solid rgba(202,202,202,0.1); margin-top: 500px; margin-left: 200px; position: absolute; ">

<div class="copy">
	<p>&copy; Copyright 2019-20. All rights reserved.</p>
</div>

<div class="lastlinks">
		<a href="#">Terms & Conditions</a>    |
		<a href="#">Privacy Policy</a>    |
		<a href="#">Site Map</a>
	</div>

</div>	

</body>
</html>

