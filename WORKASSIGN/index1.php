<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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

				<div class="container>
				
				<form action="update.php" method="POST">
					<!--<b>Please enter the employee id</b>-->
						Please enter the employee id:<br>
						<input type="text" name="EMP_NUMBER" class="form-control">
						
						<!--<b>Please enter the room number you want to assign to this employee</b>-->
						Please enter the room number you want to assign to this employee:<br>
						<input type="text" name="ROOM_NUM" class="form-control">
						<br>
						<input type="submit" class="form-control"><br>
				</form>
			<table class="table table-striped">
					<thead>
 
  						<th>employee</th> 
						<th>room</th> 
						<!--<th>MINIT</th>
						<th>LNAME</th>
						<th>JOIN_DATE</th>
						<th>DOB</th>
						<th>EMP_NUMBER</th>
						<th>GENDER</th> -->
					</thead>
					<tbody>
					<?php
					$conn = mysqli_connect("localhost", "root", "", "hotel");
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 
					$sql = "SELECT * FROM housekeeps";
					$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["EMP_NUMBER"]. "</td><td>" . $row["ROOM_NUM"] . "</td><td>";
				}
				
				} else { echo "0 results"; }
				$conn->close();
	
	
					?>
					</tbody>
					</table>
			
					
				</div>





</body>
</html>