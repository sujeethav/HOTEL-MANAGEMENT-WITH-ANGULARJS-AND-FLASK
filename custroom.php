<?php 
$con=mysqli_connect("localhost","root","root","hotel");
$a="select fname,guest_id,room_no,checkout_date,ph_no,checkin_date from customer,reservation,room where guest_id=gst_id and gst_id=customer_id and hall_number is NULL";
$b=mysqli_query($con,$a);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <style>.navbar-default {
  background-color: #0B235A;
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
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
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

<h2>ONGOING ROOM RESERVATION</h2>
<p>Type something in the input field to search the table for first name,customer id,room no.</p>  
<input id="myInput" type="text" placeholder="Search..">
<br><br>

<table>
  <thead>
  <tr>
    <th>FIRST NAME</th>
    <th>CUSTOMER ID</th>
    <th>PHONE NUMBER</th>
	<th>ROOM NUMBER</th>
	<th>CHECKIN DATE</th>
	<th>CHECKOUT DATE</th>
  </tr>
  </thead>
  <tbody id="myTable">
  <?php 
  while($row= mysqli_fetch_array($b,MYSQLI_ASSOC))
  {
	echo"<tr>
    <td>".$row['fname']."</td>
	<td>".$row['guest_id']."</td>
	<td>".$row['ph_no']."</td>
	<td>".$row['room_no']."</td>
	<td>".$row['checkin_date']."</td>
	<td>".$row['checkout_date']."</td>
  </tr>";
  }
 ?>
  </tbody>
</table>
</div>
  
<p>Note that we start the search in tbody, to prevent filtering the table headers.</p>

</body>
</html>
