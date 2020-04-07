<?php 
$con=mysqli_connect("localhost","root","root","hotel");
if(isset($_POST['submit']))
{	
	$gid=$_POST['gstid'];
	$cin=$_POST['cin'];
	$cout=$_POST['cout'];
	$cat=$_POST['cat'];
	$rno=$_POST['roomselect'];
	$set="update convention_hall set cust_id=$gid where hall_no=$rno";
	mysqli_query($con,$set);
	
	$reser="INSERT INTO reservation(gst_id,checkin_date,checkout_date,period_stay,hall_number,category) VALUES ($gid,'$cin','$cout','date_diff($cin,$cout)',$rno,'$cat')";
	$confirm=mysqli_query($con,$reser);
	
	
	}?>
	
	
<!DOCTYPE html>
<html lang="en">
<head>
  <title>confirm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <style>.navbar-default {
  background-color: #1855E5;s
  background-image: none;
  background-repeat: no-repeat;
 } 
 .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
 </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">sunrise</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="roomreservation.php">NEW RESERVATION</a></li>

    </ul>
  </div>
</nav>
  
<div class="container">
	<?php
	if($confirm){
		echo "<img src='https://cdn5.vectorstock.com/i/thumb-large/54/69/reservation-confirmed-rubber-stamp-vector-11775469.jpg'  class='center'>"; 
	} 
	?>
</div>
	

</body>	
</html>
