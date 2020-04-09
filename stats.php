<?php 
$con=mysqli_connect("localhost","root","","hotel");
$a="select SUM(AMOUNT) as tamt,AVG(AMOUNT) as avg,COUNT(AMOUNT) as cnt from bill";
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

<h2>earnings</h2>  
<br><br>

<table>
  <thead>
  <tr>
    <th>Total customer count</th>
    <th>average earning per customer</th>
    <th>total earning</th>
  </tr>
  </thead>
  <tbody id="myTable">
  <?php 
  $row= mysqli_fetch_array($b,MYSQLI_ASSOC);

	echo"<tr><td>".$row['cnt']."</td><td>$".$row['avg']."</td><td>$".$row['tamt']."</td></tr>";
 ?>
  </tbody>
</table>
<table>
<h2> top 3 salaried employees<h2>
  <thead>
  <tr>
    <th>Name</th>
    <th>SALARY</th>
    <th>JOIN DATE</th>
  </tr>
  </thead>
  <tbody id="myTable">
  <?php 
  $c="select * from employee order by SALARY DESC limit 0,3";
  $b=mysqli_query($con,$c);

  while($row= mysqli_fetch_array($b,MYSQLI_ASSOC))
  {
	echo"<tr><td>".$row['FNAME']."</td><td>".$row['SALARY']."</td><td>".$row['JOIN_DATE']."</td></tr>";
  }
 ?>
  </tbody>
</table>

<table>
<h2> <h2>
  <thead>
  <tr>
    <th>NO. OF CUSTOMERS</th>
    <th>CATEGORY</th>
  </tr>
  </thead>
  <tbody id="myTable">
  <?php 
  $c="select CATEGORY,count(*) as cnt from customer,room where (GUEST_ID=CUSTOMER_ID) group by room.CATEGORY";
  $b=mysqli_query($con,$c);

  while($row= mysqli_fetch_array($b,MYSQLI_ASSOC))
  {
	echo"<tr><td>".$row['cnt']."</td><td>".$row['CATEGORY']."</td></tr>";
  }
 ?>
  </tbody>
</table>
</div>
 

</body>
</html>
