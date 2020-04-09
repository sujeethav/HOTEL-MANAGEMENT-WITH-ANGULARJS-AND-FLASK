<!DOCTYPE html>
<html>
<head>

<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158927725-1');
</script>
 <title>Table V01</title>
 <style>
 form > *{
	 margin: 15px !important;
 }
 </style>
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
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">sunrise</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="http://localhost/hotel/admin/roomreservation.php">NEW RESERVATION</a></li>

    </ul>
  </div>
</nav>
	<div class="container-table100">
	<form action="network.php" method="post">
	<label class="label label-primary">Enter the employee id of the employee you want to delete</label>
	<div class="form-group">
 
	<input type="text" name="EMP_NUMBER" class="form-control">
	</div>
	<input type="submit" class="form-control">
	</form>

 <table>
 <tr>
 
  <th>SALARY</th> 
  <th>FNAME</th> 
  <th>MINIT</th>
  <th>LNAME</th>
  <th>JOIN_DATE</th>
  <th>DOB</th>
  <th>EMP_NUMBER</th>
  <th>GENDER</th>
  
 </tr>
 <?php
	$conn = mysqli_connect("localhost", "root", "", "hotel");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT * FROM employee";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["SALARY"]. "</td><td>" . $row["FNAME"] . "</td><td>"
	. $row["MINIT"]."</td><td>".$row["LNAME"]."</td><td>".$row["JOIN_DATE"]."</td><td>".$row["DOB"]."</td><td>".$row["EMP_ID"]."</td><td>".$row["gender"]."</td></tr>";
	}
	echo "</table>";
	} else { echo "0 results"; }
	$conn->close();
	
	
?>
</table>
</div>
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>