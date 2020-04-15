
<DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">

        <title>Current Room Service</title>
        <link rel="icon" href="web-icon/favicon.ico" type="image/icon type">

        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>





  <style>
  .navbar-default {
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
 <style type="text/css">
		table{
			border-collapse: collapse;
			width: 100%;
			color: #000000;
			font-family: monospace;
			font-size: 18px;
			text-align: Left;
		}
		th{
			background-color: #005f69;
			color: white;
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

<link href="dash.css" rel="stylesheet">
</head>
		<body>	
		<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
          <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Sunrise Hotels</a>
              <ul class="navbar-nav px-3">
                  <li class="nav-item text-nowrap">
                      <a class="nav-link" href="#">Sign out</a>
                  </li>
              </ul>
      </nav>
      <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                        <span data-feather="home"></span>
                        Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="roomreservation.php">
                        <span data-feather="plus-square"></span>
                        Room Reservation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="custroom.html">
                        <span data-feather="activity"></span>
                            On-Going Room Service
                        </a>
                    </li>
                </ul>
                <hr/>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="employee_add.html">
                        <span data-feather="user-plus"></span>
                            Add Employee
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cur_employees.html">
                        <span data-feather="users"></span>
                            View Current Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employee_delete.html">
                        <span data-feather="user-minus"></span>
                            Remove Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payement.php">
                        <span data-feather="credit-card"></span>
                            Make Payment
                        </a>
                    </li>
                </ul>
                <hr/>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="stats.php">
                        <span data-feather="bar-chart-2"></span>
                            View Stats
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://127.0.0.1:5000/wt2/graph">
                        <span data-feather="bar-chart-2"></span>
                            Analytics
                        </a>
                    </li>
                </ul>
                </div>
            </nav>
        </div>
    </div>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

  

<h3>Customer And Room Details</h3><br>
 <table class="table table-striped table-hover">
 <thead class="thead-dark">
 <tr>
  <th>GUEST ID</th> 
  <th>AADHAR_NO</th> 
  <th>FNAME</th><!DOCTYPE html>          
  <th>MINIT</th>
  <th>LNAME</th>
  <th>Phone Number</th>
  <th>Room Number</th>
  <th>Category</th>
 </tr>
</thead>
 <?php
    $custId=$_POST['custid'];
    $conn = mysqli_connect("localhost","root","root","hotel") or die(mysql_error());
    if(!$conn){
        echo "Connection failed";
    } 
    $sql="SELECT GUEST_ID,AADHAR_NO,FNAME,MINIT,LNAME,PH_NO,ROOM_NO,CATEGORY FROM customer,room WHERE ROOM.CUSTOMER_ID=customer.GUEST_ID AND customer.GUEST_ID=$custId;";
    $query_result=mysqli_query($conn,$sql);
    if($query_result){
            // output data of each row
            while($row = $query_result->fetch_assoc()) {
             echo "<tr><td>" . $row["GUEST_ID"]. "</td><td>" . $row["AADHAR_NO"] . "</td><td>"
         . $row["FNAME"]. "</td><td>". $row["MINIT"]. "</td><td>". $row["LNAME"]. "</td><td>". $row["PH_NO"]. "</td><td>". $row["ROOM_NO"]. "</td><td>". $row["CATEGORY"]. "</td></tr>";
         }
         echo "</table>";
         }
    echo "<h3>Reservation Details</h3>";
    $sql="SELECT RID,CHECKIN_DATE,CHECKOUT_DATE,PERIOD_STAY,HALL_NUMBER,ROOM_NUMBER,CATEGORY FROM reservation WHERE (reservation.GST_ID,reservation.ROOM_NUMBER) IN (SELECT customer.GUEST_ID,room.ROOM_NO FROM room,customer where room.CUSTOMER_ID=customer.GUEST_ID and customer.GUEST_ID=$custId);";
    $query_result=mysqli_query($conn,$sql);
    if($query_result){
        echo "<table class='table table-striped table-hover'>";
        echo "<thead class='thead-dark'>";
        echo "<tr><th>Reservation ID</th><th>Check-in Date</th><th>Check-out Date</th><th>Period Stay</th><th>Hall Number</th><th>Room Number</th><th>Category</th></tr>";
        echo "</thead>";

        while($row = $query_result->fetch_assoc()) {
            echo "<tr><td>" . $row["RID"]. "</td><td>" . $row["CHECKIN_DATE"] . "</td><td>"
        . $row["CHECKOUT_DATE"]. "</td><td>". $row["PERIOD_STAY"]. "</td><td>". $row["HALL_NUMBER"]. "</td><td>". $row["ROOM_NUMBER"]. "</td><td>". $row["CATEGORY"]. "</td></tr><br>";
        }
        echo "</table>";
        }
    
    else{
        echo "NO RECORDS FOUND";
    }

        $sql="SELECT INVOICE_NUMBER FROM invoice where invoice.CUSTOMER_ID=$custId;";
        $query_result=mysqli_query($conn,$sql);
        //echo $custId;
        if (mysqli_num_rows($query_result)==0)
        {
            $sql="INSERT INTO `invoice`(`STATUS`, `INVOICE_DESCRIPTION`, `CUSTOMER_ID`) VALUES ('PAYMENT PENDING',NULL,$custId);";
            $query_result=mysqli_query($conn,$sql);
            
        }
        else
        {
            $row = $query_result->fetch_assoc();
            $invoiceNumber=$row['INVOICE_NUMBER'];
        }
    
        
        //echo "invoice_number".$invoiceNumber;

    
        ?>
    
    <h3>Pay Here</h3>
    
    <form method="POST" action="paying.php">

            <input type="radio" name="payment_method" value="cash">Cash<br>
            <input type="radio" name="payment_method" value="card">Credit/Debit Card<br>
            <input type='hidden' name='custID' value=<?php echo $custId ?>>
            <input type="radio" name="payment_method" value="wallets">Payment Wallets<br><br><br>
            <button type="submit" class="btn btn-dark">Submit</Button><br>

    </form>


    
</table>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com//docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script>
</body>
</html>



